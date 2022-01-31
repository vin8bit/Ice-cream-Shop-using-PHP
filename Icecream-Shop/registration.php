

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/loginhh.css" />
</head>
<body>
<?php
    $flag =0;
	require('connection.php');
	
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
	   $sql = "SELECT * FROM users WHERE username ='". $username."'" ;
        $result = $connection->query($sql);
        while($res = $result->fetch_assoc()) {         
            $code1 = $res['username'];
			if($code1 === $username){
			  $flag =1;
			}
        }$result->close();
	if($flag == 0){
		$username = mysqli_real_escape_string($connection,$username);
		$name = isset($_POST['name']) ? $_POST['name'] : '';
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($connection,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($connection,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date,name) VALUES ('$username', '".md5($password)."', '$email', '$trn_date', '$name')";
        $result = mysqli_query($connection,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
	}else{ echo "<script>alert('Username already added.');</script>"; }	
    }
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="text" name="name" placeholder="Full Name" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
	<?php    ?>
</body>
</html>
