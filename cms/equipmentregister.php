<?php  
 require('db_connect.php');

	
// Assigning POST values to variables.
$eq_no= $_POST['eq_no'];
$eq_type= $_POST['eq_type'];
$eq_brand= $_POST['eq_brand'];
$eq_rent_price= $_POST['eq_rent_price'];
$supp_id= $_POST['supp_id'];



// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO equipment (eq_no, eq_type, eq_brand, eq_rent_price, supp_id)
VALUES ('$eq_no', '$eq_type', '$eq_brand', '$eq_rent_price', '$supp_id')";
 
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 
echo '<script type="text/javascript">'; 
echo 'alert("Register equipment successful");'; 
echo 'window.location.href = "equipmentregister.html";';
echo '</script>';


?>