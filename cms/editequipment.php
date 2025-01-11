<?php
require('db_connect.php');

$eq_no=$_REQUEST['eq_no'];
$query = "SELECT * from equipment where eq_no='".$eq_no."'"; 
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
$eq_no =$_REQUEST['eq_no'];
$eq_type =$_REQUEST['eq_type'];
$eq_brand =$_REQUEST['eq_brand'];
$eq_rent_price =$_REQUEST['eq_rent_price'];
$supp_id =$_REQUEST['supp_id'];

$update="update equipment set eq_type='".$eq_type."', eq_brand='".$eq_brand."', eq_rent_price='".$eq_rent_price."', supp_id='".$supp_id."' where eq_no='".$eq_no."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewequipment.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['eq_no'];?>" />
<p><input type="text" name="eq_type" 
required value="<?php echo $row['eq_type'];?>" /></p>
<p><input type="text" name="eq_brand" 
required value="<?php echo $row['eq_brand'];?>" /></p>
<p><input type="text" name="eq_rent_price" 
required value="<?php echo $row['eq_rent_price'];?>" /></p>
<p><input type="text" name="supp_id" 
required value="<?php echo $row['supp_id'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
