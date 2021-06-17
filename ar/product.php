<?php
include("include/init.php");
?>
<!DOCTYPE html>
<html>
<?php include("include/head.html"); ?>
</head>
<body>
<?php
include("include/test_header.php");
include("include/navbar.php");
$pid=$_GET["id"];
$result=get_product($pid);
$row=mysqli_fetch_array($result);
if(isset($_POST["add"]))
{
$id=$_POST["id"];
$name=$_POST["name"];
$price=$_POST["price"];
$fd=$_POST["fid"];
$quantity=$_POST["quan"];
add_to_cart($id,$name,$price,$quantity,$fd);
}
if(isset($_POST["send"]))
{
	if(check_customer_rate($_SESSION["customer_id"],$_GET["id"]))
	{
		if(isset($_SESSION['customer_id']))
		 {
			$cid=$_SESSION["customer_id"];
			$pid=$_GET["id"];
			$star=0;
			if(isset($_POST["rating"]))
			{
			$star=$_POST["rating"];
			}
			$text=$_POST["eval"];
			send_eval($cid,$pid,$star,$text,$row["family_id"]);
		 }
		 else{
			echo "<script>alert('Please Login as Customer Account')</script>";
		 }
	}else{
		    echo "<script>alert('This product has been pre-evaluated by you')</script>";
	}
}
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active"><?php echo $row["pname"]?></li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				<?php
				echo '
				<div class="col-md-3 agileinfo_single_left">
					<img id="example" src="../images/'.$row["image"].'" style="width:150px;height:150px;" alt=" " >
				</div>
				';
				?>
	             <?php
				 echo '
				<div class="col-md-9 agileinfo_single_right">
				<h2>'.$row["pname"].'</h2>
				<div class="rating1">
				 <span class="starRating">
					<input form="rate" id="rating5" type="radio" name="rating" value="5">
					<label for="rating5">5</label>
					<input form="rate" id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input form="rate" id="rating3" type="radio" name="rating" value="3">
					<label for="rating3">3</label>
					<input form="rate" id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input form="rate" id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				 </span>
				</div>
				<div class="w3agile_description">
					<h4>العائلة : <a href="family_products.php?id='.$row["family_id"].'">'.$row["fname"].'</a></h4><br/>
					<h4>الوصف :</h4>
					<p>'.$row["description"].'</p>
				</div>
				<div class="snipcart-item block">
				<div class="snipcart-thumb agileinfo_single_right_snipcart">
					<h4 class="m-sing">السعر : '.$row["price"].' ر.س</h4>
				</div>
				<div class="snipcart-details agileinfo_single_right_details">
				<form action="" method="post">
				<fieldset>
					<input type="hidden" name="id" value="'.$pid.'" />
					<input type="hidden" name="name" value="'.$row["pname"].'" />
					<input type="hidden" name="price" value="'.$row["price"].'" />
					<input type="hidden" name="fid" value="'.$row["family_id"].'" />
					<input type="number" min="1" name="quan" placeholder="الكمية" required=" " >
					<input type="submit" name="add" value="اضافة الى السلة" class="button" />
					</fieldset>
				</form>
				</div>
				</div>';
				echo'
				<div class="snipcart-details agileinfo_single_right_details">
				<form id="rate" action="" method="post">
				<fieldset>
				<textarea name="eval" placeholder="كتابة تقييم" rows="5" cols="40"></textarea>
				<input type="submit" name="send" value="ارسال التقييم" class="button" />
				</fieldset>
			    </form></div>
           </div>';?>	
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>
<!--------------------------------->
<?php
if(isset($_SESSION["customer_id"]))
{
echo '
<h5 style="font-size: 30px;color: orange;text-align: center;">منتجات مشابهة</h5>
<div class="products">
		<div class="container">
			<div class="col-md-12 products-right">
				<div class="agile_top_brands_grids">';
				 
				    $cat=get_product_category($_GET["id"]);
				    $result=get_product_category_products($cat,$_GET["id"]);
				
				   while($row=mysqli_fetch_array($result))
				   {
					$res_rate=get_rate($row["id"]);
					$rate=mysqli_fetch_array($res_rate);
					if($rate["star"]>=3)
					{
				   echo '
					<div class="col-md-3 top_brand_left">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="product.php?id='.$row["id"].'"><img title=" " alt=" " style="width:150px;height:150px;" src="../images/'.$row["image"].'"></a>		
												<p>'.$row["name"].'</p>
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
														<input type="hidden" name="name" value="'.$row["name"].'" />
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
				   }
				 echo '
	          <div class="clearfix"> </div>
			</div> 
		</div>
	</div>
</div>
';
}
?>

<!-- //footer -->
<?php include("include/test_footer.php"); ?>
<!-- //footer -->	
</body>
</html>