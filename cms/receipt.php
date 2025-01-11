<?php
require('db_connect.php');
session_start();
$cust_id = $_SESSION['customerid'];
$custname = $_SESSION['customername'];
$custaddress = $_SESSION['customeraddress'];
$custphone = $_SESSION['customerphone'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Receipt</title>
</head>
<body>
<div class="form">

<h2>Receipt</h2>
Customer ID: <?php echo $cust_id;?><br>
Name: <?php echo $custname;?><br>
Address: <?php echo $custaddress;?><br>
Phone No.: <?php echo $custphone;?><br>

<br> Invoice generate at <?php echo date("Y/m/d")?> on <?php echo date("h:i:sa")?><br>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Items</strong></th>
<th><strong>Description</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
</tr>
</thead>
<br>

<tbody>
<?php
$totalset=0;
$count=1;
$sel_query="Select set_id, order_quantity from ordering where cust_id = '$cust_id' AND addon_id is null ;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["set_id"]; $temp = $row["set_id"]; ?></td>
<?php $query1="Select set_menu, set_price from sets where set_id = '$temp';";
$result2 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_assoc($result2);
$totalset = $totalset + $row["order_quantity"] * $row1["set_price"];
?>
<td align="center"><?php echo $row1["set_menu"];?></td>
<td align="center"><?php echo $row["order_quantity"]; ?></td>
<td align="center"><?php echo $row1["set_price"]; ?></td>
</tr>
<?php $count++; } ?>

<?php
$totaladdon=0;
$count=1;
$sel_query="Select addon_id, order_quantity from ordering where cust_id = '$cust_id' AND set_id is null ;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["addon_id"]; $temp = $row["addon_id"]; ?></td>
<?php $query1="Select addon_menu, addon_price from addon where addon_id = '$temp';";
$result2 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_assoc($result2);
$totaladdon = $totaladdon + $row["order_quantity"] * $row1["addon_price"];
?>
<td align="center"><?php echo $row1["addon_menu"];?></td>
<td align="center"><?php echo $row["order_quantity"]; ?></td>
<td align="center"><?php echo $row1["addon_price"]; ?></td>
</tr>
<?php $count++; } ?>

<?php
$totalequipment=0;
$count=1;
$sel_query="Select eq_no, rent_quantity from rental_equipment where cust_id = '$cust_id';";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["eq_no"]; $temp = $row["eq_no"]; ?></td>
<?php $query1="Select eq_type, eq_rent_price from equipment where eq_no = '$temp';";
$result2 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_assoc($result2);
$totalequipment = $totalequipment + $row["rent_quantity"] * $row1["eq_rent_price"];
?>
<td align="center"><?php echo $row1["eq_type"];?></td>
<td align="center"><?php echo $row["rent_quantity"]; ?></td>
<td align="center"><?php echo $row1["eq_rent_price"]; ?></td>
</tr>
<?php $count++; } ?>


</tbody>
</table>
<br>

<?php $totalprice = $totalset + $totaladdon + $totalequipment; $deposit = $totalprice / 2 ?> 
<p style="text-align:right">Set: RM <?php echo $totalset; ?></p>
<p style="text-align:right">Add-on: + RM <?php echo $totaladdon; ?></p>
<p style="text-align:right">Equipment: + RM <?php echo $totalequipment; ?></p>
<p style="text-align:right">Total Price: RM <?php echo $totalprice; ?></p>
<p style="text-align:right">Deposit: RM <?php echo $deposit; ?></p>
</div>
<button onclick="location.href='homepage.html'">Next</button>
</body>
</html>