<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>	
<body>
<?php
include("include/test_header.php");
include("include/navbar.php");
$cid=$_SESSION['customer_id'];
if(isset($_POST["remove"]))
{
delete_request($_POST["id"]);	
}
if(isset($_POST["payment"]))
{
	$reqid=$_POST["id"];
	if(!test_request_status($reqid))
	{
		echo "<script>alert('Please some products is Waiting')</script>";
	}else{
		go_to_payment($reqid);
	}
}
$result=get_customer_request($cid);
echo'
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="customer.php?id='.$_SESSION["customer_id"].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$_SESSION["user_name"].'</a></li>
				<li class="active">My Requests</li>
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
		<th>Action</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_array($result))
{
$rq_pro=get_request_products($row["id"]);
echo'<tr class="rem1">
<td class="invert">'.$row["id"].'</td></tr>';
while($row2=mysqli_fetch_array($rq_pro))
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
    <td class="invert">Total: '.$row["total"].'</td>
	<td class="invert">Pickup_Cost: '.$row["pickup_cost"].'</td>
    <td class="invert">Delivery_Type: '.$row["delivery_type"].'</td>
    <td class="invert">Delivery_Location: '.$row["delivery_location"].'</td>
    <td class="invert">Delivery_Date: '.$row["delivery_date"].'</td>
	<td class="invert">'.$row["payment_type"].'</td>
    <td class="invert">
	<form action="" id="reqid" method="post">
	<input type="hidden" name="id" value="'.$row["id"].'">
	<input type="submit" name="payment" value="Go To Payment">
	<input type="submit" name="remove" value="Remove">
	</form>
    </td>
	
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