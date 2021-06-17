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
$fid=$_SESSION['family_id'];
if(isset($_POST["send"]))
{
$reqid=$_POST["id"];
$pid=$_POST["pid"];
$status=$_POST["status"];
$explan=$_POST["eval"];
set_request_info($reqid,$pid,$status,$explan);
}
$result=get_family_request($fid);
echo'
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="family.php?id='.$_SESSION["family_id"].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$_SESSION["user_name"].'</a></li>
				<li class="active">Requests</li>
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
		<th>Quantity</th>
		<th>Status</th>
		<th>Explanation</th>
		<th>Action</th>
		<th>Payment_Type</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_array($result))
{
echo'
<tr class="rem1">
<td class="invert">'.$row["bill_id"].'</td>
</tr>';
$rq_pro=get_request_products($row["bill_id"]);
while($row2=mysqli_fetch_array($rq_pro))
{
$pres=get_product($row2["product_id"]);
$pname=mysqli_fetch_array($pres);
$rq_info=get_request_info($row["bill_id"]);
$row3=mysqli_fetch_array($rq_info);
$cu_res=get_customer($row3["customer_id"]);
$row4=mysqli_fetch_array($cu_res);
echo '
<tr class="rem1">
    <td class="invert">Status: '.$row2["status"].'</td>
	<td class="invert">'.$pname["pname"].'</td>
	<td class="invert">'.$row2["amount"].'</td>
	<form action="" method="post">
	<td class="invert">
    <input type="hidden" name="id" value="'.$row["bill_id"].'">
	<input type="hidden" name="pid" value="'.$row2["product_id"].'">
	<input type="radio" name="status" value="accept">Accept<br>
	<input type="radio" name="status" value="not accept">Not Accept
	</td>
    <td class="invert">
    <textarea name="eval" value="nothing" placeholder="write Explanation" rows="3" cols="20"></textarea>
    </td>
	<td class="invert">
	<input type="submit" name="send" value="Send">
	</td>
	</form>
</tr>';
}
echo'
<tr class="rem1">
    <td class="invert">customer_name: '.$row4["fname"].'<br>Order_date: '.$row3["order_date"].'</td>
	<td class="invert">Total: '.$row3["total"].' SR</td>
	<td class="invert">P_Cost: '.$row3["pickup_cost"].' SR</td>
	<td class="invert">Del_Type: '.$row3["delivery_type"].'</td>
	<td class="invert">Del_Location: '.$row3["delivery_location"].'</td>
	<td class="invert">Del_Date: '.$row3["delivery_date"].'</td>
	<td class="invert">'.$row3["payment_type"].'</td>
</tr>';
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