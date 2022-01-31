
<?php
include_once("connection.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM feedback WHERE username='$id'"; 

if ($connection->query($query) === TRUE) {
     echo "Record deleted successfully";
     header("Location: adminfeedback.php");
	
} else {
  echo "Error deleting record: " . $connection->error;
}

?>