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
$username =  isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="./css/vieworder.css">
</head>
<body>
    <div class="container">
        <h1>Customer Username: <span><?php echo $username;?></span> </h1>
        <h2>Order List: </h2>
    <div class="tb">
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
    </div>
</body>
</html>