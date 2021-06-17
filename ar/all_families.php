<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php include("include/head.html"); ?>
</head>	
<body>
<?php
include("include/test_header.php");
include("include/navbar.php");
$result=get_all_families();
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active">جميع العائلات</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- families --->
	<div class="products">
		<div class="container">
			<div class="col-md-12 products-right">
				<div class="agile_top_brands_grids">
				<?php
				   while($row=mysqli_fetch_array($result))
				   {
				   echo '
					<div class="col-md-3 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="family_products.php?id='.$row["id"].'"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$row["image"].'"></a>		
												<p>'.$row["name"].'</p>
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>   
						';
						}
				 ?>
	          <div class="clearfix"> </div>
			</div> 
		</div>
	</div>
</div>
<!--- products --->
<!-- //footer -->
<?php include("include/test_footer.php"); ?> 
<!-- //footer -->	
</body>
</html>