<?php
require('db_connect.php');
$addon_id=$_REQUEST['addon_id'];
$query = "DELETE FROM addon WHERE addon_id='".$addon_id."'";
$result = mysqli_query($connection,$query) or die ( mysqli_error());
header("Location: viewaddon.php"); 
?>