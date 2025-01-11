<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Add-On Records</title>
</head>
<body>
<div class="form">

<h2>View Set Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Add-On ID</strong></th>
<th><strong>Add-On Menu</strong></th>
<th><strong>Add-On Price</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<form action="searchaddon.php" method="post">
Search: <input type="text" name="valueToSearch"  />
<input type="submit" /> 
</form>
<br><br><br>
<button onclick="location.href='optionaddon.html'">Back</button>
<tbody>
<?php
$count=1;
$sel_query="Select * from addon";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["addon_id"]; ?></td>
<td align="center"><?php echo $row["addon_menu"]; ?></td>
<td align="center"><?php echo $row["addon_price"]; ?></td>
<td align="center">
<a href="editaddon.php?addon_id=<?php echo $row["addon_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deleteaddon.php?addon_id=<?php echo $row["addon_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
