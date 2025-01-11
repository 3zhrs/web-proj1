<?php
require('db_connect.php');

$cust_id =$_REQUEST['cust_id'];
$query = "SELECT * from ordering where cust_id ='".$cust_id."'"; 
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
$set_id =$_REQUEST['set_id'];
$addon_id =$_REQUEST['addon_id'];
$staff_id =$_REQUEST['staff_id'];
$order_date =$_REQUEST['order_date'];
$order_quantity =$_REQUEST['order_quantity'];

$update="update ordering set set_id='".$set_id."', addon_id='".$addon_id."', staff_id='".$staff_id."', order_date='".$order_date."',order_quantity='".$order_quantity."'  where cust_id='".$cust_id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='vieworderfood.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['cust_id'];?>" />
<p><input type="text" name="set_id" 
value="<?php echo $row['set_id'];?>" /></p>
<p><input type="text" name="addon_id" 
value="<?php echo $row['addon_id'];?>" /></p>
<p><input type="text" name="staff_id" 
required value="<?php echo $row['staff_id'];?>" /></p>
<p><input type="text" name="order_date" 
required value="<?php echo $row['order_date'];?>" /></p>
<p><input type="text" name="order_quantity" 
required value="<?php echo $row['order_quantity'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>