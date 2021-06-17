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
$result=get_Last_events();
?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>الرئيسية</a></li>
				<li class="active">أخر الأحداث</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			
				<?php
				while($row=mysqli_fetch_array($result))
				{
				echo'
				<div class="agileinfo_single">
				<div class="col-md-3 agileinfo_single_left">
					<img id="example" src="../images/'.$row["image"].'" style="width:150px;height:150px;" alt=" " >
				</div>
				<div class="col-md-9 agileinfo_single_right">
				<h2>'.$row["event_name"].'</h2>
					<div class="w3agile_description">
					    <h4>تاريخ الحدث : '.$row["date"].'</h4><br/>
						<h4>الوصف : </h4>
						<p>'.$row["description"].'</p>
					</div>
				</div>
				</div>
				<div class="clearfix"> </div>
				';
				}
				?>
		</div>
	</div>

<!-- //footer -->
<?php include("include/test_footer.php"); ?>
<!-- //footer -->	
</body>
</html>