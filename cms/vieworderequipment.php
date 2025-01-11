<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Equipment Order Records</title>
</head>
<body>
<div class="form">

<h2>View Equipment Order Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Customer ID</strong></th>
<th><strong>Equipment No</strong></th>
<th><strong>Supplier ID</strong></th>
<th><strong>Rental Start</strong></th>
<th><strong>Rental End</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<form action="searchorderequipment.php" method="post">
Search: <input type="text" name="valueToSearch"  />
<input type="submit" />
</form>
<br><br><br><br>
<button onclick="location.href='optioncustomerorder.html'">Back</button>
<tbody>
<?php
$count=1;
$sel_query="Select * from rental_equipment;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["cust_id"]; ?></td>
<td align="center"><?php echo $row["eq_no"]; ?></td>
<td align="center"><?php echo $row["supp_id"]; ?></td>
<td align="center"><?php echo $row["rent_start"]; ?></td>
<td align="center"><?php echo $row["rent_end"]; ?></td>
<td align="center"><?php echo $row["rent_quantity"]; ?></td>
<td align="center">
<a href="editorderequipment.php?cust_id=<?php echo $row["cust_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deleteorderequipment.php?cust_id=<?php echo $row["cust_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>