<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="./css/loginhh.css" />
</head>
<body>
<?php
	require('connection.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `admin` WHERE username='$username' and password='".$password."'";
    $result = mysqli_query($connection,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = "admin";
			echo "<script>alert('Login_succeed');</script>";
			header("Location: admin.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='adminlogin.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
<h1>Admin LogIn</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
</div>
<?php } ?>


</body>
</html>
