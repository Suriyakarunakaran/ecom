<?php include 'includes/connect.php'?>
<?php include 'includes/login_check.php'?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/botanical/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:07:50 GMT -->
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the Compatible of your site -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the page title -->
	<title>Evara</title>
	<!-- include the site Google Fonts stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CRoboto:300,400,500,700,900&amp;display=swap" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- include the site fontawesome stylesheet -->
	<link rel="stylesheet" href="css/fontawesome.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="style.css">
	<!-- include theme plugins setting stylesheet -->
	<link rel="stylesheet" href="css/plugins.css">
	<!-- include theme color setting stylesheet -->
	<link rel="stylesheet" href="css/color.css">
	<!-- include theme responsive setting stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  	.nav-link.active{
  		background-color: green !important;
  	}
  </style>
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- header -->
		<?php include 'includes/header_2.php' ?>
		<!-- main -->
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(images/b-bg7.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Your Account</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="index.php">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Your Account</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- twoColumns -->
			<div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
				<div class="row">
					<div class="col-12 col-lg-8 order-lg-3">
						<!-- content -->
						<article id="content">						  
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-content" id="v-pills-tabContent">
								  	<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
									  	<div class="alert alert-success">
										  From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.
										</div>
									</div>
								  	<div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
								  		<div class="alert alert-success">
										  The following <strong>addresses</strong> will be used on the checkout page by default.
										</div>
										<button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#myModal">
									    	Add Address
									  	</button>
										<!-- The Modal -->
										<div class="modal fade" id="myModal">
											<div class="modal-dialog modal-md">
										      <div class="modal-content">
										      
										        <!-- Modal Header -->
										        <div class="modal-header">
										          <h4 class="modal-title">Add Address</h4>
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										        </div>
										        
										        <!-- Modal body -->
										        <div class="modal-body">
										          <form class="contactForm" action="add_address.php" method="post">
										          	<input type="hidden" name="user_id" value="<?php echo $user_mobile ?>">
													<div class="d-flex flex-wrap row1 mb-md-1">
														<div class="form-group col-6 mb-5">
															<label>Name</label>
															<input type="text" id="name" class="form-control" name="name" placeholder="Your name  *">
														</div>
														<div class="form-group col-6 mb-5">
															<label>Mobile Number</label>
															<input type="tel" id="name" class="form-control" name="mobile" placeholder="XXXXXXXXXX  *">
														</div>
														<div class="form-group col-6 mb-5">
															<label>PIN Code</label>
															<input type="text" id="name" class="form-control" name="pin" placeholder="Pincode  *">
														</div>
														<div class="form-group col-6 mb-5">
															<label>Locality</label>
															<input type="text" id="name" class="form-control" name="locality" placeholder="Locality  *">
														</div>
														<div class="form-group col-6 mb-5">
															<label>City</label>
															<input type="text" id="name" class="form-control" name="city" placeholder="City  *">
														</div>
														<div class="form-group col-6 mb-5">
															<label>State</label>
															<input type="text" id="name" class="form-control" name="state" placeholder="State  *">
														</div>
														<div class="form-group col-6 mb-5">
															<label>Landmark</label>
															<input type="text" id="name" class="form-control" name="landmark" placeholder="Landmark  *">
														</div>
														<div class="form-group col-6 mb-5">
															<label>Alternative Number</label>
															<input type="tel" id="name" class="form-control" name="alter" placeholder="XXXXXXXXXX  *">
														</div>
													</div>
													<div class="form-group w-100 mb-6">
														<label>Address</label>
														<textarea class="form-control" name="address" placeholder="Address  *"></textarea>
													</div>
													<input type="submit" name="add_address" class="btn btn-success float-left" value="Submit">
													<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
												  </form>
										        </div>
										        
										        <!-- Modal footer -->
										        <div class="modal-footer">
										          
										        </div>
										        
										      </div>
										    </div>
										</div>
										<br>
									  	<div class="container mt-5">
											<div class="row">
			 									<?php 
													$ProductList = mysqli_query($conn,"SELECT * FROM address WHERE userid='$user_mobile'");
													while($product = mysqli_fetch_array($ProductList))
													{
														$id=$product['id'];
													?>
													 <div class="col-md-6" style="border:1px solid black;padding:10px">
														<h5><b><?php echo $product['name']?></b></h5>
												                                           
												        <p>Address : <br> <?php echo $product['address']?></p>
														<p>Landmark : <?php echo $product['landmark']?></p>
														<p>Pincode : <?php echo $product['pincode']?></p>
												                                            
													 	<p><span><button class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $product['id']?>">Edit</button></span><span><a href="delete_add.php?id=<?php echo $product['id'];?>" class="btn btn-danger" style="color:white">Delete</a></span></p>
													 	<div class="modal fade" id="myModal<?php echo $product['id']?>">
															<div class="modal-dialog modal-md">
														     	<div class="modal-content">													      
														        <!-- Modal Header -->
														        <div class="modal-header">
														          <h4 class="modal-title">Edit Address</h4>
														          <button type="button" class="close" data-dismiss="modal">&times;</button>
														        </div>
														        
														        <!-- Modal body -->
														        <div class="modal-body">
														        	   <?php
																			$cartList = mysqli_query($conn,"SELECT * FROM address WHERE id='$id'");
																			$cart = mysqli_fetch_array($cartList);
																			
																					$id = $cart['id'];
																					$name = $cart['name'];
																					$address_mobile = $cart['mobile'];
																					$locality = $cart['locality'];
																					$pincode = $cart['pincode'];
																					$address = $cart['address'];
																					$city = $cart['city'];
																					$state = $cart['state'];
																					$landmark = $cart['landmark'];
																					$alt_mobile = $cart['alt_mobile'];
																		?>
														          <form class="contactForm" action="add_address.php" method="post">
														          	<input type="hidden" name="id" value="<?php echo $id ?>">
																	<div class="d-flex flex-wrap row1 mb-md-1">
																		<div class="form-group col-6 mb-5">
																			<label>Name</label>
																			<input type="text" id="name"  value="<?php echo $name;?>" class="form-control" name="name" placeholder="Your name  *">
																		</div>
																		<div class="form-group col-6 mb-5">
																			<label>Mobile Number</label>
																			<input type="tel" id="mobile" value="<?php echo $address_mobile;?>" class="form-control" name="mobile" placeholder="XXXXXXXXXX  *">
																		</div>
																		<div class="form-group col-6 mb-5">
																			<label>PIN Code</label>
																			<input type="text" id="pincode" value="<?php echo $pincode;?>" class="form-control" name="pin" placeholder="Pincode  *">
																		</div>
																		<div class="form-group col-6 mb-5">
																			<label>Locality</label>
																			<input type="text" id="locality" value="<?php echo $locality;?>" class="form-control" name="locality" placeholder="Locality  *">
																		</div>
																		<div class="form-group col-6 mb-5">
																			<label>City</label>
																			<input type="text" id="city" value="<?php echo $city;?>" class="form-control" name="city" placeholder="City  *">
																		</div>
																		<div class="form-group col-6 mb-5">
																			<label>State</label>
																			<input type="text" id="state" value="<?php echo $state;?>" class="form-control" name="state" placeholder="State  *">
																		</div>
																		<div class="form-group col-6 mb-5">
																			<label>Landmark</label>
																			<input type="text" id="land" value="<?php echo $landmark;?>" class="form-control" name="landmark" placeholder="Landmark  *">
																		</div>
																		<div class="form-group col-6 mb-5">
																			<label>Alternative Number</label>
																			<input type="tel" id="alter" value="<?php echo $alt_mobile;?>" class="form-control" name="alter" placeholder="XXXXXXXXXX  *">
																		</div>
																	</div>
																	<div class="form-group w-100 mb-6">
																		<label>Address</label>
																		<textarea class="form-control" name="address" placeholder="Address  *"><?php echo $address;?></textarea>
																	</div>
																	<input type="submit" name="edit_address" class="btn btn-success float-left" value="Submit">
																	<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
																</form>
														        </div>
														        
														        <!-- Modal footer -->
														        <div class="modal-footer">
														          
														        </div>
														        
														      </div>
														    </div>
														</div>
													 </div>
												<?php } ?>
											</div>
										</div>
									</div>
								  	<div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
								  		<div class="alert alert-success">
										  Edit Your <strong> Profile Details</strong>.
										  <h1><?php echo $user_mobile ?>
										</div>
								  		<div class="container">
								  			<?php
												$cartList = mysqli_query($conn,"SELECT * FROM register_user WHERE mobile='$user_mobile'");
												$cart = mysqli_fetch_array($cartList);
													$id = $cart['id'];
													$name = $cart['name'];
													$mobile_reg = $cart['mobile'];
													$role = $cart['role'];
													$email = $cart['email'];
													$password = $cart['password'];
													$address = $cart['address'];
											?>
								  			<form class="contactForm" action="edit_user.php" method="post">
										        <input type="hidden" name="user_id" value="<?php echo $user_mobile ?>">
												<div class="d-flex flex-wrap row1 mb-md-1">
													<div class="form-group col-6 mb-5">
														<label>Name</label>
														<input type="text" id="name"  value="<?php echo $name;?>" class="form-control" name="name" placeholder="Your name  *">
													</div>
													<div class="form-group col-6 mb-5">
														<label>Mobile Number</label>
														<input type="tel" id="mobile" value="<?php echo $mobile_reg;?>" class="form-control" name="mobile" placeholder="XXXXXXXXXX  *">
													</div>
													<div class="form-group col-6 mb-5">
														<label>Email</label>
														<input type="email" id="email" value="<?php echo $email;?>" class="form-control" name="email" placeholder="Enter Your Email Address  *">
													</div>
													<div class="form-group col-6 mb-5">
														<label>Password</label>
														<input type="text" id="password" value="<?php echo $password;?>"  class="form-control" name="password" placeholder="*********">
													</div>
												</div>
												<input type="submit" name="edit_user" class="btn btn-success float-left" value="Submit">
												<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
											</form>
								  		</div>
								  	</div>
								  	<div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
								  		<div class="table-responsive">
											<table class="table table-bordered">
											    <thead>
											      <tr>
											        <th>Order Id</th>
											        <th>Amount</th>
											        <th>Date</th>
													<th>View Order</th>
											      </tr>
											    </thead>
											    <tbody>
												 <?php
												 	$cartList = mysqli_query($conn,"SELECT * FROM orders WHERE user_id='$user_mobile' GROUP BY ord_id");
													while($cart = mysqli_fetch_array($cartList))
													{ ?>
												      <tr>
												        <td style="white-space: nowrap !important;"><?php echo $cart['ord_id'];?></td>
												        <td style="white-space: nowrap !important;">Rs . <?php echo $cart['price'];?></td>
												        <td style="white-space: nowrap !important;"><?php echo $cart['created_at'];?></td>
														<td style="white-space: nowrap !important;"><a href="view_ord.php?id=<?php echo $cart['ord_id'];?>" class="btn btn-success">View Orders</a></td>
												      </tr>
													<?php } ?>
											    </tbody>
											</table>
    									</div>
    								</div>
								  	<div class="tab-pane fade" id="v-pills-place" role="tabpanel" aria-labelledby="v-pills-place-tab">.place..</div>
								</div>
							</div>
						</article>
					</div>
					<div class="col-12 col-lg-4 order-lg-1">
						<!-- sidebar -->
						<aside id="sidebar">
							<section class="widget mb-9">
								<ul class="list-unstyled tagNavList mb-0">							
									<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
										<a class="nav-link active py-3 mb-3 d-block" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard <i class='fa fa-home mr-3 float-left'></i></a>

										<a class="nav-link py-3 mb-3 d-block" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address" role="tab" aria-controls="v-pills-address" aria-selected="false">Address <i class='fa fa-map-marker-alt mr-3 float-left'></i></a>

										<a class="nav-link py-3 mb-3 d-block" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">Account Details <i class='fa fa-user mr-3 float-left'></i></a>

										<a class="nav-link py-3 mb-3 d-block" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders <i class='fa fa-shopping-cart mr-3 float-left'></i></a>

										<!-- <a class="nav-link py-3 mb-3 d-block" id="v-pills-place-tab" data-toggle="pill" href="#v-pills-place" role="tab" aria-controls="v-pills-place" aria-selected="false">Place Orders <i class='fa fa-cart-arrow-down mr-3 float-left'></i></a> -->

										<a class="nav-link py-3 mb-3 d-block" href="includes/logout.php" >Logout <i class='fa fa-sign-out-alt mr-3 float-left'></i></a>
									</div>
								</ul>
							</section>
						</aside>
					</div>
				</div>
			</div>
			<!-- footerHolder -->
			<?php include 'includes/footer.php'; ?>
		</main>
		<!-- footer -->
		<footer id="footer" class="overflow-hidden bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-12 copyRightHolder v-II text-center pt-md-3 pb-md-4 py-2">
						<p class="mb-0">Coppyright 2024 by <a href="javascript:void(0);">Evara Store</a> - All right reserved</p>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!-- include jQuery library -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<!-- include bootstrap popper JavaScript -->
	<script src="js/popper.min.js"></script>
	<!-- include bootstrap JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- include custom JavaScript -->
	<script src="js/jqueryCustome.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/botanical/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:07:58 GMT -->
</html>