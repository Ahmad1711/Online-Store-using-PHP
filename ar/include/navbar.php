<?php
echo'
<div class="navigation-agileits">
	<div class="container">
		<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header nav_2">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> 
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php" class="act">الرئيسية</a></li>';
								$result=get_category();
								while($row=mysqli_fetch_array($result))
								{
								echo
								'<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$row["ar_name"].'<b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="row">
											<div class="multi-gd-img">
												<ul class="multi-column-dropdown">
													<h6>'.$row["ar_name"].'</h6>';
													$res=get_category_Products($row["id"]);
													while($r=mysqli_fetch_array($res)){
														echo'
														<li><a href="product.php?id='.$r["id"].'">'.$r["name"].'</a></li>';
													}	
											echo'</ul>
											</div>	
										</div>
									</ul>
								</li>';
								}
							echo '	
							<li><a href="all_families.php">جميع العائلات</a></li>
							<li><a href="all_events.php">أخر الاحداث</a></li>
							<li><a href="login_organizer.php">دخول منظم الاحداث</a></li>
							
							</ul>
						</div>
			   </nav>
		</div>
	</div>'
?>