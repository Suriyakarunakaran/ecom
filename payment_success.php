<?php include 'includes/connect.php'?>
<?php include 'includes/login_check.php'?>
<?php 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	}
?>
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
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- header -->
		<?php include 'includes/header_2.php' ?>
		<!-- main -->
		<main>
			<!-- introBannerHolder -->

			<!-- twoColumns -->
			<div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
				<div class="row">
					<div class="col-12 col-lg-12 order-lg-3">
						<!-- content -->
						<article id="content">
							<div class="row">
							<?php
							$tList = mysqli_query($conn,"SELECT SUM(total) as total FROM orders WHERE ord_id='$id'");
							while($t = mysqli_fetch_array($tList))
							{
								$total = $t['total'];	
							}					
							$cartList = mysqli_query($conn,"SELECT * FROM orders WHERE ord_id='$id'");
							while($cart = mysqli_fetch_array($cartList))
							{
								$id = $cart['id'];
								$user_id = $cart['user_id'];
								$product_id = $cart['product_id'];
								$order_id = $cart['ord_id'];
								$quantity = $cart['quantity'];
								$price = $cart['price'];
								$p_status = $cart['p_status'];
								$created_at = $cart['created_at'];
									
							}
							$user_data = mysqli_query($conn,"SELECT * FROM register_user WHERE mobile = '$user_mobile'");
							$data = mysqli_fetch_array($user_data);
							$user_name = $data['name'];
							?>
		                    <div class="col-lg-12">
		                        <div class="account-create text-center pt-50">
		                            <h4>Dear <b><?php echo $user_name?></b></h4>
		                            <p>Your order has been successfully placed.<br>
					                    Order details are,<br>
					                    Order Id is <b><?php echo $order_id;?></b>
										Amount : Rs.<b><?php echo $total;?></b>
									</p>
		                            <div class="btn-wrapper">
		                                <a href="index.php" class="theme-btn-1 btn black-btn">Back to Shop</a>
		                            </div>
								</div>
							</div>
						</article>
					</div>
				</div>
			</div>
			<div class="container mb-lg-24 mb-md-16 mb-10">
				<!-- subscribeSecBlock -->
				<section class="subscribeSecBlock bgCover col-12 pt-lg-24 pb-lg-12 pt-md-16 pb-md-8 py-10" style="background-image: url(images/n-bg3.jpg)">
					<header class="col-12 mainHeader mb-9 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
						<span class="headerBorder d-block mb-5"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
						<p class="mb-6">Enter Your email address to join our mailing list and keep yourself update</p>
					</header>
					<form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap">
						<input type="email" class="form-control px-4 border-0" placeholder="Enter your mail...">
						<button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
					</form>
				</section>
			</div>
			<!-- footerHolder -->
			<?php include 'includes/footer.php' ?>
		</main>
		<!-- footer -->
		<footer id="footer" class="overflow-hidden bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-12 copyRightHolder v-II text-center pt-md-3 pb-md-4 py-2">
						<p class="mb-0">Coppyright 2024 by <a href="javascript:void(0);">Evara</a> - All right reserved</p>
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