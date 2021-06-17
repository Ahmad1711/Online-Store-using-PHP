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
                <li><a href="edit_customer.php"> تعديل حساب </a></li>
				<li><a href="mycart.php"> سلة المشتريات </a></li>
				<li><a href="request_customer.php">طلباتي</a></li>
                <li><a href="help.php">مساعدة</a></li>
				<li><a href="logout.php"> خروج </a></li>
				<?php echo '<li><a style="color:orange" href="customer.php?id='.$_SESSION["customer_id"].'">'.$_SESSION["user_name"].'</a></li>';?>
                
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
			<input type="search" list="browsers" name="browser" autocomplete="off" placeholder="بحث عن منتج أو عائلة" required="">
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