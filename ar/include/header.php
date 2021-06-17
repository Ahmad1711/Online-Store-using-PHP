<?php
if(isset($_POST["search"]))
{	
$name=$_POST["browser"];	
search($name);
}
?>
<!-- header -->
<div class="agileits_header">
	<div class="container">
		<div class="agile-login">
			<ul>
				<li><a href="registered_family.php"> انشاء حساب عائلة </a></li>
				<li><a href="registered_customer.php"> انشاء حساب زبون </a></li>
				<li><a href="login_family.php">دخول عائلة</a></li>
				<li><a href="login_customer.php">دخول زبون</a></li>
				<li><a href="mycart.php">سلة المشتريات</a></li>
				<li><a href="login.php">دخول</a></li>
				
			</ul>
		</div>
		<div class="product_list_header">
			<select id="lang" onchange="language();">
				<option value="ar">Arabic</option>
				<option value="en">English</option>
			</select>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="logo_products">
	<div class="container">
		<img src="../images/logo.jpg" alt="" style="width:150px;height:125px;float:right;">
		<div class="w3ls_logo_products_left">
			<h1><a href="index.php">الأسر المنتجة</a></h1>
		</div>
	<div class="w3l_search">
		<form action="" method="post">
			<input type="search" list="browsers" name="browser" autocomplete="off" placeholder="بحث عن عائلة أو منتج" required="">
			<datalist id="browsers">
			  <?php
			  $result=get_all_products();
			  while($row=mysqli_fetch_array($result))
				{
				echo'
				<option value="'.$row["name"].'">'.$row["name"].'------منتج'.'</option>';
				}
			  $result=get_all_families();
			  while($row=mysqli_fetch_array($result))
				{
				echo'
				<option value="'.$row["name"].'">'.$row["name"].'------عائلة'.'</option>';
				}
				?>
			</datalist>
			<button type="submit" name="search" class="btn btn-default search" aria-label="Left Align">
				<i class="fa fa-search" aria-hidden="true"> </i>
			</button>
			<div class="clearfix"></div>
		</form>
	</div>
		
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //header -->