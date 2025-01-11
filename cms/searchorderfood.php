<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Set & Add-on Order Records</title>
</head>
<body>
<div class="form">

<h2>View Set Records</h2>
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
<button onclick="location.href='vieworderfood.php'">Back</button>
<tbody>
<?php
$count=1;
$valueToSearch = $_POST['valueToSearch'];
$sel_query="SELECT * FROM `ordering` WHERE CONCAT(`cust_id`, `set_id`, `addon_id`, `staff_id`, `order_date`, `order_quantity`) LIKE '%".$valueToSearch."%'";
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