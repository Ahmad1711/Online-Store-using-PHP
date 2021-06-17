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
$fid=$_GET["id"];
$result=get_family_Products($fid);
$res=get_family($fid);
$row=mysqli_fetch_array($res);
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
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active"><?php echo $row["name"] ?></li><br><br>
				<li class="active">مدينة التسليم : <?php echo $row["delivery_city"] ?>  </li>
				<li class="active">نوع الدفع : <?php echo $row["payment_type"] ?> </li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-12 products-right">
				<div class="agile_top_brands_grids">
				<?php
				   while($row=mysqli_fetch_array($result))
				   {
					$res_rate=get_rate($row["id"]);
					$rate=mysqli_fetch_array($res_rate);
				   echo '
					<div class="col-md-3 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="product.php?id='.$row["id"].'"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$row["image"].'"></a>		
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
												<h4>'.$row["price"].' ر.س</h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="id" value="'.$row["id"].'" />
														<input type="hidden" name="name" value="'.$row["pname"].'" />
														<input type="hidden" name="price" value="'.$row["price"].'" />
														<input type="hidden" name="fid" value="'.$row["family_id"].'" />
														<input type="number" min="1" name="quan" placeholder="الكمية" required=" " >
														<input type="submit" name="add" value="اضافة الى السلة" class="button" />
													</fieldset>
												</form>
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