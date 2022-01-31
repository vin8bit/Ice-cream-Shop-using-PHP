<?php 
       session_start();;
       if(isset($_SESSION['usertype'])){
           if($_SESSION['usertype'] == 'admin'){
                   
           }else{
            header("Location: adminlogin.php");
           }
       }else{
           header("Location: adminlogin.php");
       }

?>
<?php
include 'connection.php';

// Upload configs.
define('UPLOAD_DIR', 'uploads');
define('UPLOAD_MAX_FILE_SIZE', 10485760); // 10MB.
//@changed_2018-02-17_14.28
define('UPLOAD_ALLOWED_MIME_TYPES', 'image/jpeg,image/png,image/gif');


$productSaved = FALSE;
$flag = 0;
$code1 = 'zas';
if (isset($_POST['submit'])) {
    /*
     * Read posted values.
     */
    $productName = isset($_POST['name']) ? $_POST['name'] : '';
	$productCode = isset($_POST['code']) ? $_POST['code'] : '';
    $productQuantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
	$productPrice = isset($_POST['price']) ? $_POST['price'] : 0;
    $productDescription = isset($_POST['description']) ? $_POST['description'] : '';
	$productCategory = isset($_POST['category']) ? $_POST['category'] : '';

    /*
     * Validate posted values.
     */
    if (empty($productName)) {
        $errors[] = ' <font color= "red"> Please provide a product name.</font>';
    }

    if ($productQuantity == 0) {
        $errors[] = ' <font color= "red">Please provide the quantity.</font>';
    }

	if ($productPrice == 0) {
        $errors[] = ' <font color= "red"> Please provide a price.</font>';
    }
	
    if (empty($productDescription)) {
        $errors[] = ' <font color= "red">Please provide a description.</font>';
    }
	
	if (empty($productCategory)) {
        $errors[] = ' <font color= "red"> Please provide a category.</font>';
    }
	if (empty($productCode)) {
        $errors[] = ' <font color= "red"> Please provide a Product code.</font>';
    }else{
		
		$sql = "SELECT * FROM products WHERE code ='". $productCode."'" ;
        $result = $connection->query($sql);
        while($res = $result->fetch_assoc()) {         
            $code1 = $res['code'];
			if($code1 === $productCode){
			  $flag =1;
			}
        }$result->close();
	}
	
    /*
     * Create "uploads" directory if it doesn't exist.
     */
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0777, true);
    }

    
    $filenamesToSave = [];

    $allowedMimeTypes = explode(',', UPLOAD_ALLOWED_MIME_TYPES);

    /*
     * Upload files.
     */
    if (!empty($_FILES)) {
        if (isset($_FILES['file']['error'])) {
            foreach ($_FILES['file']['error'] as $uploadedFileKey => $uploadedFileError) {
                if ($uploadedFileError === UPLOAD_ERR_NO_FILE) {
                    $errors[] = 'You did not provide any files.';
                } elseif ($uploadedFileError === UPLOAD_ERR_OK) {
                    $uploadedFileName = basename($_FILES['file']['name'][$uploadedFileKey]);

                    if ($_FILES['file']['size'][$uploadedFileKey] <= UPLOAD_MAX_FILE_SIZE) {
                        $uploadedFileType = $_FILES['file']['type'][$uploadedFileKey];
                        $uploadedFileTempName = $_FILES['file']['tmp_name'][$uploadedFileKey];

                        $uploadedFilePath = rtrim(UPLOAD_DIR, '/') . '/' . $uploadedFileName;

                        if (in_array($uploadedFileType, $allowedMimeTypes)) {
                            if (!move_uploaded_file($uploadedFileTempName, $uploadedFilePath)) {
                                $errors[] = 'The file "' . $uploadedFileName . '" could not be uploaded.';
                            } else {
                                $filenamesToSave[] = $uploadedFilePath;
                            }
                        } else {
                            $errors[] = 'The extension of the file "' . $uploadedFileName . '" is not valid. Allowed extensions: JPG, JPEG, PNG, or GIF.';
                        }
                    } else {
                        $errors[] = 'The size of the file "' . $uploadedFileName . '" must be of max. ' . (UPLOAD_MAX_FILE_SIZE / 1024) . ' KB';
                    }
                }
            }
        }
    }

    /*
     * Save product and images.
     */
	 if($flag == 0){
    if (!isset($errors) && !empty($filenamesToSave)) {
     
        $sql = 'INSERT INTO products (
                    name,
                    quantity,
					price,
                    description,
					category,
					code
                ) VALUES (
                    ?, ?, ?, ?, ?, ?
                )';

      
        $statement = $connection->prepare($sql);

       
        $statement->bind_param('siisss', $productName,$productQuantity, $productPrice, $productDescription, $productCategory, $productCode );
       
        $statement->execute();

        // Read the id of the inserted product.
        $lastInsertId = $connection->insert_id;

       
        $statement->close();

       
        foreach ($filenamesToSave as $filename) {
            $sql = 'INSERT INTO products_images (
                        product_id,
                        filename,
						codem
                    ) VALUES (
                        ?, ?,?
                    )';

            $statement = $connection->prepare($sql);

            $statement->bind_param('iss', $lastInsertId, $filename, $productCode);

            $statement->execute();

            $statement->close();
        }

        
        $connection->close();

        $productSaved = TRUE;

       
        $filenamesToSave = $productName = $productQuantity = $productPrice = $productDescription = $productCategory = $productCode = NULL;
    }
	else { if(empty($filenamesToSave)){$errors[] = ' <font color= "red"> Please select a image.</font>';} }
	 }
	 else{ $errors[] = ' <font color= "red"> Product code is already added.</font>'; }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
        <meta charset="UTF-8" />
        <!-- The above 3 meta tags must come first in the head -->

        <title>Save product details</title>

        
        <link rel = "stylesheet" href = "css/product.css" type="text/css">

    </head>
    <body>
            <div class="container">

            <div class="nav1">
            <ul>
            <a href="admin.php"><li>Home</li></a>
            <a href="product.php"><li>Add IceCream</li></a>
            <a href="products_table.php"><li>View & Edit IceCream</li></a>
            <a href="customer.php"><li>Customer</li></a>
            <a href="orders.php"><li>Orders</li></a>
            <a href="adminfeedback.php"><li>Feedback</li></a>
            <a href="adminlogout.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="form-container">
            <h1>Add IceCream Page</h1>

            <div class="messages">
                <?php
                if (isset($errors)) {
                    echo implode('<br/>',$errors);
                } elseif ($productSaved) {
                    echo "<font color= 'blue'>The product details were successfully saved.</font>";
                }
                ?>
            </div>

            <form action="product.php" method="post" enctype="multipart/form-data">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo isset($productName) ? $productName : ''; ?>">
				
				<label for="code">Code</label>
                <input type="text" id="code" name="code" value="<?php echo isset($productCode) ? $productCode : ''; ?>">

                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="0" value="<?php echo isset($productQuantity) ? $productQuantity : '0'; ?>">
				
				<label for="price">Price</label>
                <input type="number" id="price" name="price" min="0" value="<?php echo isset($productPrice) ? $productPrice : '0'; ?>">

                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?php echo isset($productDescription) ? $productDescription : ''; ?>">
				
				<label for="category">Category</label>
                <input type="text" id="category" name="category" value="<?php echo isset($productCategory) ? $productCategory : ''; ?>">

                <label for="file">Images</label>
                <input type="file" id="file" name="file[]" multiple>

                <button type="submit" id="submit" name="submit" class="button">
                    Add
                </button>
            </form>
        </div>
        </div>
    </body>
</html>