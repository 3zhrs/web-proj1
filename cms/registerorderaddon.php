<?php  
 require('db_connect.php');
session_start();
// Assigning POST values to variables.
$cust_id = $_SESSION['customerid'];
$addon_id = $_POST['addon_id'];
$staff_id = $_POST['staff_id'];
$order_date = $_POST['order_date'];
$order_quantity = $_POST['order_quantity'];

// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO ordering (cust_id, set_id, addon_id, staff_id, order_date, order_quantity)
VALUES ('$cust_id', NULL , '$addon_id', '$staff_id', '$order_date', '$order_quantity')";
 
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 
echo '<script type="text/javascript">'; 
echo 'alert("Register addon order successful");'; 
echo 'window.location.href = "registerorderaddon.html";';
echo '</script>';


?>