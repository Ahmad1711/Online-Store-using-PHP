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
delete_customer($id);	
}
$result=get_all_customers();
echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="control_panel.php?id='.$_SESSION['admin_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Control Panel </a></li>
        <li class="active">Customers</li>
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
        <th>Customer ID</th>
		<th>Fname</th>
        <th>Lname</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_array($result))
{
echo '
<tr class="rem1">
	<td class="invert">'.$row["id"].'</td>
	<td class="invert">'.$row["fname"].'</td>
	<td class="invert">'.$row["lname"].'</td>
	<td class="invert">'.$row["address"].'</td>
    <td class="invert">'.$row["phone"].'</td>
    <td class="invert">'.$row["email"].'</td>
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