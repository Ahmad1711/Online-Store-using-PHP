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
$result=get_all_bad_product();
echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="control_panel.php?id='.$_SESSION['admin_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>لوحة التحكم</a></li>
        <li class="active">منتجات مخالفة</li>
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
        <th>رقم المهمة</th>
		<th>اسم المنتج</th>
        <th>نص المهمة</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_array($result))
{
echo '
<tr class="rem1">
	<td class="invert">'.$row["task_id"].'</td>
	<td class="invert">'.$row["product_name"].'</td>
	<td class="invert">'.$row["task_text"].'</td>
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