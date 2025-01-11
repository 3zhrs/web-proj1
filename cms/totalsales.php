<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Receipt</title>
</head>
<body>
<div class="form">



<tbody>
<?php
$totalset=0;
$count=1;
$sel_query="Select set_id, order_quantity from ordering where addon_id is null ;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<?php  $temp = $row["set_id"]; 
$query1="Select set_price from sets where set_id = '$temp';";
$result2 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_assoc($result2);
$totalset = $totalset + $row["order_quantity"] * $row1["set_price"];
$count++; } ?>

<?php
$totaladdon=0;
$count=1;
$sel_query="Select addon_id, order_quantity from ordering where set_id is null ;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<?php  $temp = $row["addon_id"]; 
$query1="Select addon_price from addon where addon_id = '$temp';";
$result2 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_assoc($result2);
$totaladdon = $totaladdon + $row["order_quantity"] * $row1["addon_price"];
$count++; } ?>

<?php
$totalequipment=0;
$count=1;
$sel_query="Select eq_no, rent_quantity from rental_equipment;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<?php  $temp = $row["eq_no"]; 
$query1="Select eq_rent_price from equipment where eq_no = '$temp';";
$result2 = mysqli_query($connection,$query1);
$row1 = mysqli_fetch_assoc($result2);
$totalequipment = $totalequipment + $row["rent_quantity"] * $row1["eq_rent_price"];
$count++; } ?>


<?php echo "Total Sales is RM "; $totalprice = $totalset + $totaladdon + $totalequipment; echo $totalprice; ?>
</body>
</html>