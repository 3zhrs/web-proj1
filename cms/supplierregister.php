<?php  
 require('db_connect.php');

	
// Assigning POST values to variables.
$supp_id = $_POST['supp_id'];
$supp_phoneno = $_POST['supp_phoneno'];
$supp_location = $_POST['supp_location'];



// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO supplier (supp_id, supp_phoneno, supp_location)
VALUES ('$supp_id', '$supp_phoneno', '$supp_location')";
 
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 
echo '<script type="text/javascript">'; 
echo 'alert("Register supplier successful");'; 
echo 'window.location.href = "supplierregister.html";';
echo '</script>';


?>