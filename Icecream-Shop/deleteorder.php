
<?php
include_once("connection.php");
$id=$_REQUEST['id'];
echo #id;
$query = "DELETE FROM orders WHERE username='$id'"; 
$query2 = "DELETE FROM cart WHERE username='$id'"; 
if ($connection->query($query) === TRUE) {
	if ($connection->query($query2) === TRUE) {
     echo "Record deleted successfully";
     header("Location: orders.php");
	}  
} else {
  echo "Error deleting record: " . $connection->error;
}

?>