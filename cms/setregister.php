<?php  
 require('db_connect.php');

	
// Assigning POST values to variables.
$set_id = $_POST['set_id'];
$set_menu = $_POST['set_menu'];
$set_price = $_POST['set_price'];


// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO sets (set_id, set_menu, set_price)
VALUES ('$set_id', '$set_menu', '$set_price')";
 
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 
echo '<script type="text/javascript">'; 
echo 'alert("Register set successful");'; 
echo 'window.location.href = "setregister.html";';
echo '</script>';


?>