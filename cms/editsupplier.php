<?php
require('db_connect.php');

$supp_id=$_REQUEST['supp_id'];
$query = "SELECT * from supplier where supp_id='".$supp_id."'"; 
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
$supp_id =$_REQUEST['supp_id'];
$supp_phoneno =$_REQUEST['supp_phoneno'];
$supp_location =$_REQUEST['supp_location'];

$update="update supplier set supp_phoneno='".$supp_phoneno."', supp_location='".$supp_location."' where supp_id='".$supp_id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewsupplier.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['supp_id'];?>" />
<p><input type="text" name="supp_phoneno" 
required value="<?php echo $row['supp_phoneno'];?>" /></p>
<p><input type="text" name="supp_location" 
required value="<?php echo $row['supp_location'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
