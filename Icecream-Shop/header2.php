<?php
session_start();
$cart_count = 0; 
if(!empty($_SESSION["shopping_cart"])) {
   $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}

?>
	
<!DOCTYPE html>
<html>
    <head>
        <title>Icecream Shop </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/header2.css" type="text/css">

	</head>
<body>

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
	
</body>
</html>