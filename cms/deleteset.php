<?php
require('db_connect.php');
$set_id=$_REQUEST['set_id'];
$query = "DELETE FROM sets WHERE set_id='".$set_id."'";
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: viewset.php"); 
?>