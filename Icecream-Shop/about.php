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
    <link rel='stylesheet' href='./css/icecream.css' type='text/css' media='all' />
    <link rel='stylesheet' href='./css/main.css' type='text/css' media='all' />
    <link rel='stylesheet' href='./css/about.css' type='text/css' media='all' />

    <title>Document</title>
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

    <div class="main">
    <h3>Project Name : IceCream Parlour Management System</h3>
    <h3>Project Developed by Vineet Kumar</h3>
    <h3>Any Help Whatsapp No: 8510800127</h3>
    <h3>E-Mail : info@gmail.com</h3>
    <img src="./icon/ice3.png" alt="">
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