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
delete_product($id);	
}
$result=get_all_products();
echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="control_panel.php?id='.$_SESSION['admin_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Control Panel</a></li>
        <li class="active">Products</li>
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
        <th>Product ID</th>
		<th>Product Name</th>
		<th>Rating</th>
        <th>Image</th>
		<th>Category</th>
		<th>Price</th>
		<th>description</th>
		<th>Family</th>
		<th>Action</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_array($result))
{
$rat=0.0000;	
$cname=get_cate_name($row["category_id"]);
$res=get_family($row["family_id"]);
$r=mysqli_fetch_array($res);
$rate_rs=get_rate($row["id"]);
$count=mysqli_num_rows($rate_rs);
if($count==1){
$rate=mysqli_fetch_array($rate_rs);
$rat=$rate["star"];
}
echo '
<tr class="rem1">
	<td class="invert">'.$row["id"].'</td>
	<td class="invert">'.$row["name"].'</td>
	<td class="invert">'.$rat.'/5</td>
	<td class="invert"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$row["image"].'"/></td>
	<td class="invert">'.$cname.'</td>
    <td class="invert">'.$row["price"].'</td>
	<td class="invert">'.$row["description"].'</td>
    <td class="invert">'.$r["name"].'</td>
	<td class="invert">
	<form action="" id="cart" method="post">
	<input type="hidden" name="id" value="'.$row["id"].'">
	<input type="submit" name="remove" value="Remove">
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