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
		echo "<script>alert('الرجاء الانتظار بعض المنتجات في حالة انتظار')</script>";
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
				<li class="active">طلباتي</li>
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
        <th>رقم الطلبية</th>
		<th>اسم المنتج</th>
        <th>عائلة المنتج</th>
		<th>الكمية</th>
		<th>الحالة</th>
		<th>توضيح</th>
		<th>نوع الدفع</th>
		<th>حدث</th>
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
    <td class="invert">تاريخ الطلبية: '.$row["order_date"].'</td>
    <td class="invert">المجموع: '.$row["total"].' ر.س</td>
	<td class="invert">الكلفة: '.$row["pickup_cost"].' ر.س</td>
    <td class="invert">نوع التسليم: '.$row["delivery_type"].'</td>
    <td class="invert">موقع التسليم: '.$row["delivery_location"].'</td>
    <td class="invert">تاريخ التسليم: '.$row["delivery_date"].'</td>
	<td class="invert">'.$row["payment_type"].'</td>
    <td class="invert">
	<form action="" id="reqid" method="post">
	<input type="hidden" name="id" value="'.$row["id"].'">
	<input type="submit" name="payment" value="الدفع">
	<input type="submit" name="remove" value="حذف">
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