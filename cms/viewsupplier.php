<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Supplier Records</title>
</head>
<body>
<div class="form">

<h2>View Supplier Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Supplier ID</strong></th>
<th><strong>Supplier Phone Num</strong></th>
<th><strong>Supplier Location</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<form action="searchsupplier.php" method="post">
Search: <input type="text" name="valueToSearch"  />
<input type="submit" />
</form>
<br><br><br><br>
<button onclick="location.href='optionrentalequipment.html'">Back</button>
<tbody>
<?php
$count=1;
$sel_query="Select * from supplier;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["supp_id"]; ?></td>
<td align="center"><?php echo $row["supp_phoneno"]; ?></td>
<td align="center"><?php echo $row["supp_location"]; ?></td>
<td align="center">
<a href="editsupplier.php?supp_id=<?php echo $row["supp_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletesupplier.php?supp_id=<?php echo $row["supp_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>