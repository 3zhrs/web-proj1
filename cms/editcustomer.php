<?php
require('db_connect.php');

$cust_id =$_REQUEST['cust_id'];
$query = "SELECT * from customer where cust_id ='".$cust_id."'"; 
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
$cust_name =$_REQUEST['cust_name'];
$cust_ic =$_REQUEST['cust_ic'];
$cust_address =$_REQUEST['cust_address'];
$cust_phoneno =$_REQUEST['cust_phoneno'];


$update="update customer set cust_name='".$cust_name."', cust_ic='".$cust_ic."', cust_address='".$cust_address."', cust_phoneno='".$cust_phoneno."' where cust_id='".$cust_id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewcustomer.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['cust_id'];?>" />
<p><input type="text" name="cust_name" 
required value="<?php echo $row['cust_name'];?>" /></p>
<p><input type="text" name="cust_ic" 
required value="<?php echo $row['cust_ic'];?>" /></p>
<p><input type="text" name="cust_address" 
required value="<?php echo $row['cust_address'];?>" /></p>
<p><input type="text" name="cust_phoneno" 
required value="<?php echo $row['cust_phoneno'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>