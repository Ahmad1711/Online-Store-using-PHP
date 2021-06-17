<?php
include("include/init.php");
test_family_session()
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
$fid=$_SESSION['family_id'];
$fname=$_SESSION['user_name'];
$result=get_family_Products($fid);
$res=get_best_selling_products($fid);
if(isset($_POST["delete"]))
{
	$pid=$_POST["product_id"];
	delete_product($pid);
	$result=get_family_Products($fid);
}
if(isset($_POST["edit"]))
{
	echo '<script>window.location="edit_product.php?id='.$_POST["product_id"].'"</script>';
}
?>
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
	<h2><?php echo $fname;?></h2>
		<div class="grid_3 grid_5">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">My Products</a></li>
					<li role="presentation"><a href="#reports" role="tab" id="reports-tab" data-toggle="tab" aria-controls="reports">best-selling products</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
						<div class="agile_top_brands_grids">
							<?php
							while($row=mysqli_fetch_array($result))
							{
							$res_rate=get_rate($row["id"]);
					        $rate=mysqli_fetch_array($res_rate);
							 echo '
							<div class="col-md-4 top_brand_left">
								<div class="hover14 column">
									<div class="agile_top_brand_left_grid">
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
													<div class="snipcart-thumb">
														<a href="product.php?id='.$row["id"].'"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$row["image"].'" /></a>		
														<p>'.$row["pname"].'</p>
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
														<h4>'.$row["price"].' SR</h4>
													</div>
													<div class="snipcart-details top_brand_home_details">
														<form action="" method="post">
														 <input type="hidden" name="product_id" value="'.$row["id"].'" />
														 <input type="submit" name="delete" value="Delete" class="button" />
														 <input type="submit" name="edit" value="Edit" class="button" />
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
					</div>
					<!--						-->
					<div role="tabpanel" class="tab-pane fade" id="reports" aria-labelledby="reports-tab">
						<!--<div class="agile_top_brands_grids">-->
							<table class="timetable_sub">
							<thead>
								<tr>
									<th>Product Name</th>
									<th>Image</th>
									<th>Amount Sold</th>
								</tr>
							</thead>
							<?php
							while($row=mysqli_fetch_array($res))
							{
							echo '
							<tr class="rem1">
								<td class="invert">'.$row["name"].'</td>
								<td class="invert"><a href="product.php?id='.$row["product_id"].'"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$row["image"].'" /></a></td>
								<td class="invert">'.$row["amount"].'</td>
							</tr>';
							}
							?>
                        </table>
						<div class="clearfix"> </div>
						<!--</div>-->
					</div>
				<!--                             -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //top-brands -->

<!-- footer -->
<?php include("include/test_footer.php"); ?> 
<!-- //footer -->	
</body>
</html>