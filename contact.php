<?php
include('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/botanical/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:08:08 GMT -->
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
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(images/b-bg7.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Contact</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="home.php">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Contact</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<div class="contactSec container pt-xl-24 pb-xl-23 py-lg-20 pt-md-16 pb-md-10 pt-10 pb-0">
				<div class="row">
					<div class="col-12">
						<ul class="list-unstyled contactListHolder mb-0 d-flex flex-wrap text-center">
							<li class="mb-lg-0 mb-6">
								<span class="icon d-block mx-auto bg-lightGray py-4 mb-4"><i class="fas fa-map-marker-alt"></i></span>
								<strong class="title text-uppercase playfair mb-5 d-block">address</strong>
								<address class="mb-0">5th St, Chinthamani Nagar,<br> Kuppakonam Pudur, K K Pudur, <br>Coimbatore, Tamil Nadu 641038</address>
							</li>
							<li class="mb-lg-0 mb-6">
								<span class="icon d-block mx-auto bg-lightGray py-4 mb-3"><i class="fas fa-headphones"></i></span>
								<strong class="title text-uppercase playfair mb-5 d-block">phone</strong>
								<a href="tel:84123456789" class="d-block">+91-88709-38049</a>
							</li>
							<li class="mb-lg-0 mb-6">
								<span class="icon d-block mx-auto bg-lightGray py-5 mb-3"><i class="fas fa-envelope"></i></span>
								<strong class="title text-uppercase playfair mb-5 d-block">email</strong>
								<a href="mailto:hr@reclusesoftwares.in" class="d-block">hr@reclusesoftwares.in</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- mapHolder -->
			<div class="mapHolder">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.141646629784!2d76.93822601462496!3d11.027920637614785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba85f04177d484d%3A0x851c49f0980991b!2sRecluse%20Softwares%20Private%20Limited!5e0!3m2!1sen!2sin!4v1629615565998!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<section class="contactSecBlock container pt-xl-23 pb-xl-10 pt-lg-20 pb-lg-10 pt-md-10 pb-md-8 py-10">
				<div class="row">
					<header class="col-12 mainHeader mb-10 text-center">
						<h1 class="headingIV playfair fwEblod mb-7">Get In Touch</h1>
					</header>
				</div>
				<div class="row">
					<div class="col-lg-6 col-sm-12 mx-auto">
						<form class="contactForm">
							<div class="d-flex flex-wrap row1 mb-md-1">
								<div class="form-group coll mb-5">
									<input type="text" id="name" class="form-control" name="name" placeholder="Your name  *">
								</div>
								<div class="form-group coll mb-5">
									<input type="email" class="form-control" id="email" name="Email" placeholder="Your email  *">
								</div>
								<div class="form-group coll mb-5">
									<input type="tel" class="form-control" id="tel" name="tel" placeholder="Telephone number  *">
								</div>
							</div>
							<div class="form-group w-100 mb-6">
								<textarea class="form-control" placeholder="Meesage  *"></textarea>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btnTheme btnShop md-round fwEbold text-white py-3 px-4 py-md-3 px-md-4">Send Message</button>
							</div>
						</form>
					</div>
				</div>
			</section>
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

<!-- Mirrored from htmlbeans.com/html/botanical/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:08:09 GMT -->
</html>