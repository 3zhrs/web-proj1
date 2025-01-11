<?php
require('db_connect.php');

$set_id=$_REQUEST['set_id'];
$query = "SELECT * from sets where set_id='".$set_id."'"; 
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
$set_id =$_REQUEST['set_id'];
$set_menu =$_REQUEST['set_menu'];
$set_price =$_REQUEST['set_price'];

$update="update sets set set_menu='".$set_menu."', set_price='".$set_price."' where set_id='".$set_id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewset.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['set_id'];?>" />
<p><input type="text" name="set_menu" 
required value="<?php echo $row['set_menu'];?>" /></p>
<p><input type="text" name="set_price" 
required value="<?php echo $row['set_price'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
