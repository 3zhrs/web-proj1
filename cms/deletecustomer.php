<?php
require('db_connect.php');
$cust_id = $_REQUEST['cust_id'];
$query = "DELETE FROM customer WHERE cust_id ='".$cust_id ."'";
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: viewcustomer.php"); 
?>