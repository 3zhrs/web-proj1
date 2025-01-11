<?php
require('db_connect.php');
$staff_id=$_REQUEST['staff_id'];
$query = "DELETE FROM staff WHERE staff_id='".$staff_id."'";
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: viewstaff.php"); 
?>