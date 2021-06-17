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
$res=get_last_3_products();
$result=get_top_3_category();
if(isset($_POST["add"]))
{
$id=$_POST["id"];
$name=$_POST["name"];
$price=$_POST["price"];
$fd=$_POST["fid"];
$quantity=$_POST["quan"];
add_to_cart($id,$name,$price,$quantity,$fd);
}
?>
<!-- main-slider -->
	<ul id="demo1">
		<li>
			<img src="../images/s1.jpg" alt="" />
		</li>
		<li>
			<img src="../images/s2.jpg" alt="" />
		</li>
		
		<li>
			<img src="../images/s3.jpg" alt="" />
			
		</li>
		<li>
			<img src="../images/s5.jpg" alt="" />
		</li>
		
	</ul>
<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
							<h5>أخر ثلاث منتجات</h5>
							</div>
							<div class="agile_top_brands_grids">
							<?php
							while($r=mysqli_fetch_array($res))
							{
								$res_rate=get_rate($r["id"]);
								$rate=mysqli_fetch_array($res_rate);
								echo '
								<div class="col-md-4 top_brand_left">
								 <div class="hover14 column">
									<div class="agile_top_brand_left_grid">
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
													<div class="snipcart-thumb">
														<a href="product.php?id='.$r["id"].'"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$r["image"].'"/></a>		
														<p>'.$r["name"].'</p>
														<form>
														<div class="stars rating1">
														<span class="starRating">
														  <input id="rating5" type="radio" name="rating" value="5"';if($rate["star"]==5) echo "checked";echo'>
														   <label for="rating5">5</label>
														   <input id="rating4" type="radio" name="rating" value="4"';if($rate["star"]==4) echo "checked";echo'>
														   <label for="rating4">4</label>
														   <input id="rating3" type="radio" name="rating" value="3"';if($rate["star"]==3) echo "checked";echo'>
														   <label for="rating3">3</label>
														   <input id="rating2" type="radio" name="rating" value="2"';if($rate["star"]==2) echo "checked";echo'>
														   <label for="rating2">2</label>
														   <input id="rating1" type="radio" name="rating" value="1"';if($rate["star"]==1) echo "checked";echo'>
														   <label for="rating1">1</label>
														</span>
													   </div>
													   </form>
														<h4>'.$r["price"].' ر.س</h4>
													</div>
													<div class="snipcart-details top_brand_home_details">
														<form action="index.php" method="post">
															<fieldset>
															    <input type="hidden" name="id" value="'.$r["id"].'" />
																<input type="hidden" name="name" value="'.$r["name"].'" />
																<input type="hidden" name="price" value="'.$r["price"].'" />
																<input type="hidden" name="fid" value="'.$r["family_id"].'" />
																<input type="number" min="1" name="quan"  placeholder="الكمية" required=" " >
																<input type="submit" name="add" value="اضافة الى السلة" class="button" />
															</fieldset>
														</form>
													</div>
												</div>
											</figure>
										</div>
									</div>
								</div>
							</div>';
						}
						
				  ?>
				 <div class="clearfix"> </div>
				  </div>
				   <!--							-->
				   <br/>
					<div class="agile-tp">
					<h5>أكثر ثلاث فئات مطلوبة</h5>
					</div>
						<div class="agile_top_brands_grids">
						<?php
						while($row = mysqli_fetch_array($result))
						{
						 $im = $row['image'];
						 echo
						 '
						 <div class="col-md-4 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="category.php?id='.$row["id"].'&&name='.$row["ar_name"].'"><img title=" " alt=" " style="width:200px;height:200px;" src="../images/'.$im.'" /></a>		
													<p>'.$row["ar_name"].'<p>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
						</div>';
						 }
						?>
						<div class="clearfix"> </div>
					</div>
						 <!--								-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //top-brands -->
<?php
include("include/test_footer.php");
?> 	
</body>
</html>