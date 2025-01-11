<?php
require('db_connect.php');
$supp_id=$_REQUEST['supp_id'];
$query = "DELETE FROM supplier WHERE supp_id='".$supp_id."'";
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: viewsupplier.php"); 
?>