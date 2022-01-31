
<?php
include_once("connection.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 

if ($connection->query($query) === TRUE) {
     echo "Record deleted successfully";
     header("Location: customer.php");
	
} else {
  echo "Error deleting record: " . $connection->error;
}

?>