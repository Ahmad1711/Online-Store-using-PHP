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
        <li><a href="control_panel.php?id='.$_SESSION['admin_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>لوحة التحكم</a></li>
        <li class="active">المبيعات</li>
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
        <th>رقم الطلب</th>
		<th>اسم المنتج</th>
        <th>العائلة</th>
		<th>الكمية</th>
		<th>الحالة</th>
		<th>التوضيح</th>
		<th>نوع الدفع</th>
		<th>كلفة الشحن</th>
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

    <td class="invert">تاريخ الطلبية: '.$row["order_date"].'</td>
    <td class="invert">الزبون: '.$cname["fname"].' '.$cname["lname"].'</td>
    <td class="invert">المجموع: '.$row["total"].' ر.س</td>
    <td class="invert">نوع التسليم: '.$row["delivery_type"].'</td>
    <td class="invert">موقع التسليم: '.$row["delivery_location"].'</td>
	<td class="invert">تاريخ التسليم: '.$row["delivery_date"].'</td>
	<td class="invert">'.$row["payment_type"].'</td>
	<td class="invert">'.$row["pickup_cost"].' ر.س</td>
  

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