
<?php 
	$cat1 = $_REQUEST['cat'];
	include('includes/connect.php');
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

              $_SESSION['mobile'] = $user_mobile;
              

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
		<?php include 'includes/header_2.php';?>
		<?php include 'includes/login.php'?>
		<?php include 'includes/register.php'?>
		<!-- main -->
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(images/b-bg7.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Shop</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="index.php">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Shop</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- twoColumns -->
			<div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
				<div class="row">
					<input type="hidden" class="cat" value="<?php echo $cat1?>"/>
        					<!-- PRODUCT DETAILS AREA START -->
							<?php 
								$wheres = '';
								
								if (isset($_POST['search'])) {
									$search1 = $_POST['search'];
									$wheres .= "AND product_name LIKE '%$search1%'";
								}
								$s_no1=0;				
								$ProductList = mysqli_query($conn,"SELECT COUNT(id) as count FROM products WHERE cat='$cat1' $wheres GROUP BY product_name");
								while($product = mysqli_fetch_array($ProductList))
								{
									$count = $product['count'];
									$s_no1++;
								}
							?>
					<div class="col-12 col-lg-9 order-lg-3">
						<!-- content -->
						<article id="content">
							<!-- show-head -->
							<header class="show-head d-flex flex-wrap justify-content-between mb-7">
								<ul class="list-unstyled viewFilterLinks d-flex flex-nowrap align-items-center">
									<li class="mr-2"><a href="javascript:void(0);" class="active"><i class="fas fa-th-large"></i></a></li>
									<li class="mr-2"><?php echo $s_no1 ?> results</li>
								</ul>
							</header>
							<?php if ($s_no1 > 0){?>
							<div class="row pro">
								<!-- featureCol -->
								<?php 
									$s_no='1';
									$UserListN = mysqli_query($conn,"SELECT * FROM products WHERE cat='$cat1' $wheres GROUP BY product_name");
									while($userN = mysqli_fetch_array($UserListN))
									{
										$p_id = $userN['id'];
										$product_name = $userN['product_name'];
										$cat = $userN['cat'];
										$price =$userN['price'];
										$product_image = $userN['product_image'];
								?>

								<div class="col-12 col-sm-6 col-lg-3 featureCol mb-7">
									<div class="border" style="height: 250px">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<a href="shop-detail.php?p_id=<?php echo $p_id ?>">
												<img src="admin/uploads-products/<?php echo $product_image ?>" alt="image description" class="img-fluid w-100" style="height: 100px;object-fit: contain;">
											</a>
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<!-- <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li> -->
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
												<!-- <li class="mr-2 overflow-hidden"><a href="shop-detail.php?p_id=<?php echo $p_id ?>" class="icon-eye d-block"></a></li> -->
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.php?p_id=<?php echo $p_id ?>"><?php echo $product_name?></a></span>
											<span class="price d-block fwEbold">Rs. <?php echo $price; ?></span>
											<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">Hot</span>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						
							<?php } else { ?> <h1>Products Not Available</h1> <?php } ?>
						</article>
					</div>
					<div class="col-12 col-lg-3 order-lg-1">	
						<!-- sidebar -->
						<aside id="sidebar">
							<!-- widget -->
							<section class="widget overflow-hidden mb-9">	
								<form  action="category.php?cat=<?php echo $cat1?>#liton_product_grid" method="post" class="searchForm position-relative border">
									<fieldset>
										<input type="text" name="search" placeholder="Search product..." class="search_anything form-control">
										<button class="position-absolute" type="submit" name="submit"><i class="icon-search"></i></button>
									</fieldset>
								</form>
							</section>
							<!-- widget -->
							<section class="widget overflow-hidden mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-5">PRODUCT CATEGORIES</h3>
								<ul class="list-unstyled categoryList mb-0">
									<?php
										$CatList = mysqli_query($conn,"SELECT * FROM cat");
										while($catd = mysqli_fetch_array($CatList))
										{
											$cat_name = $catd['cat_name'];
											$count_catlist = mysqli_query($conn,"SELECT * FROM products where cat = '$cat_name'");
											$count_cat = mysqli_num_rows($count_catlist);
									?>
										<li class="mb-5 overflow-hidden"><a href="category.php?cat=<?php echo $catd['cat_name']?>"><?php echo $cat_name?></a><span class="num border float-right"><?php echo $count_cat ?></span></a></li>
									<?php } ?>	
								</ul>
							</section>
							<!-- widget -->
							<section class="widget mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-6">Filter by price</h3>
							
								<form action="category.php?cat=<?php echo $catd['cat_name']?>" method="post" class="filter-ranger-form">
									<div class="slider-range"></div>
											<!-- <input type="hidden" id="amount1" name="amount1">
											<input type="hidden" id="amount2" name="amount2">
											<div class="get-results-wrap d-flex align-items-center justify-content-between">
												<button type="button" name="filter_amount" class="btn btnTheme btn-shop fwEbold md-round px-3 pt-1 pb-2 text-uppercase">Filter</button>
												<p id="amount" class="mb-0"></p>
											</div> --><br>
											<div class="price_slider_amount">
                        <p><b>Your range:</b>&nbsp;&nbsp;<span><input type="text" id="amount" name="price" placeholder="Add Your Price" /></span></p>
                      </div>
								</form>
							</section>
							<!-- widget -->
							<section class="widget mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-6">top rate</h3>
								<ul class="list-unstyled recentListHolder mb-0 overflow-hidden">
									<?php 
									$s_no='1';
									$UserListN = mysqli_query($conn,"SELECT * FROM products order by rand() limit 4");
									while($userN = mysqli_fetch_array($UserListN))
									{
										$p_id = $userN['id'];
										$product_name = $userN['product_name'];
										$cat = $userN['cat'];
										$price =$userN['price'];
										$product_image = $userN['product_image'];
								?>
									<li class="mb-6 d-flex flex-nowrap">
										<div class="alignleft">
											<a href="shop-detail.php?p_id=<?php echo $p_id ?>"><img src="admin/uploads-products/<?php echo $product_image ?>" alt="image description" class="img-fluid"></a>
										</div>
										<div class="description-wrap pl-1">
											<h4 class="headingVII mb-1"><a href="shop-detail.php?p_id=<?php echo $p_id ?>"><?php echo $product_name ?></a></h4>
											<strong class="price fwEbold d-block;">Rs. <?php echo $price ?></strong>
										</div>
									</li>
								<?php } ?>
								</ul>
							</section>
							<!-- widget -->
							<!-- <section class="widget mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-5">product tags</h3>
								<ul class="list-unstyled tagNavList d-flex flex-wrap mb-0">
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Plant</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Floor</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Indoor</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Green</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Healthy</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Cactus</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">House plant</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Office tree</a></li>
								</ul>
							</section> -->
						</aside>
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
			<?php include 'includes/footer.php';?>
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
	<script src="js/autocomplete.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
	<script type="text/javascript">
		  
  var $j = jQuery.noConflict(true);
         
$j( function() {
		<?php  
	$hashtag_get = mysqli_query($conn,"SELECT product_name FROM products WHERE cat='$cat1' GROUP BY product_name");
	
	$hashtag_array = array();
	foreach($hashtag_get  as $hashtag_get_val)
	{
		$hashtag_array_get = explode(',', $hashtag_get_val['product_name']);
		foreach($hashtag_array_get as $hashtag_array_get_val)
		{
		$hashtag_array[] = $hashtag_array_get_val;
		
		
		}
	}
	
	?>
	  var availableTags = [
	  
	  
	 <?php
	 foreach ($hashtag_array as $hashtag_array_val){
		 echo '"'.$hashtag_array_val.'", ';
	 }
	 ?>	
    ];
    
    
    $j(".search_anything" ).autocomplete({
      source: availableTags,
      autoFocus: false,
      minLength: 1
    });
    
    $j.ui.autocomplete.filter = function (array, term) {
        var matcher = new RegExp("^" + $j.ui.autocomplete.escapeRegex(term), "i");
        return $j.grep(array, function (value) {
            return matcher.test(value.label || value.value || value);
        });
    };
    
} );


$(".slider-range").slider({
	  range: true,
	  min: 20,
	  max: 1000,
	  values: [20, 200],
	  slide: function(event, ui) {
		  $("#amount").val("Rs." + ui.values[0] + " - Rs." + ui.values[1]);
			var price_from = ui.values[ 0 ];
			var price_to = ui.values[ 1 ];
			//alert(price_from);
			//alert(price_to);
			var cat = $('.cat').val();
			$.ajax({
		  type: "POST",
		  url: 'view_price_list_cat.php',
		  data: {price_from:price_from,price_to:price_to,cat:cat},
		  success: function(data){
			console.log(data);
			   //$.getScript( "grid.css" )
			   
				$(".pro").html('');
				$(".pro").html(data);
				$.ajax({
				  type: "POST",
				  url: 'view_price_list_count_cat.php',
				  data: {price_from:price_from,price_to:price_to,cat:cat},
				  success: function(data){
					console.log(data);
					//$.getScript( "grid.css" )
					   
					$("#count").html('');
					$("#count").html(data);

				   }
				});
		   }
			});
	  }
  });
$("#amount").val("Rs." + $(".slider-range").slider("values", 0) + " - Rs." + $(".slider-range").slider("values", 1));
	</script>
</body>

<!-- Mirrored from htmlbeans.com/html/bot by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:07:58 GMT -->
</html>