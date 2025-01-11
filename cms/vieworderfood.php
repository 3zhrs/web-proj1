<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Set and Add-on Order Records</title>
</head>
<body>
<div class="form">

<h2>View Set and Add-on Order Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Customer ID</strong></th>
<th><strong>Set ID</strong></th>
<th><strong>Add-on ID</strong></th>
<th><strong>Staff ID</strong></th>
<th><strong>Order Date</strong></th>
<th><strong>Order Quantity</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<form action="searchorderfood.php" method="post">
Search: <input type="text" name="valueToSearch"  />
<input type="submit" />
</form>
<br><br><br><br>
<button onclick="location.href='optioncustomerorder.html'">Back</button>
<tbody>
<?php
$count=1;
$sel_query="Select * from ordering;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["cust_id"]; ?></td>
<td align="center"><?php echo $row["set_id"]; ?></td>
<td align="center"><?php echo $row["addon_id"]; ?></td>
<td align="center"><?php echo $row["staff_id"]; ?></td>
<td align="center"><?php echo $row["order_date"]; ?></td>
<td align="center"><?php echo $row["order_quantity"]; ?></td>
<td align="center">
<a href="editorderfood.php?cust_id=<?php echo $row["cust_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deleteorderfood.php?cust_id=<?php echo $row["cust_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>