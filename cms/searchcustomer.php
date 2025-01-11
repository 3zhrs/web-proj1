<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Customer Records</title>
</head>
<body>
<div class="form">

<h2>View Customer Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Customer ID</strong></th>
<th><strong>Customer Name</strong></th>
<th><strong>Customer IC</strong></th>
<th><strong>Customer Address</strong></th>
<th><strong>Customer Phone No</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<button onclick="location.href='viewcustomer.php'">Back</button>
<tbody>
<?php
$count=1;
$valueToSearch = $_POST['valueToSearch'];
$sel_query="SELECT * FROM `customer` WHERE CONCAT(`cust_id`, `cust_name`, `cust_ic`, `cust_address`, `cust_phoneno`) LIKE '%".$valueToSearch."%'";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["cust_id"]; ?></td>
<td align="center"><?php echo $row["cust_name"]; ?></td>
<td align="center"><?php echo $row["cust_ic"]; ?></td>
<td align="center"><?php echo $row["cust_address"]; ?></td>
<td align="center"><?php echo $row["cust_phoneno"]; ?></td>
<td align="center">
<a href="editcustomer.php?cust_id=<?php echo $row["cust_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletecustomer.php?cust_id=<?php echo $row["cust_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>