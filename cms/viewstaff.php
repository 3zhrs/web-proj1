<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Staff Records</title>
</head>
<body>
<div class="form">

<h2>View Staff Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Staff ID</strong></th>
<th><strong>Staff Name</strong></th>
<th><strong>Staff IC</strong></th>
<th><strong>Staff Address</strong></th>
<th><strong>Staff Ed. Background</strong></th>
<th><strong>Staff Salary</strong></th>
<th><strong>Staff Job</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<form action="searchstaff.php" method="post">
Search: <input type="text" name="valueToSearch"  />
<input type="submit" />
</form>
<br><br><br><br>
<button onclick="location.href='optionstaff.html'">Back</button>
<tbody>
<?php
$count=1;
$sel_query="Select * from staff;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["staff_id"]; ?></td>
<td align="center"><?php echo $row["staff_name"]; ?></td>
<td align="center"><?php echo $row["staff_ic"]; ?></td>
<td align="center"><?php echo $row["staff_address"]; ?></td>
<td align="center"><?php echo $row["staff_ed_background"]; ?></td>
<td align="center"><?php echo $row["staff_salary"]; ?></td>
<td align="center"><?php echo $row["staff_job"]; ?></td>
<td align="center">
<a href="editstaff.php?staff_id=<?php echo $row["staff_id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletestaff.php?staff_id=<?php echo $row["staff_id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
