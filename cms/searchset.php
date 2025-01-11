<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Set Records</title>
</head>
<body>
<div class="form">

<h2>View Set Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Set ID</strong></th>
<th><strong>Set Menu</strong></th>
<th><strong>Set Price</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<button onclick="location.href='viewset.php'">Back</button>
<tbody>
<?php
$count=1;
$valueToSearch = $_POST['valueToSearch'];
$sel_query="SELECT * FROM `sets` WHERE CONCAT(`set_id`, `set_menu`, `set_price`) LIKE '%".$valueToSearch."%'";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["set_id"]; ?></td>
<td align="center"><?php echo $row["set_menu"]; ?></td>
<td align="center"><?php echo $row["set_price"]; ?></td>
<td align="center">
<a href="editset.php?set_id=<?php echo $row["set_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deleteset.php?set_id=<?php echo $row["set_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>