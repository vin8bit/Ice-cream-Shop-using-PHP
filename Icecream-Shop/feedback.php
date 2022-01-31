<?php 
    include_once("connection.php");
    
    session_start();
    $cart_count = 0; 
if(!empty($_SESSION["shopping_cart"])) {
   $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}

    if(!empty($_SESSION["username"])) {
        $username = $_SESSION["username"];
        if (isset($_POST['submit'])) {
            $message = isset($_POST['message']) ? $_POST['message'] : '';
            $username = $_SESSION["username"];
            $date = date("Y/m/d");
            $sql = 'INSERT INTO feedback (
                username,
                message,
                date3
            ) VALUES (
                ?, ?, ?
            )';
  
    $statement = $connection->prepare($sql);

    $statement->bind_param('sss', $username,$message, $date );

    $statement->execute();
    echo "<script>alert('Feedback Send Successfully');</script>";
        }    
    }else{
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/feedback.css">
    <link rel='stylesheet' href='./css/icecream.css' type='text/css' media='all' />
    <link rel='stylesheet' href='./css/main.css' type='text/css' media='all' />

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
        <h1>Send Feedback !</h1>
        <div class="feedback">
            <div class="text">
                <p>Feedback is about listening actively, taking the time to analyze, and then thinking of the best possible solution to perform better. It provides positive criticism and allows to see what everyone can change to improve their focus and results.</p>
                <div class="form">
                    <form action="#" method="POST"  id="feedform">
                        <textarea name="message" id="" cols="35" rows="6" form="feedform" required></textarea>
                        <input class="btn" type="submit" name="submit" value="Send">
                    </form>
            </div>
            </div>
            <div class="img"><img src="./icon/ice5.png" alt=""></div>
        </div>
       
    </div>


<div class="footer">
            <h5> © Copyright 2020, All Rights Reserved</h5>
            <div class="footericon">
                <img src="./icon/fb.png" alt="">
                <img src="./icon/insta.png" alt="">
                <img src="./icon/you.png" alt="">
            </div>
            <h4>E-Mail : indo@gmail.com  Phone : 9999999999 </h4>
</div>
</body>
</html>