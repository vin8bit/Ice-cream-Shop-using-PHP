<?php 
include 'connection.php';
session_start();
$username = $_SESSION["username"];

if (isset($_POST['submit'])) {
  
    $name = isset($_POST['name']) ? $_POST['name'] : '';
	$address = isset($_POST['address']) ? $_POST['address'] : '';
    $number = isset($_POST['number']) ? $_POST['number']: 0;
    $date = date("Y/m/d");
    $sql = "INSERT INTO orders (
        username,name , address ,phone,date2
    ) VALUES (
        ?, ?, ?, ?, ?
    )";
$statement = $connection->prepare($sql);
$statement->bind_param('sssis', $username,$name, $address, $number, $date );
$statement->execute();
$statement->close();


foreach ($_SESSION["shopping_cart"] as $product){   
  
    $sql = "INSERT INTO cart (
        username,pname , pcode ,price,quantity
    ) VALUES (
        ?, ?, ?, ?, ?
    )";
$statement = $connection->prepare($sql);
$statement->bind_param('sssii', $username,$product["name"], $product["code"], $product["price"], $product["quantity"] );
$statement->execute();
$statement->close();
}

echo "<script>alert('Order Successfully');</script>"; 

}
?>





<html>
<head>
<title>Order Reciept</title>
<link rel='stylesheet' href='css/confirmorder.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Order Reciept</h2>   
<div class="cname"><h3> Customer Username : <span class="label-text"><?php echo $username?></h3></span></div>
<div class="cname"><h3> Name : <span class="label-text"> <?php echo $name?></span></h3></div>
<div class="cname"><h3> Delivery Address : <span class="label-text"> <?php echo $address?></span></h3></div>
<div class="cname"><h3> Phone No : <span class="label-text"> <?php echo $number?></span></h3></div>
<div class="cname"><h3> Order Date(Y:M:D) : <span class="label-text"> <?php echo $date?></span></h3></div>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr class="heading">
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />

</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<label for=""><?php echo $product["quantity"]; ?></label>

</form>
</td>
<td><?php echo "Rs ".$product["price"]; ?></td>
<td><?php echo "Rs ".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs ".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>	
<button type='button' class ="button button1" onclick="location.href='#'">Print Reciept</button>
<button type='button' class ="button button1" onclick="location.href='index.php'">Home</button>

  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>
<?php 
    session_unset();

?>

<br /><br />
</div>
</body>
</html>