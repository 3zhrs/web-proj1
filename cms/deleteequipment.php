<?php
require('db_connect.php');
$eq_no=$_REQUEST['eq_no'];
$query = "DELETE FROM equipment WHERE eq_no='".$eq_no."'";
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: viewequipment.php"); 
?>