<?php
$result=get_top_4_category();
?>
<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>اتصال</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>العنوان الكامل<span>المدينة .</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 891</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>معلومات</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="about.php">حول الموقع</a></li>
						<li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="contact.php">اتصل بنا</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
				<h3>فئات</h3>
				<ul class="info">
				<?php
				while($row=mysqli_fetch_array($result))
				{
				echo '
				<li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="category.php?id='.$row["id"].'&&name='.$row["ar_name"].'">'.$row["ar_name"].'</a></li>';	
				}?>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>حساب</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="login_customer.php">دخول زبون</a></li>
						<li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="login_family.php">دخول عائلة</a></li>
						<li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="registered_family.php">انشاء حساب عائلة</a></li>
						<li><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="registered_customer.php">انشاء حساب زبون</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>الأسر المنتجة جميع الحقوق محفوظة &copy 2018</p>
			</div>
		</div>
		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="../images/card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->