<?php
include("include/init.php");
test_admin_session();
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
if(isset($_POST["remove"]))
{
$id=$_POST["id"];
delete_family($id);	
}
echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="control_panel.php?id='.$_SESSION['admin_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>لوحة التحكم</a></li>
        <li class="active">العائلات</li>
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
        <th>رقم العائلة</th>
		<th>اسم العائلة</th>
        <th>الصورة</th>
		<th>العنوان</th>
		<th>الايميل</th>
		<th>الهاتف</th>
		<th>مدينة التسليم</th>
		<th>نوع الدفع</th>
		<th>مندوب</th>
		<th>حدث</th>
	</tr>
</thead>
<?php
$result=get_all_families();
while($row=mysqli_fetch_array($result))
{
echo '
<tr class="rem1">
	<td class="invert">'.$row["id"].'</td>
	<td class="invert">'.$row["name"].'</td>
	<td class="invert"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$row["image"].'"/></td>
	<td class="invert">'.$row["address"].'</td>
    <td class="invert">'.$row["email"].'</td>
    <td class="invert">'.$row["phone"].'</td>
	<td class="invert">'.$row["delivery_city"].'</td>
	<td class="invert">'.$row["payment_type"].'</td>
	<td class="invert">'.$row["driver"].'</td>
	<td class="invert">
	<form action="" id="cart" method="post">
	<input type="hidden" name="id" value="'.$row["id"].'">
	<input type="submit" name="remove" value="حذف">
	</form>
	</td>
</tr>';    
}
?>
</table>
</div>
</div>
</div>
<?php
include("include/test_footer.php");
?>
</body>
</html>