<?php
require('db_connect.php');

$cust_id =$_REQUEST['cust_id'];
$query = "SELECT * from rental_equipment where cust_id ='".$cust_id."'"; 
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
$cust_id =$_REQUEST['cust_id'];
$eq_no =$_REQUEST['eq_no'];
$supp_id =$_REQUEST['supp_id'];
$rent_start =$_REQUEST['rent_start'];
$rent_end =$_REQUEST['rent_end'];


$update="update rental_equipment set eq_no='".$eq_no."', supp_id='".$supp_id."',rent_start='".$rent_start."' ,rent_end='".$rent_end."'  where cust_id='".$cust_id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='vieworderequipment.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['cust_id'];?>" />
<p><input type="text" name="eq_no" 
required value="<?php echo $row['eq_no'];?>" /></p>
<p><input type="text" name="supp_id" 
required value="<?php echo $row['supp_id'];?>" /></p>
<p><input type="text" name="rent_start" 
required value="<?php echo $row['rent_start'];?>" /></p>
<p><input type="text" name="rent_end" 
required value="<?php echo $row['rent_end'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>