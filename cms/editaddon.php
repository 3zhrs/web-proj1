<?php
require('db_connect.php');

$addon_id=$_REQUEST['addon_id'];
$query = "SELECT * from addon where addon_id='".$addon_id."'"; 
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
$addon_id =$_REQUEST['addon_id'];
$addon_menu =$_REQUEST['addon_menu'];
$addon_price =$_REQUEST['addon_price'];

$update="update addon set addon_menu='".$addon_menu."', addon_price='".$addon_price."' where addon_id='".$addon_id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewaddon.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['addon_id'];?>" />
<p><input type="text" name="addon_menu" 
required value="<?php echo $row['addon_menu'];?>" /></p>
<p><input type="text" name="addon_price" 
required value="<?php echo $row['addon_price'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
