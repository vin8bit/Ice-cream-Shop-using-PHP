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
//including the database connection file
include_once("connection.php");
// Upload configs.
define('UPLOAD_DIR', 'uploads');
define('UPLOAD_MAX_FILE_SIZE', 10485760); // 10MB.
//@changed_2018-02-17_14.28
define('UPLOAD_ALLOWED_MIME_TYPES', 'image/jpeg,image/png,image/gif');


if (isset($_POST['update'])) {
    /*
     * Read posted values.
     */
	$id =  isset($_POST['id']) ? $_POST['id'] : '';
    $productName = isset($_POST['name']) ? $_POST['name'] : '';
    $productQuantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
	$productPrice = isset($_POST['price']) ? $_POST['price'] : 0;
    $productDescription = isset($_POST['description']) ? $_POST['description'] : '';
	$productCategory = isset($_POST['category']) ? $_POST['category'] : '';

    /*
     * Validate posted values.
     */
    if (empty($productName)) {
        $errors[] = "<font color='red'>Please provide a product name.</font><br/>";
    }

    if ($productQuantity == 0) {
		$errors[] = "<font color='red'>Please provide the quantity.</font><br/>";

	}

	if ($productPrice == 0) {
        $errors[] = '<font color="red">Please provide a price. </font><br/>';
    }
	
    if (empty($productDescription)) {
        $errors[] = '<font color="red"> Please provide a description.</font><br/>';
    }
	
	if (empty($productCategory)) {
        $errors[] = '<font color="red"> Please provide a category.</font><br/>';
    }



	 if(empty($_FILES['image']['error'])){ echo "<font color='red'>True</font><br/>";
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $exploded = explode('.', $_FILES['image']['name']);
      $file_ext = strtolower(end($exploded));
      
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         $image_url = "uploads/".$file_name;
		 $sql3 = "UPDATE products_images SET filename='$image_url' WHERE product_id='$id'";
		                   if ($connection->query($sql3) === TRUE) {
	                          }else{ print_r($errors);}
	   
     }
 
	 }	
	 
	 /* 
		Product Table update
	 */
	 if(empty($errors)==true){ 
	 
					
					 $sql2 = "UPDATE products SET name='$productName', quantity='$productQuantity', category='$productCategory', price='$productPrice', description='$productDescription'  WHERE id='$id'";
		                   if ($connection->query($sql2) === TRUE) {
							echo "<font color= 'blue'>The product details were successfully updated.</font>"; 
							header("Location: products_table.php");
						   }
	 
	 } else{
		 echo implode('<br/>',$errors);
	 }
	
   
}	

?>


<?php 

$id = $_REQUEST['id'];
        $sql = "SELECT * FROM products INNER JOIN products_images ON products.id = products_images.product_id AND products.id = $id" ;
		//$sql = "SELECT * FROM products INNER JOIN products_images ON products.id = $id";
        $result = $connection->query($sql);
        while($res = $result->fetch_assoc()) {         
            
            $productName = $res['name'];
            $productQuantity = $res['quantity'];
            $productCategory = $res['category'];
			//$image_url2 = $res['filename'];
			$productPrice = $res['price'];
            $productDescription = $res['description'];
        }		
 ?>
 
 
 
 <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
        <meta charset="UTF-8" />
        <!-- The above 3 meta tags must come first in the head -->

        <title>Update IceCream Page</title>

        
        <link rel = "stylesheet" href = "css/product.css" type="text/css">

    </head>
    <body>

        <div class="form-container">
            <h1>Update IceCream</h1>
			
            <form name = "form1" action="edit_page.php " method="post" enctype="multipart/form-data">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo isset($productName) ? $productName : ''; ?>">

                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="0" value="<?php echo isset($productQuantity) ? $productQuantity : '0'; ?>">
				
				<label for="price">Price</label>
                <input type="number" id="price" name="price" min="0" value="<?php echo isset($productPrice) ? $productPrice : '0'; ?>">

                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?php echo isset($productDescription) ? $productDescription : ''; ?>">
				
				<label for="category">Category</label>
                <input type="text" id="category" name="category" value="<?php echo isset($productCategory) ? $productCategory : ''; ?>">
				

                <label for="file">Images</label>
                <input type="file" id="image" name="image" multiple>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <button type="submit" value = "update" name="update" class="button">
				
                   Update
                </button>
            </form>
        </div>

    </body>
</html>
