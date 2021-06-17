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
				echo'<li class="active">Checkout</li>
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
	<td class="invert">'.$values['quan'].'
		 <div class="quantity"> 
			<div class="quantity-select">
			<form action="" id="cart" method="post">
			</form>
			</div>
		</div>
	</td>
	<td class="invert">'.$values['price'].' SR</td>
	<td class="invert">'.number_format($values['quan']*$values['price'],2).' SR</td>
	<td class="invert">
	<input type="hidden" name="id" form="cart" value="'.$values["id"].'">
	<input type="submit" name="remove" form="cart" value="Remove">
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
<?php
if(isset($_POST["confirm"]))
{
$order_date=date("Y-m-d");
$customer_id=$_SESSION['customer_id'];
$delivery_location=$_POST["location"];
$address=$_POST["address"];
$delivery_type=$_POST["dtype"];
$delivery_date=$_POST["date"];
if($_SESSION['family_address']==$address)
{
	$pick=20;
	confirm_purchase($order_date,$customer_id,$total,$pick,$delivery_type,$delivery_location,$address,$delivery_date);
}else{
	
	$pick=45;
	confirm_purchase($order_date,$customer_id,$total,$pick,$delivery_type,$delivery_location,$address,$delivery_date);
}

}
?>
<div class="login">
		<div class="container">
			<h2>Checkout</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="" method="post">
					<label>Delivery Location :</label>
					<select name="location">
                        <option value="Riyadh">Riyadh</option>
                        <option value="Jeddah">Jeddah</option>
                        <option value="Medina">Medina</option>
                        <option value="Mecca">Mecca</option>
                        <option value="Dammam">Dammam</option>
                    </select></br>
					<input type="text" name="address" pattern="[A-Z _a-z0-9]+" title="only characters" placeholder="Full Address" required=" " >
                    <label>Delivery Type :</label>
					<select name="dtype">
                        <option value="Pickup">Pickup</option>
                        <option value="Delivery">Delivery</option>
                    </select>
                    <label>Delivery Date :</label>
                    <input type="date" name="date" required="">
                    <input type="submit" name="confirm" value=">>> Confirm Request >>>" class="button"/>
				</form>
			</div>
	</div>
</div>
<?php
include("include/test_footer.php");
?>
</body>
</html>