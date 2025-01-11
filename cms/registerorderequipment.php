<?php  
 require('db_connect.php');
session_start();
// Assigning POST values to variables.
$cust_id = $_SESSION['customerid'];
$eq_no = $_POST['eq_no'];
$rent_start = $_POST['rent_start'];
$rent_end = $_POST['rent_end'];
$rent_quantity = $_POST['rent_quantity'];
$supp_id = $_POST['supp_id'];


// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO RENTAL_EQUIPMENT (cust_id, eq_no, rent_start, rent_end, rent_quantity, supp_id)
VALUES ('$cust_id', '$eq_no' ,'$rent_start', '$rent_end', '$rent_quantity', '$supp_id')";


 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
echo '<script type="text/javascript">'; 
echo 'alert("Register order equipment successful");'; 
echo 'window.location.href = "registerorderequipment.html";';
echo '</script>';


?>