<?php
require('db_connect.php');

$staff_id=$_REQUEST['staff_id'];
$query = "SELECT * from staff where staff_id='".$staff_id."'"; 
$result = mysqli_query($connection, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>

</head>
<body>
<div class="form">

<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$staff_id =$_REQUEST['staff_id'];
$staff_name =$_REQUEST['staff_name'];
$staff_ic =$_REQUEST['staff_ic'];
$staff_address =$_REQUEST['staff_address'];
$staff_ed_background =$_REQUEST['staff_ed_background'];
$staff_salary =$_REQUEST['staff_salary'];
$staff_job =$_REQUEST['staff_job'];

$update="update staff set staff_name='".$staff_name."', staff_ic='".$staff_ic."',staff_address='".$staff_address."',staff_ed_background='".$staff_ed_background."',staff_salary='".$staff_salary."',staff_job='".$staff_job."' where staff_id='".$staff_id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewstaff.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['staff_id'];?>" />
<p><input type="text" name="staff_name" 
required value="<?php echo $row['staff_name'];?>" /></p>
<p><input type="text" name="staff_ic" 
required value="<?php echo $row['staff_ic'];?>" /></p>
<p><input type="text" name="staff_address" 
required value="<?php echo $row['staff_address'];?>" /></p>
<p><input type="text" name="staff_ed_background" 
required value="<?php echo $row['staff_ed_background'];?>" /></p>
<p><input type="text" name="staff_salary" 
required value="<?php echo $row['staff_salary'];?>" /></p>
<p><input type="text" name="staff_job" 
required value="<?php echo $row['staff_job'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>