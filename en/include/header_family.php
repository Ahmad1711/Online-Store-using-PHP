<?php
if(isset($_POST["search"]))
{	
$name=$_POST["browser"];	
search($name);
}
?>
<div class="agileits_header">
	<div class="container">
		<div class="agile-login">
			<ul>
				<li><a href="add_product.php"> Add Product </a></li>
				<li><a href="edit_family.php"> Edit Account </a></li>
				<li><a href="mycart.php"> My Cart </a></li>
				<li><a href="request_family.php">Requests</a></li>
				<li><a href="rate_reports.php">Rate Reports</a></li>
				<li><a href="help.php">Help</a></li>
				<li><a href="logout.php"> LogOut </a></li>
				<?php echo '<li><a style="color:orange;" href="family.php?id='.$_SESSION["family_id"].'">'.$_SESSION["user_name"].'</a></li>';?>
			</ul>
		</div>
		<div class="product_list_header">
			<select id="lang" onchange="language();">
				<option value="en">English</option>
				<option value="ar">Arabic</option>
			</select>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="logo_products">
	<div class="container">
		<img src="../images/logo.jpg" alt="" style="width:150px;height:125px;float:left;">
		<div class="w3ls_logo_products_left">
			<h1><a href="index.php">Producing Families</a></h1>
		</div>
	 <div class="w3l_search">
		<form action="" method="post">
			<input type="search" list="browsers" name="browser" autocomplete="off" placeholder="Search for a Product OR Family" required="">
			<datalist id="browsers">
			  <?php
			  $result=get_all_products();
			  while($row=mysqli_fetch_array($result))
				{
				echo'
				<option value="'.$row["name"].'">'.$row["name"].'------Product'.'</option>';
				}
			  $result=get_all_families();
			  while($row=mysqli_fetch_array($result))
				{
				echo'
				<option value="'.$row["name"].'">'.$row["name"].'------Family'.'</option>';
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