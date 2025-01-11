<?php  
 require('db_connect.php');
session_start();
	
// Assigning POST values to variables.
$cust_id = $_POST['cust_id'];
$cust_name = $_POST['cust_name'];
$cust_ic = $_POST['cust_ic'];
$cust_address = $_POST['cust_address'];
$cust_phoneno = $_POST['cust_phoneno'];
$_SESSION['customerid'] = $cust_id ;
$_SESSION['customername'] = $cust_name ;
$_SESSION['customeraddress'] = $cust_address ;
$_SESSION['customerphone'] = $cust_phoneno;

// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO customer (cust_id, cust_name, cust_ic, cust_address, cust_phoneno)
VALUES ('$cust_id', '$cust_name', '$cust_ic', '$cust_address', '$cust_phoneno')";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

echo '<script type="text/javascript">'; 
echo 'alert("Register customer successful");'; 
echo 'window.location.href = "registerorderset.html?cust_id";';
echo '</script>';
?>