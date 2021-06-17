<div class="agileits_header">
	<div class="container">
		<div class="agile-login">
			<ul>
				<li><a href="edit_admin.php">تعديل حساب</a></li>
				<li><a href="products_reports.php">منتجات مخالفة</a></li>
				<li><a href="problem_report.php">تقارير مشاكل</a></li>
				<li><a href="logout.php"> خروج </a></li>
				<?php echo '<li><a style="color:orange" href="control_panel.php?id='.$_SESSION["admin_id"].'">'.$_SESSION["user_name"].'</a></li>';?>
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
			<h1><a href="control_panel.php">الأسر المنتجة</a></h1>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>