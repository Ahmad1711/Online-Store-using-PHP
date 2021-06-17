<?php
include("include/init.php");
test_admin_session();
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>	
<body>
<?php
include("include/test_header.php");
$result=get_all_requests();
echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="control_panel.php?id='.$_SESSION['admin_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Control Panel</a></li>
        <li class="active">Selles</li>
        </ol>
    </div>
</div>';
?>
<div class="checkout">
<div class="container">
<div class="checkout-right">
<table class="timetable_sub">
<thead>
	<tr>
        <th>Request ID</th>
		<th>Product Name</th>
        <th>Product Family</th>
		<th>Quantity</th>
		<th>Status</th>
		<th>Explanation</th>
		<th>Payment_Type</th>
		<th>Pickup_Cost</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_array($result))
{
$rq_info=get_request_products($row["id"]);
$c=get_customer($row["customer_id"]);
$cname=mysqli_fetch_array($c);
echo'<tr class="rem1">
<td class="invert">'.$row["id"].'</td></tr>';
while($row2=mysqli_fetch_array($rq_info))
{
$res1=get_product($row2["product_id"]);
$r1=mysqli_fetch_array($res1);
$res2=get_family($row2["family_id"]);
$r2=mysqli_fetch_array($res2);
echo '
<tr class="rem1">
    <td class="invert"></td>
    <td class="invert">'.$r1["pname"].'</td>
	<td class="invert">'.$r2["name"].'</td>
	<td class="invert">'.$row2["amount"].'</td>
    <td class="invert">'.$row2["status"].'</td>
    <td class="invert">'.$row2["explanation"].'</td>
</tr>';
}
echo'
<tr class="rem1">

    <td class="invert">Order_Date: '.$row["order_date"].'</td>
    <td class="invert">Customer: '.$cname["fname"].' '.$cname["lname"].'</td>
    <td class="invert">Total: '.$row["total"].' SR</td>
    <td class="invert">Delivery_Type: '.$row["delivery_type"].'</td>
    <td class="invert">Delivery_Location: '.$row["delivery_location"].'</td>
	<td class="invert">Delivery_Date: '.$row["delivery_date"].'</td>
	<td class="invert">'.$row["payment_type"].'</td>
	<td class="invert">'.$row["pickup_cost"].' SR</td>
  

</tr>
';
}
?>
</table>
</div>
</div>
</div>
<!-- //footer -->
<?php include("include/test_footer.php"); ?> 
<!-- //footer -->	
</body>
</html>