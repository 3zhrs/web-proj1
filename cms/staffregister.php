<?php  
 require('db_connect.php');

	
// Assigning POST values to variables.
$staff_id = $_POST['staff_id'];
$staff_name = $_POST['staff_name'];
$staff_ic = $_POST['staff_ic'];
$staff_address = $_POST['staff_address'];
$staff_ed_background = $_POST['staff_ed_background'];
$staff_salary = $_POST['staff_salary'];
$staff_job = $_POST['staff_job'];


// CHECK FOR THE RECORD FROM TABLE
$query = "INSERT INTO staff (staff_id, staff_name, staff_ic, staff_address, staff_ed_background, staff_salary, staff_job)
VALUES ('$staff_id', '$staff_name', '$staff_ic', '$staff_address', '$staff_ed_background', '$staff_salary', '$staff_job')";
 
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 
echo '<script type="text/javascript">'; 
echo 'alert("Register staff successful");'; 
echo 'window.location.href = "staffregister.html";';
echo '</script>';


?>