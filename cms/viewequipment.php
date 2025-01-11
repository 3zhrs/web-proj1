<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Equipment Records</title>
</head>
<body>
<div class="form">

<h2>View Equipment Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Equipment No</strong></th>
<th><strong>Equipment Type</strong></th>
<th><strong>Equipment Brand</strong></th>
<th><strong>Equipment Rent Price</strong></th>
<th><strong>Supplier ID</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<form action="searchequipment.php" method="post">
Search: <input type="text" name="valueToSearch"  />
<input type="submit" />
</form>
<br><br><br><br>
<button onclick="location.href='optionrentalequipment.html'">Back</button>
<tbody>
<?php
$count=1;
$sel_query="Select * from equipment;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["eq_no"]; ?></td>
<td align="center"><?php echo $row["eq_type"]; ?></td>
<td align="center"><?php echo $row["eq_brand"]; ?></td>
<td align="center"><?php echo $row["eq_rent_price"]; ?></td>
<td align="center"><?php echo $row["supp_id"]; ?></td>
<td align="center">
<a href="editequipment.php?eq_no=<?php echo $row["eq_no"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deleteequipment.php?eq_no=<?php echo $row["eq_no"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>