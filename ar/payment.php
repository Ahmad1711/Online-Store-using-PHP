<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php
include("include/head.html");?>
</head>
<body>
<?php
include("include/test_header.php");
include("include/navbar.php");
$reqid=$_GET["request_id"];
$result=get_request_info($reqid);
$row=mysqli_fetch_array($result);

echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="customer.php?id='.$_SESSION['customer_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$_SESSION['user_name'].'</a></li>
        <li class="active">الدفع</li>
        </ol>
    </div>
</div>';
?>
<div class="checkout">
<div class="container">
<div class="checkout-right">
<?php
echo $begin='<table class="timetable_sub">
<thead>
	<tr>
        <th>رقم الطلب</th>
		<th>اسم المنتج</th>
		<th>الكمية</th>
	</tr>
</thead>
<tr class="rem1">
<td class="invert">'.$reqid.'</td></tr>';
$payres=get_payment_products($reqid);
while($row2=mysqli_fetch_array($payres))
{
$res=get_product($row2["product_id"]);
$r=mysqli_fetch_array($res);
echo $content='
<tr class="rem1">
    <td class="invert"></td>
	<td class="invert">'.$r["pname"].'</td>
	<td class="invert">'.$row2["amount"].'</td>
</tr>';
}
echo $end='
<tr class="rem1">
<td class="invert">المجموع</td>
<td colspan="2" class="invert">'.$row["total"].' ر.س</td>
</tr>
<tr class="rem1">
<td class="invert">الكلفة</td>
<td colspan="2" class="invert">'.$row["pickup_cost"].' ر.س</td>
</tr>
</table>';
if(isset($_POST["payment"]))
{
    $payment=$_POST["pment"];
    edit_payment_type($reqid,$payment);
	$mail=get_email($_SESSION["customer_id"]);
	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <d3.scit.co/ProFamily/>' . "\r\n";
	$text=$begin.$content.$end;
    $res=mail($mail,"Your Request Info",$text,$headers);
	while($row2=mysqli_fetch_array($payres))
    {
	related_products($_SESSION["customer_id"],$row2["product_id"]);
	}
	if($res)
    {
    echo "<script>alert('تمت عملية الدفع بنجاح سوف نرسل معلومات الطلبية الى بريدك الالكتروني')</script>";
    echo '<script>window.location="customer.php?id='.$_SESSION["customer_id"].'"</script>';
    }
}
?>
</div>
</div>
</div>
<div class="login-form-grids">
<form action="" method="post">
<label>اختر نوع الدفع : </label>    
<select id="payment" name="pment" onchange="pay();">
<option value="Credit">بطاقة</option>
<option value="Cash" selected="true">نقدي</option>
</select>
<span id="paypal"></span>
<input type="submit" name="payment" value=">>> تأكيد عملية الدفع >>>" class="button"/>
</form>
</div>
<?php
include("include/test_footer.php");
?>
</body>
</html>