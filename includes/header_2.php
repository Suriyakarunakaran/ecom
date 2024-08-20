		<style>
			@media (max-width: 575px) {
			    .wishListII {
			        display: -webkit-inline-box;
			        float: right;
			    }
			}
		</style>
		<?php 	include('includes/connect.php'); ?>
		<header id="header" class="position-relative">
			<!-- headerHolderCol -->
			<div class="headerHolderCol pt-lg-4 pb-lg-5 py-3">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-4">
							<a href="javascript:void(0);" class="tel d-flex align-items-end"><i class="icon-call mr-2"></i>  Hotline: +91-88709-38049</a>
						</div>
						<div class="col-12 col-sm-4 text-center">
							<span class="txt d-block">Wellcome To Evara</span>
						</div>
					</div>
				</div>
			</div>
			<!-- headerHolder -->
			<div class="headerHolder container pt-lg-5 pb-lg-7 py-4">
				<div class="row">
					<div class="col-6 col-sm-2">
						<!-- mainLogo -->
						<div class="logo">
							<a href="javascript:void(0);"><img src="images/logo.png" alt="Botanical" class="img-fluid"></a>
						</div>
					</div>
					<div class="col-6 col-sm-7 col-lg-7 static-block">
						<!-- mainHolder -->
						<div class="mainHolder pt-lg-5 pt-3 justify-content-center">
							<!-- pageNav2 -->
							<nav class="navbar navbar-expand-lg navbar-light p-0 pageNav2 position-static">
								<button type="button" class="navbar-toggle collapsed position-relative" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
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
										<li class="nav-item active dropdown">
											<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Store</a>
											<ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
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
													<a href="category.php?cat=<?php echo $catd['cat_name']?>"><?php echo $cat_name?></a>
												</li>
												<?php }	?>
											</ul>
										</li>
										<li class="nav-item">
											<a class="d-block" href="about.php">About</a>
										</li>
										<!-- <li class="nav-item dropdown">
											<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
											<ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
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
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<ul class="nav nav-tabs wishListII pt-5 justify-content-end border-bottom-0">
							<!-- <li class="nav-item ml-0"><a class="nav-link icon-search" href="javascript:void(0);"></a></li> -->
							<!-- <li class="nav-item"><a class="nav-link position-relative icon-cart" href="javascript:void(0);"><span class="num rounded d-block">2</span></a></li> -->
							
                            <?php if (isset($_SESSION['mobile'])) { 
                                $count_list='1';
                                $user_mobile = $_SESSION['mobile'];
                                $count = mysqli_query($conn,"SELECT * FROM wishlist where user_id= '$user_mobile' AND status = '$count_list'");
                                $count_data = mysqli_num_rows($count);
                            ?>
								<li class="nav-item"><a class="nav-link position-relative icon-heart" href="wish_list.php"><span class="num rounded d-block"><?php echo $count_data ?></span></a></li>
							<?php } else { ?> 
								<li class="nav-item"><a class="nav-link position-relative icon-heart" href="wish_list.php"><span class="num rounded d-block">0</span></a></li>
							<?php } ?>
							<?php if (isset($_SESSION['mobile'])) { 
                                $count_list='1';
                                $user_mobile = $_SESSION['mobile'];
                                $count = mysqli_query($conn,"SELECT * FROM cart where userid= '$user_mobile'");
                                $count_data = mysqli_num_rows($count);
                            ?>
								<li class="nav-item"><a class="nav-link position-relative icon-cart" href="cart.php"><span class="num rounded d-block"><?php echo $count_data ?></span></a></li>
							<?php } else { ?> 
								<li class="nav-item"><a class="nav-link position-relative icon-cart" href="cart.php"><span class="num rounded d-block">0</span></a></li>
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
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>