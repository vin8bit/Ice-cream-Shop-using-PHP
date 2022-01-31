<?php 
    include_once("connection.php");
    
    session_start();
    $cart_count = 0; 
if(!empty($_SESSION["shopping_cart"])) {
   $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
    if(!empty($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }else{
        header("location: login.php");
    }

    $sql = "SELECT * FROM orders where username = '$username'";
		//$sql = "SELECT * FROM products INNER JOIN products_images ON products.id = $id";
        $result = $connection->query($sql);
        while($res = $result->fetch_assoc()) {         
            
            $name = $res['name'];
            $address = $res['address'];
			$phone = $res['phone'];
			$date = $res['date2'];
        }		

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/profile.css">
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

    <div class="main">
    <div class="customer-details">
        <h1 class="cd">Customer Details</h1>
    <div class="cname"><h3> Customer Username (ID): <span class="label-text"><?php echo $username?></h3></span></div>
    <div class="cname"><h3> Name : <span class="label-text"> <?php echo $name?></span></h3></div>
    <div class="cname"><h3> Delivery Address : <span class="label-text"> <?php echo $address?></span></h3></div>
    <div class="cname"><h3> Phone No : <span class="label-text"> <?php echo $phone?></span></h3></div>
    <div class="cname"><h3> Order Date(Y:M:D) : <span class="label-text"> <?php echo $date?></span></h3></div>
    <img src="./icon/ice3.png" alt="" class="cimg">
    </div>


    <div class="order-details">
    <h1 class="cd">Orders Details</h1>
    <div>
    <table>
        <tr>
            <th>Icecream Nameh>
            <th>Icecream Code</th>
			<th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php 

        $sql = "SELECT * FROM cart where username='$username' ";
        $result = $connection->query($sql);
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = $result->fetch_assoc()) {         
            echo "<tr>";
            echo "<td>".$res['pname']."</td>";
            echo "<td>".$res['pcode']."</td>";
			echo "<td>".$res['price']."</td>";
            echo "<td>".$res['quantity']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
	</div>
    </dic>
    </div>
    </div>
    <div class="footer">
            <h5> © Copyright 2020, All Rights Reserved</h5>
            <div class="footericon">
                <img src="./icon/fb.png" alt="">
                <img src="./icon/insta.png" alt="">
                <img src="./icon/you.png" alt="">
            </div>
            <h4>E-Mail : info.com  Phone : 9999999999 </h4>
</div>
</body>
</html>