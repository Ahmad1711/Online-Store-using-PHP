<?php
include("include/init.php");
test_family_session();
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
echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="family.php?id='.$_SESSION['family_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$_SESSION['user_name'].'</a></li>
        <li class="active">تقارير التقييم</li>
        </ol>
    </div>
</div>';
?>
<div class="checkout">
<div class="container">
<div id="report" class="checkout-right">
<table class="timetable_sub">
<thead>
	<tr>
        <th>اسم المنتج</th>
		<th>اسم الزبون</th>
        <th>تقرير التقييم</th>
	</tr>
</thead>
<?php
$result=get_family_rate($_SESSION["family_id"]);
while($row=mysqli_fetch_array($result))
{
$p=get_product($row["product_id"]);
$pname=mysqli_fetch_array($p);
$c=get_customer($row["customer_id"]);
$cname=mysqli_fetch_array($c);
echo '
<tr class="rem1">
	<td class="invert">'.$pname["pname"].'</td>
	<td class="invert">'.$cname["fname"].'</td>
	<td class="invert">'.$row["text_rate"].'</td>
</tr>';    
}
?>
</table>
</div>
<button id="print" onclick="PrintElem()">طباعة التقرير</button>
<script>
function PrintElem()
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html dir="rtl"><head><link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById("report").innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>
</div>
</div>
<?php
include("include/test_footer.php");
?>
</body>
</html>