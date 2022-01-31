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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Admin</title>
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

        <div class="welcome">
            <h1>Welcome Admin</h1>
            <img src="./icon/ice4.png" alt="">
            <h3>IceCream :</h3>
            <p>Ice cream (derived from earlier iced cream or cream ice)[1] is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla. Colourings are usually added, in addition to stabilizers. The mixture is stirred to incorporate air spaces and cooled below the freezing point of water to prevent detectable ice crystals from forming. The result is a smooth, semi-solid foam that is solid at very low temperatures (below 2 °C or 35 °F). It becomes more malleable as its temperature increases. </p>
        </div>
    </div>
</body>
</html>