<?php
session_start();
$cart_count = 0; 
if(!empty($_SESSION["shopping_cart"])) {
   $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ice Creams</title>
    <link rel='stylesheet' href='./css/icecream.css' type='text/css' media='all' />
    <link rel='stylesheet' href='./css/main.css' type='text/css' media='all' />

</head>
<body>

 <!--========== header Navbar=========== -->
 <nav>
        <div class="header">
            <div class="logo-div">
                <a href="#default" class="logo">YUMMY ICE</a>
            </div>
            <!-- menu bar -->
            <div class="header-menu">
                <ul>
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                    <a href="icecream.php">
                        <li>IceCream</li>
                    </a>
					<a href="profile.php">
                        <li>Your_Order</li>
                    </a>
					<a href="feedback.php">
                        <li>Feedback</li>
                    </a>
                    <a href="about.php">
                        <li>About</li>
                    </a>
    
                </ul>
            </div>
			
			<div class = "cardmenu">  <a href="cart.php"> <li> <img src="cart-icon.png" /><span id="countcard"><?php echo $cart_count; ?></span> </li></a> </div>
			
        </div>
        <!-- resposive menu -->        
        <label class="toggle-btn" for="nav-chk">
            <span>&#9776;</span>
        </label>
        <div class="resp-menu">
            <input type="checkbox" id="nav-chk" />
            <div class="r-menu">
                <ul>
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                     <a href="icecream.php">
                        <li>IceCream</li>
                    </a>
					<a href="profile.php">
                        <li>Your_Order</li>
                    </a>
					<a href="feedback.php">
                        <li>Feedback</li>
                    </a>
                    <a href="about.php">
                        <li>About</li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

	<!--========== end header Navbar=========== -->






    <?php
include('connection.php');

if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$sql = "SELECT * FROM products INNER JOIN products_images ON products.code = products_images.codem AND products.code = '".$code."'" ;
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['filename'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);
if(!empty($_SESSION["username"])) {
if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "Product is added to your cart!";
	 echo "<script>alert('$status');</script>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "Product is already added to your cart!";	
    echo "<script>alert('$status');</script>"; 
	

	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "Product is added to your cart!";

    echo "<script>alert('$status');</script>"; 
	//header("Location: index.php");
	
	}

	}
}	else { header("Location: indexlogin.php"); }
}

?>
<div class="container">
<div class="sidebar">
    <form action="" method="POST">

     <input type="text" name="search-box" placeholder="Ice Name">
     <input class="searchbtn" type="submit" name="searchbtn" value="Search">
     </form>
     <img src="./icon/ice5.png" alt="" class="ice1">
</div>
<div class="product2" id="searchdiv">  
  


<?php
if(isset($_POST['searchbtn'])){
$productName = isset($_POST['search-box']) ? $_POST['search-box'] : '';
$sql2 = "SELECT * FROM products INNER JOIN products_images ON products.id = products_images.product_id WHERE products.name='$productName'";
$result = $connection->query($sql2);
while($row = $result->fetch_assoc()){
		echo "<div class='product_wrapper' id='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['filename']."' /></div>
			  <div  class='name '>".$row['name']."</div>
				 <div class='price'>Rs ".$row['price']."</div>
				 <div class='description'>".$row['description']."</div>
			  <button type='submit' id='submit' name='submit' class='buy'>Add To Cart</button>
			  </form>
		   	  </div>";
        }





$productName = "";

}
if(empty($_POST['search-box'])){
$sql2 = "SELECT * FROM products INNER JOIN products_images ON products.id = products_images.product_id";
$result = $connection->query($sql2);
while($row = $result->fetch_assoc()){
		echo "<div class='product_wrapper' id='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['filename']."' /></div>
			  <div  class='name '>".$row['name']."</div>
				 <div class='price'>Rs ".$row['price']."</div>
				 <div class='description'>".$row['description']."</div>
			  <button type='submit' id='submit' name='submit' class='buy'>Add To Cart</button>
			  </form>
		   	  </div>";
        }
    }       
//mysqli_close($connection);
?>

<div style="clear:both;"></div>

<br /><br />

</div>
</div>

<div class="footer">
            <h5> © Copyright 2020, All Rights Reserved</h5>
            <div class="footericon">
                <img src="./icon/fb.png" alt="">
                <img src="./icon/insta.png" alt="">
                <img src="./icon/you.png" alt="">
            </div>
            <h4>E-Mail : info@gmail.com  Phone : 9999999999 </h4>
</div>

</body>
</html>