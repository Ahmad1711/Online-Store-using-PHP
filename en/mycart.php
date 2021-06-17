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
if(isset($_POST["remove"]))
{
$id=$_POST["id"];
delete_from_cart($id);	
}
if(isset($_POST["check"])&&!empty($_SESSION['cart']))
{
go_to_checkout();	
}
if(isset($_POST["check"])&&empty($_SESSION['cart']))
{
echo '<script>alert(">>> Cart is Empty >>>")</script>';	
}
echo'
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">';
			if(isset($_SESSION['customer_id']))
			{
				echo '<li><a href="customer.php?id='.$_SESSION['customer_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>'.$_SESSION['user_name'].'</a></li>';
		    }else{
				echo '<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>';
			}
				echo'<li class="active">Cart Page</li>
			</ol>
		</div>
	</div>
<div class="checkout">
<div class="container">';
if(isset($_SESSION['cart']))
{
echo '<h2>Your shopping cart contains: <span>'.count($_SESSION['cart']).' Products</span></h2>';
}else{
echo '<h2>Your shopping cart contains: <span>0 Products</span></h2>';
}
?>
<div class="checkout-right">
<table class="timetable_sub">
<thead>
	<tr>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Total</th>
		<th>Action</th>
	</tr>
</thead>
<?php
if(!empty($_SESSION['cart']))
{
$total=0;
foreach($_SESSION['cart'] as $keys => $values)
{
echo '
<tr class="rem1">
	<td class="invert">'.$values['name'].'</td>
	<td class="invert">'.$values['quan'].'</td>
	<td class="invert">'.$values['price'].' SR</td>
	<td class="invert">'.number_format($values['quan']*$values['price'],2).' SR</td>
	<td class="invert">
	<form action="" id="cart" method="post">
	<input type="hidden" name="id" value="'.$values["id"].'">
	<input type="submit" name="remove" value="Remove">
	</form>
	</td>
</tr>';
$total=$total+($values['quan']*$values['price']);
}
echo '
<tr class="rem1">
<td colspan="3" class="invert">Total</td>
<td class="invert">'.number_format($total,2).' SR</td>
</tr>
';
}
?>
</table>
</div>
</div>
</div>
<div class="login-form-grids">
<form action="" method="post">
<input type="submit" name="check" value=">>> Go To Checkout >>>" class="button"/>
</form>
</div>
<?php include("include/test_footer.php"); ?>
</body>
</html>