<?php include('includes/connect.php');
    session_start();
      if (isset($_POST['login'])) {
      $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      if (empty($mobile)) {
        echo("mobile is required");
      }
      else if (empty($password)) {
        echo("Password is required");
      }

      else {
        
        $query = "SELECT * FROM register_user WHERE mobile='$mobile' AND password='$password'";
        $results = mysqli_query($conn, $query);
        
            
            if (mysqli_num_rows($results) == 1) {

              $_SESSION['mobile'] = $mobile;
              

              $_SESSION['success'] = "You are now logged in";
              /*header('location: index.php');*/
                echo "
                <script>
		        alert('Logged In Successfully');
		        window.location.href='index.php';
		        </script>";

            }else {
              echo "<script>
              alert('Wrong username/password combination');
		        window.location.href='index.php';
		        </script>";
            }
        
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include'includes/connect.php' ?>
<!-- Mirrored from htmlbeans.com/html/botanical/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:06:49 GMT -->
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
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- pageHeader -->
		<?php include 'includes/header.php' ?>
		<?php include 'includes/login.php'?>
		<?php include 'includes/register.php'?>
		<!-- main -->
		<main>
			<!-- introBlock -->
			<section class="introBlock position-relative">
				<div class="slick-fade">
					<div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image: url(images/b-bg.jpg);">
							<!-- holder -->
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<h1 class="fwEbold position-relative pb-lg-8 pb-4 mb-xl-7 mb-lg-6">Houseplant <span class="text-break d-block">The Perfect Choice.</span></h1>
											<p class="mb-xl-15 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry <br>has been the industry's standard.</p>
											<a href="shop.html" class="btn btnTheme btnShop fwEbold text-white md-round py-md-3 px-md-4 py-2 px-3">Shop Now <i class="fas fa-arrow-right ml-2"></i></a>
										</div>
									</div>
									<div class="imgHolder">
										<img src="images/img77.png" alt="image description" class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image: url(images/b-bg2.jpg);">
							<!-- holder -->
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<span class="title d-block text-uppercase fwEbold position-relative pl-2 mb-lg-5 mb-sm-3 mb-1">wellcome to botanical</span>
											<h2 class="fwEbold position-relative mb-xl-7 mb-lg-5">Plants Gonna Make  <span class="text-break d-block">People Happy.</span></h2>
											<p class="mb-xl-15 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
											<a href="shop.html" class="btn btnTheme btnShop fwEbold text-white md-round py-2 px-3 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></a>
										</div>
									</div>
									<div class="imgHolder2">
										<img src="images/img78.png" alt="image description" class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image: url(images/b-bg3.jpg);">
							<!-- holder -->
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<span class="title d-block text-uppercase fwEbold position-relative pl-2 mb-lg-5 mb-sm-3 mb-1">wellcome to botanical</span>
											<h2 class="fwEbold position-relative mb-xl-7 mb-lg-5">Plants for healthy</h2>
											<p class="mb-xl-15 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
											<a href="shop.html" class="btn btnTheme btnShop fwEbold text-white md-round py-2 px-3 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></a>
										</div>
									</div>
									<div class="imgHolder3">
										<img src="images/img79.png" alt="image description" class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slickNavigatorsWrap">
					<a href="#" class="slick-prev"><i class="icon-leftarrow"></i></a>
					<a href="#" class="slick-next"><i class="icon-rightarrow"></i></a>
				</div>
			</section>
			<!-- chooseUs-sec -->
			<section class="chooseUs-sec container pt-xl-10 pt-lg-20 pt-md-16 pt-10 pb-xl-5 pb-md-7 pb-2">
				<div class="row">
					<div class="col-12 col-lg-6 mb-lg-0 mb-4">
						<img src="images/img01.jpg" alt="image description" class="img-fluid">
					</div>
					<div class="col-12 col-lg-6 pr-4">
						<h2 class="headingII fwEbold playfair position-relative mb-6 pb-5">Why choose us ?</h2>
						<p class="mb-xl-14 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry, lorem ipsum has been the industry's standard dummy text ever since the 1500s  when an unknown printer took a galley ... <a href="javascript:void(0);" class="btnMore"><i>Learn More</i></a></p>
						<!-- chooseList -->
						<ul class="list-unstyled chooseList">
							<li class="d-flex justify-content-start mb-xl-7 mb-lg-5 mb-3">
								<span class="icon icon-plant"></span>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Hand Planted</h3>
									<p>There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form.</p>
								</div>
							</li>
							<li class="d-flex justify-content-start mb-xl-6 mb-lg-5 mb-4">
								<span class="icon icon-ic-plant"></span>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Natural Sunlight</h3>
									<p>It is a long established fact that a reader will be distracted by the reable content of a page.</p>
								</div>
							</li>
							<li class="d-flex justify-content-start">
								<span class="icon icon-desert"></span>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Clean Air</h3>
									<p>There are many variations of passages of lorem ipsum available, but the majority have suffered.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<!-- productOfferSec -->
			<br>
			<h1 class="headingIV playfair fwEblod mb-4 text-center">Our Offers</h1>
			<div class="productOfferSec container overflow-hidden py-xl-5 py-lg-10 py-md-8 py-2">
				<div class="row">
					<?php 
						$Offers = mysqli_query($conn,"SELECT * FROM offers order by rand() limit 8 ");
						while($off = mysqli_fetch_array($Offers))
						{
							$offer_name = $off['offer_name'];
							$offer_image = $off['offer_image'];
					?>
					<div class="col-12 col-sm-3 mb-sm-0 mb-2">
						<a href="" class="w-100"><img src="admin/uploads-offer/<?php echo $offer_image ?>" alt="<?php echo $offer_name ?>" class="img-fluid"></a>
					</div>
					<?php } ?>
				</div>
			</div>
			<!-- featureSec -->
			<section class="featureSec container-fluid overflow-hidden pt-xl-10 pt-lg-10 pt-md-80 pt-5 pb-xl-5 pb-lg-4 pb-md-2 px-xl-14 px-lg-7">
				<!-- mainHeader -->
				<header class="col-12 mainHeader mb-7 text-center">
					<h1 class="headingIV playfair fwEblod mb-4">Featured Product</h1>
					<span class="headerBorder d-block mb-md-5 mb-3"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
					<p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
				</header>
				<div class="col-12 p-0 overflow-hidden d-flex flex-wrap">
					<?php 
						$ProductList = mysqli_query($conn,"SELECT * FROM products order by rand() limit 6 ");
						while($product = mysqli_fetch_array($ProductList))
						{
							$quantity = $product['quantity'];
							$p_id = $product['id']; 
							$price = $product['price'];
					?>			
						<!-- featureCol -->
						<div class="featureCol px-3 position-relative mb-6">
							<div class="border">
								<div class="imgHolder position-relative w-100 overflow-hidden">
									<a href="shop-detail.php?p_id=<?php echo $p_id ?>">
										<img src="admin/uploads-products/<?php echo $product['product_image'] ?>" alt="image description" class="img-fluid w-100">
									</a>
									<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
									<?php
									if(isset($_SESSION['mobile'])){
									$wishlist = mysqli_query($conn,"SELECT * FROM wishlist where user_id = '$user_mobile' AND p_id ='$p_id'");
									$wish_row  = mysqli_num_rows($wishlist);
									if($wish_row > 0) {
										$List_wish = mysqli_fetch_array($wishlist);
										$status = $List_wish['status'];
										if($status == 0) { ?>
										<li class="mr-2 overflow-hidden"><a href="wish_list.php?like=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>	
										<?php } else { ?> 
											<li class="mr-2 overflow-hidden"><a href="wish_list.php?unlike=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>
										<?php }
									} else { ?>
										<li class="mr-2 overflow-hidden"><a href="wish_list.php?like=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>
									<?php	} 
									} else { ?>
									<?php } ?>
										<li class="mr-2 overflow-hidden"><a href="shop-detail.php?p_id=<?php echo $p_id ?>" class="icon-eye d-block"></a></li>
										<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
									</ul>
								</div>
								<div class="text-center py-xl-5 py-sm-4 py-2 px-xl-2 px-1">
									<span class="title d-block mb-2"><a href="shop-detail.php?p_id=<?php echo $p_id ?>"><?php echo $product['product_name'];?></a></span>
									<span class="price d-block fwEbold">Rs. <?php echo $price ?></span>
									<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">HOT</span>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</section>
			<!-- contactListBlock -->
			<div class="contactListBlock container overflow-hidden pt-xl-2 pt-lg-10 pt-md-8 pt-4 pb-xl-2 pb-lg-10 pb-md-4 pb-1">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-van"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Free shipping order</strong>
								<p class="m-0">On orders over  $100</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-gift"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Special gift card</strong>
								<p class="m-0">The perfect gift idea</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-4 px-md-2 px-3 d-flex">
							<span class="icon icon-recycle"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Return &amp; exchange</strong>
								<p class="m-0">Free return within 3 days</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-call"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Support 24 / 7</strong>
								<p class="m-0">Customer support</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- productOfferSec -->
			<br>
			<h1 class="headingIV playfair fwEblod mb-4 text-center">Our Advertisement</h1>
			<div class="productOfferSec container overflow-hidden py-xl-5 py-lg-10 py-md-8 py-2">
				<div class="row">
					<?php 
						$Ads = mysqli_query($conn,"SELECT * FROM advertisement order by rand() limit 8 ");
						while($advertise = mysqli_fetch_array($Ads))
						{
							$ad_name = $advertise['ad_name'];
							$ad_image = $advertise['ad_image'];
					?>
					<div class="col-12 col-sm-6 mb-sm-0 mb-2">
						<a href="" class="w-100"><img src="admin/uploads-ad/<?php echo $ad_image ?>" alt="<?php echo $ad_name ?>" class="img-fluid"></a>
					</div>
					<?php } ?>
				</div>
			</div>
			<!-- dealSecHolder -->
			<section class="dealSecHolder container-fluid overflow-hidden py-xl-5 py-lg-10 py-md-8 py-2">
				<!-- mainHeader -->
				<header class="col-12 mainHeader mb-7 text-center">
					<h1 class="headingIV playfair fwEblod mb-5">Daily Deal</h1>
					<span class="headerBorder d-block mb-md-5 mb-3"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
					<p class="mb-6">There are many variations of passages of lorem ipsum available.</p>
					<!-- <div id="defaultCountdown" class="comming-timer"></div> -->
				</header>
				<!-- dealSlider -->
				<div class="dealSlider w-100 px-xl-10 px-lg-5 px-md-2">
					<?php 
						$ProductList = mysqli_query($conn,"SELECT * FROM products order by rand() limit 8 ");
						while($product = mysqli_fetch_array($ProductList))
						{
							$quantity = $product['quantity'];
							$p_id = $product['id'];
					?>
			
					<div>
						<!-- featureCol -->
						<div class="featureCol position-relative w-100 px-3 mb-sm-8 mb-6">
							<div class="border">
								<div class="imgHolder position-relative w-100 overflow-hidden">
									<a href="shop-detail.php?p_id=<?php echo $p_id ?>">
										<img src="admin/uploads-products/<?php echo $product['product_image'] ?>" alt="image description" class="img-fluid w-100">
									</a>
									<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
									<?php
									if(isset($_SESSION['mobile'])){
									$wishlist = mysqli_query($conn,"SELECT * FROM wishlist where user_id = '$user_mobile' AND p_id ='$p_id'");
									$wish_row  = mysqli_num_rows($wishlist);
									if($wish_row > 0) {
										$List_wish = mysqli_fetch_array($wishlist);
										$status = $List_wish['status'];
										if($status == 0) { ?>
										<li class="mr-2 overflow-hidden"><a href="wish_list.php?like=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>	
										<?php } else { ?> 
											<li class="mr-2 overflow-hidden"><a href="wish_list.php?unlike=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>
										<?php }
									} else { ?>
										<li class="mr-2 overflow-hidden"><a href="wish_list.php?like=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>
									<?php	} 
									} else { ?>
									<?php } ?>
										<li class="mr-2 overflow-hidden"><a href="shop-detail.php?p_id=<?php echo $p_id ?>" class="icon-eye d-block"></a></li>
										<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
									</ul>
								</div>
								<div class="text-center py-5 px-2">								
									<span class="title d-block mb-2"><a href="shop-detail.php?p_id=<?php echo $p_id ?>"><?php echo $product['product_name'];?></a></span>
									<span class="price d-block fwEbold">Rs.<?php echo $product['price'];?></</span>
									<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">HOT</span>
									<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</section>
			<!-- partnerSec -->
			<div class="partnerSec container overflow-hidden pt-xl-10 pb-xl-10 pt-lg-10 pt-md-8 pt-5 pb-lg-10 pb-md-16 pb-10">
				<div class="row">
					<div class="col-12">
						<!-- partnerSlider -->
						<div class="partnerSlider d-flex flex-wrap">
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="images/p-logo1.png" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="images/p-logo2.png" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="images/p-logo3.png" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="images/p-logo4.png" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="images/p-logo5.png" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="images/p-logo6.png" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="images/p-logo4.png" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid px-xl-20 px-lg-14">
				<!-- subscribeSecBlock -->
				<section class="subscribeSecBlock bgCover col-12 pt-xl-24 pb-xl-12 pt-lg-20 pt-md-16 pt-10 pb-md-8 pb-5" style="background-image: url(images/n-bg.jpg)">
					<header class="col-12 mainHeader mb-sm-9 mb-6 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
						<span class="headerBorder d-block mb-md-5 mb-3"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
						<p class="mb-sm-6 mb-3">Enter Your email address to join our mailing list and keep yourself update</p>
					</header>
					<form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap">
						<input type="email" class="form-control px-4 border-0" placeholder="Enter your mail...">
						<button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
					</form>
				</section>
			</div>
			<!-- footerHolder -->
			<?php include'includes/footer.php' ?>
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

<!-- Mirrored from htmlbeans.com/html/botanical/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:07:15 GMT -->
</html>