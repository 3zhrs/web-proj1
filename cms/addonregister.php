<?php  
 require('db_connect.php');

	
// Assigning POST values to variables.
$addon_id = $_POST['addon_id'];
$addon_menu = $_POST['addon_menu'];
$addon_price = $_POST['addon_price'];


// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO addon (addon_id, addon_menu, addon_price)
VALUES ('$addon_id', '$addon_menu', '$addon_price')";
 
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 
echo '<script type="text/javascript">'; 
echo 'alert("Register add-on successful");'; 
echo 'window.location.href = "addonregister.html";';
echo '</script>';


?>