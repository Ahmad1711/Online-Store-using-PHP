<?php
include("include/init.php");
test_admin_session();
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>
<body>
<?php
include("include/test_header.php");
?>
<!-- //top-header and slider -->
<!-- top-brands -->
<div class="top-brands">
<div class="container">
<h2><?php echo $_SESSION['user_name'] ;?></h2>
	<div class="grid_3 grid_5">
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
					<div class="agile_top_brands_grids">
						<div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="products.php"><img title=" " alt=" " style="width:100px;height:100px;" src="../images/products.png" /></a>		
													<p>Products</p>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="customers.php"><img src="../images/customers.png" title=" " alt=" " style="width:100px;height:100px;" /></a>		
													<p>Customers</p>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block">
												<div class="snipcart-thumb">
													<a href="families.php"><img src="../images/families.png" style="width:100px;height:100px;" alt=" " class="img-responsive" /></a>
													<p>Families</p>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="agile_top_brands_grids">
						<div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="selles.php"><img title=" " alt=" " style="width:100px;height:100px;" src="../images/selles.png" /></a>		
													<p>Selles</p>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
						</div>
				
						<div class="clearfix"> </div>
					</div>
				</div>
				<!--   -->
			</div>
		</div>
	</div>
 </div>
</div>
<!-- //top-brands -->
<!-- //footer -->
<?php include("include/test_footer.php"); ?> 
<!-- //footer --> 
</body>
</html>