<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="./css/checkout.css">
</head>
<body>
    <div class=or-container>
        <h2>Orders Details</h2>
        <form action="confirmorder.php" method="POST">
            <label for="name">Customer Name</label>
            <input type="text" id='name'name="name" required>
            <label for="address">Delivery Address</label>
            <input type="text" id='address' name="address" required>
            <label for="number">Phone No</label>
            <input type="number" id='number' name="number"  required>
            <input type="submit" name="submit" class='submitbtn' value="Order">
        </form>

    </div>
</body>
</html>