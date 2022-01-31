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
$sql = "SELECT * FROM users";
$result = $connection->query($sql);
?>
 
<html>
<head>    
    <title>Customer</title>
	<link rel="stylesheet" href="css/customer.css" type="text/css">
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
    <div class="ctable">
        <h1>Customer Table</h1>
        <div class="searchc">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for username(ID)..">
        </div>
    <table id="myTable">
        <tr>
            <th>Username(ID)</th>
            <th>Full Name</th>
            <th>Email ID</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = $result->fetch_assoc()) {         
            echo "<tr>";
            echo "<td>".$res['username']."</td>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['email']."</td>";
			echo "<td>".$res['trn_date']."</td>";
            echo "<td><a href=\"deleteCustomer.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			echo "</tr>";
        }
        ?>
    </table>
    </div>
    </div>


    <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction2() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>
</body>
</html>