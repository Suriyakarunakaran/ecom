<header id="header" class="pt-lg-5 pt-md-3 pt-2 position-absolute w-100">
			<div class="container-fluid px-xl-17 px-lg-5 px-md-3 px-0 d-flex flex-wrap">
				<div class="col-8 col-sm-6 col-lg-10 static-block">
					<!-- mainHolder -->
					<div class="mainHolder justify-content-center">
						<!-- pageNav1 -->
						<nav class="navbar navbar-expand-lg navbar-light p-0 pageNav1 position-static">
							<button type="button" class="navbar-toggle collapsed position-relative mt-md-2" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav mx-auto text-uppercase d-inline-block">
									<li class="nav-item">
										<a class="d-block" href="index.php">Home</a>
									</li>
									<li class="nav-item dropdown">
										<a class="dropdown-toggle d-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
										<ul class="list-unstyled text-capitalize border-right border-bottom border-left dropdown-menu mt-0 py-0">
											<li class="d-block mx-0">
												<a href="shop.php">All Products</a>
											</li>
											<?php
												$CatList = mysqli_query($conn,"SELECT * FROM cat");
												while($catd = mysqli_fetch_array($CatList))
												{
													$cat_name = $catd['cat_name'];
											?>
												<li class="d-block mx-0">
													<a href="category.php?cat=<?php echo $catd['cat_name']?>"><?php echo $cat_name?></a></li>
											<?php }	?>
										</ul>
									</li>

									<li class="nav-item">
										<a class="d-block" href="about.php">About</a>
									</li>
									<li class="nav-item">
										<a class="nLogo" href="index.php"><img src="images/logo.png" alt="Botanical" class="img-fluid"></a>
									</li>
									<!-- <li class="nav-item dropdown">
										<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
										<ul class="list-unstyled text-capitalize border-right border-bottom border-left dropdown-menu mt-0 py-0">
											<li class="d-block mx-0"><a href="blog.html">Blog Left Sidebar</a></li>
											<li class="d-block mx-0"><a href="blog-detail.html">Blog Detail</a></li>
										</ul>
									</li> -->

									<li class="nav-item">
										<a class="d-block" href="contact.php">contact</a>
									</li>
								</ul>
							</div>
						</nav>
						<div class="logo">
							<a href="index.php"><img src="images/logo.png" alt="Botanical" class="img-fluid"></a>
						</div>
					</div>
				</div>
				<div class="col-4 col-sm-3 col-lg-2 order-sm-3 order-md-0">
					<!-- wishList -->
					<ul class="nav nav-tabs wishList pt-xl-3 pt-3 mr-xl-3 mr-0 justify-content-end border-bottom-0">
						<!-- <li class="nav-item"><a class="nav-link icon-search" href="javascript:void(0);"></a></li>
						<li class="nav-item"><a class="nav-link position-relative icon-heart" href="javascript:void(0);"><span class="num rounded d-block">1</span></a></li> -->
						<!-- <li class="nav-item"><a class="nav-link position-relative icon-cart" href="javascript:void(0);"><span class="num rounded d-block">2</span></a></li> -->
						<?php if (isset($_SESSION['mobile'])) { 
								$user_mobile = $_SESSION['mobile'];
                                $count_list='1';
                                $count = mysqli_query($conn,"SELECT * FROM wishlist where user_id= '$user_mobile' AND status = '$count_list'");
                                $count_data = mysqli_num_rows($count);
                            ?>
								<li class="nav-item"><a class="nav-link position-relative icon-cart" href="wish_list.php"><span class="num rounded d-block"><?php echo $count_data ?></span></a></li>
							<?php } else { ?> 
								<li class="nav-item"><a class="nav-link position-relative icon-cart" href="wish_list.php"><span class="num rounded d-block">0</span></a></li>
							<?php } ?>
							<li class="nav-item">
								<a class="nav-link icon-profile" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false"></a>
								<div class="dropdown-menu pl-4 pr-4">
									<?php if (isset($_SESSION['mobile'])){?>
										<a class="dropdown-item" href="account.php">Account</a>
										<a class="dropdown-item" href="includes/logout.php">Logout</a>									
									<?php } else {?>
										<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#myModallogin">Login</a>							
										<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#myModalregister">Registration</a>
								<?php }?>
					</ul>
				</div>
			</div>
		</header>
