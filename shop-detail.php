<?php include('includes/connect.php');?>
<?php include('includes/login_check.php');?>
<?php 
    if(isset($_GET['p_id'])){
    	$pro_id = $_GET['p_id'];
    }
?>
<?php 
	$ProductList = mysqli_query($conn,"SELECT * FROM products where id = '$pro_id'");
	$product = mysqli_fetch_array($ProductList);
	$quantity = $product['quantity'];
	$sub_cat = $product['sub_cat'];
	$cat = $product['cat'];
	$p_id = $product['id'];

	$prod_id = $product['p_code'];
?>
<!--  -->


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/botanical/shop-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:07:58 GMT -->
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
<style type="text/css">
				
        .v_button {
          color: #fff;
          display: flex;
          align-items: center;
          justify-content: space-around;
          padding: 0 7px 0 0;
          position: relative;
        }
        .v_button a {
          border: #f9b02d;
          background-color: #f9b02d;
        }
        .v_button a:hover{
            background-color: #ffd300;
        }
        .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 15px;
            font-weight: 400;
            line-height: 40px;
            min-width: 20px;
            text-align: center;
            height:50px;
        }
        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
           	width: 55px;
            height: 50px;
            font: 30px/1.7 Arial,sans-serif;
            text-align: center;
            background-color:#79aa13 !important;
            border-radius: 0px 30px 30px 0px;
            }
        .qty .minus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 55px;
            height: 50px;
            font: 30px/1.7 Arial,sans-serif;
            text-align: center;
            background-clip: padding-box;
            background-color: #df2424 !important;
            border-radius: 30px 0px 0px 30px;
        }

        .minus:hover{
            background-color: #ff0808 !important;
        }
        .plus:hover{
            background-color: #5ba515 !important;
        }
</style>
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
								<li class="mr-2"><a href="home.html">Home</a></li>
								<li class="mr-2">/</li>
								<li class="mr-2"><a href="category.php?cat=<?php echo $cat ?>">Shop</a></li>
								<li class="mr-2">/</li>
								<li class="active"><?php echo $product['product_name'];?></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- twoColumns -->
			<div class="twoColumns container pt-xl-23 pb-xl-20 pt-lg-20 pb-lg-20 py-md-16 py-10">
				<div class="row mb-6">
					<div class="col-12 col-lg-6 order-lg-1">
						<!-- productSliderImage -->
						<div class="productSliderImage mb-lg-0 mb-4">
							<?php 
								$CatList = mysqli_query($conn,"SELECT * FROM product_image where p_id = $prod_id limit 5");
								while($catd = mysqli_fetch_array($CatList))
								{
							?>
							<div>
								<img src="admin/uploads-images/<?php echo $catd['prod_image']?>" alt="image description" class="img-fluid w-100">
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-12 col-lg-6 order-lg-3">
						<!-- productTextHolder -->
						<div class="productTextHolder overflow-hidden">
							<h2 class="fwEbold mb-2"><?php echo $product['product_name'];?></h2>
							<ul class="list-unstyled ratingList d-flex flex-nowrap mb-2">
								<li class="mr-2"><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
								<li class="mr-2"><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
								<li class="mr-2"><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
								<li class="mr-2"><a href="javascript:void(0);"><i class="fas fa-star"></i></a></li>
								<li class="mr-2"><a href="javascript:void(0);"><i class="far fa-star"></i></a></li>
								<li>( 5 customer reviews )</li>
							</ul>
							<strong class="price d-block mb-5 text-green">Rs. <?php echo $product['price'];?></strong>
							<p class="mb-5"><?php echo $product['keywords'];?></p>
							<ul class="list-unstyled productInfoDetail mb-5 overflow-hidden">
								<li class="mb-2">Product Code: <span><?php echo $product['p_code'];?></span></li>
								<li class="mb-2">Quantity: <span><?php echo $quantity;?></span></li>
								<li class="mb-2">Shipping tax: <span>Free</span></li>
							</ul>
							<div class="holder overflow-hidden d-flex flex-wrap mb-6">								
								<span id="count_deatils<?php echo $product['id'];?>"></span>
                <div class="v_button">
									<input type="hidden" name="p_id" id="p_id-<?php echo $product['id'];?>"value="<?php echo $product['id'];?>" />
									<input type="hidden" name="ip_id" id="ip_id-<?php echo $product['id'];?>"value="<?php echo $_SERVER['REMOTE_ADDR'];?> " />
									<input type="hidden" name="quantity" id="quantity-<?php echo $product['id'];?>"value="1" />
									<?php if (isset($_SESSION['mobile'])) { ?>
									<input type="hidden" name="userid" id="userid-<?php echo $product['id'];?>"value="<?php echo $user_id?>" />
									<?php } else {?>
									<input type="hidden" name="userid" id="userid-<?php echo $product['id'];?>"value="Null" />
									<?php }?>					
									<span id="displaycartbutton<?php echo $p_id;?>">
									<?php 
										$ip_id = $_SERVER['REMOTE_ADDR'];
										$cartList = mysqli_query($conn,"SELECT COUNT(id) as count,quantity,id FROM cart WHERE ip_id='$ip_id' AND p_id='$p_id'");
										$cart = mysqli_fetch_array($cartList);
										$cart_item_count = $cart['count'];
										$c_id = $cart['id'];
										$quantity = $cart['quantity'];
										//exit; 
										if($cart_item_count=='0'){ ?>
															
										<fieldset id="script-<?php echo $product['id'];?>">
											<input type="hidden" name="price" id="price-<?php echo $product['id'];?>"value="<?php echo $product['price'];?>" />
											<button class="btn btnTheme btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4" type="button" id="submit-<?php echo $p_id?>" onclick="addtocartlist(<?php echo $product['id'];?>);" >
										    <i class="fas fa-shopping-cart"></i>
										    <span>Add To Cart</span>
									    </button>
										</fieldset>
										<?php } else { ?>		
										<div class="qty" id="c" style="">
											<span class="minus bg-dark" onclick="cartproductminus(<?php echo $p_id;?>)"; id="minus-<?php echo $p_id;?>">-</span>
												<input type="text" style="border: 0;width: 45px;" disabled class="count" id="count-<?php echo $p_id;?>" name="qty" value="<?php echo $quantity?>" >
											<span class="plus bg-dark" onclick="cartproductplus(<?php echo $p_id;?>)" id="plus-<?php echo $p_id;?>">+</span>
									  </div>
									<?php } ?>
									</span>
								</div>
								<a href="cart.php" class="btn btn-warning btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4 mr-1">View Cart <i class="fas fa-arrow-right ml-2"></i></a>
								<?php
									$wishlist = mysqli_query($conn,"SELECT * FROM wishlist where user_id = '$user_mobile' AND p_id ='$p_id'");
									$wish_row  = mysqli_num_rows($wishlist);
									if($wish_row > 0) {
										$List_wish = mysqli_fetch_array($wishlist);
										$status = $List_wish['status'];
										if($status == 0) { ?>
											<a href="wish_list.php?like=<?php echo $p_id ?>" class="btn btn-info btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4">Add To Wishlist <i class="fas fa-arrow-right ml-2"></i></a>	
										<?php } 
									} else { ?>
										<a href="wish_list.php?like=<?php echo $p_id ?>" class="btn btn-info btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4">Add To Wishlist <i class="fas fa-arrow-right ml-2"></i></a>
									<?php	} ?>
								<!-- <a href="likes.php" class="btn btn-warning btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4">View Cart <i class="fas fa-arrow-right ml-2"></i></a> -->
							</div>
							<ul class="list-unstyled socialNetwork d-flex flex-wrap mb-sm-11 mb-4">
								<li class="text-uppercase mr-5">SHARE THIS PRODUCT:</li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-google-plus-g"></a></li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
								<li class="mr-4"><a href="javascript:void(0);" class="fab fa-pinterest-p"></a></li>
							</ul>
							<ul class="list-unstyled productInfoDetail mb-0">
								<li class="mb-2">Categories: 
									<?php
										$CatList = mysqli_query($conn,"SELECT * FROM cat order by rand() limit 3");
										while($catd = mysqli_fetch_array($CatList))
										{
											$cat_name = $catd['cat_name'];
										?>
										<a href="category.php?cat=<?php echo $catd['cat_name']?>"><?php echo $cat_name?></a>,<?php } ?> 
								</li>									
								<li class="mb-2">Tags: 
									<?php 
										$CatList = mysqli_query($conn,"SELECT * FROM products order by rand() limit 3");
										while($catd = mysqli_fetch_array($CatList))
										{
											$prod_sub = $catd['sub_cat'];
										?>
										<a href="#"><?php echo $prod_sub ?></a>,<?php } ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<!-- paggSlider -->
						<div class="paggSlider">
							<?php 
								$CatList = mysqli_query($conn,"SELECT * FROM product_image where p_id = $prod_id limit 5");
								while($catd = mysqli_fetch_array($CatList))
								{
							?>
								<div>
									<div class="imgBlock">
										<img src="admin/uploads-images/<?php echo $catd['prod_image']?>" alt="image description" class="img-fluid">
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- tabSetList -->
						<ul class="list-unstyled tabSetList d-flex justify-content-center mb-9">
							<li class="mr-md-20 mr-sm-10 mr-2">
								<a href="#tab1-0" class="active playfair fwEbold pb-2">Description</a>
							</li>
							<li>
								<?php
									$ProductListr = mysqli_query($conn,"SELECT * FROM review WHERE p_id = $p_id");
									$productr = mysqli_num_rows($ProductListr);

								?>
								<a href="#tab2-0" class="playfair fwEbold pb-2">Reviews ( <?php echo $productr?> )</a>
							</li>
						</ul>
						<!-- tab-content -->
						<div class="tab-content mb-xl-11 mb-lg-10 mb-md-8 mb-5">
							<div id="tab1-0" class="active">
								<p><?php echo $product['description'];?></p>
							</div>
							<div id="tab2-0">
									<?php $ProductListr = mysqli_query($conn,"SELECT * FROM review WHERE p_id=$p_id");
									while($productr = mysqli_fetch_array($ProductListr))
										
									{
									$id = $productr['id'];
										$p_id = $productr['p_id'];
										$userid = $productr['userid'];
										$rating = $productr['rating'];
										$review = $productr['review'];
										$created_at = $productr['created_at'];
									$date =	substr($created_at,0,10);
									
								$ProductListu = mysqli_query($conn,"SELECT * FROM register_user WHERE id=$userid");
									while($productu = mysqli_fetch_array($ProductListu))
										
									{
									   $username= $productu['name'];
									}
									
									?>
									<style type="text/css">
										
										.product-ratting ul{
											padding: 0;
										}
										.product-ratting ul li {
											display: inline-block;
										}
									</style>
                  <div style="display: flex;justify-content: space-evenly;align-items: center;">
                        <img src="images/user1.png" alt="Image" style="height: 70px">                        
                    	  <div class="product-ratting">
                    	  	<h6><?php echo $username?></h6>
                          <ul>
											      <?php if($rating==1){?>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="far fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<?php } else if($rating==2) {?>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<?php }else if($rating==3) {?>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<?php }else if($rating==4) {?>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="far fa-star"></i></a></li>
														<?php }else if($rating==5) {?>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
                            <li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
														<li><a href="#"><i class="fas fa-star"></i></a></li>
  													<?php }?>																	 
                          </ul>
                      		<p><?php echo $review?></p>
                        </div>
                      <span class="btn btn-outline-success"><?php echo $formatted = date('jS M Y', strtotime($created_at));?></span>
                </div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- featureSec -->
			<section class="featureSec container overflow-hidden pt-xl-12 pb-xl-29 pt-lg-10 pb-lg-14 pt-md-8 pb-md-10 py-5">
				<div class="row">
					<!-- mainHeader -->
					<header class="col-12 mainHeader mb-5 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Related products</h1>
					</header>
				</div>
				<div class="row">
					<!-- featureCol -->
					<?php 
						$product_sub = mysqli_query($conn,"SELECT * FROM products where sub_cat = '$sub_cat'");
						while($sub_prod = mysqli_fetch_array($product_sub))
						{
					?>
					<div class="col-12 col-sm-6 col-lg-3 featureCol position-relative mb-7">
						<div class="border">
							<div class="imgHolder position-relative w-100 overflow-hidden">
								<a href="shop-detail.php?p_id=<?php echo $p_id ?>">
									<img src="admin/uploads-products/<?php echo $sub_prod['product_image'] ?>" alt="image description" class="img-fluid w-100">
								</a>
								<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
									<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
									<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
									<li class="mr-2 overflow-hidden"><a href="shop-detail.php?p_id=<?php echo $p_id ?>" class="icon-eye d-block"></a></li>
									<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
								</ul>
							</div>
							<div class="text-center py-5 px-4">
								<span class="title d-block mb-2"><a href="shop-detail.php?p_id=<?php echo $sub_prod['id']; ?>"><?php echo $sub_prod['product_name']?></a></span>
								<span class="price d-block fwEbold"> Rs.<?php echo $sub_prod['price']?></span>
								<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</section>
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
	<script type="text/javascript">
		function cartproductplus(pid){       
            $.ajax({
              type: 'POST',
              url: 'update_cart_plus.php',
              data: {c_id:pid},
              success: function(data){
            //alert(data);
            if(data <='5'){
            $('#displaycartbutton'+pid).html('<div class="qty" id="c"><span class="minus bg-dark"  onclick="cartproductminus('+pid+')" id="minus-'+pid+'">-</span><input type="text" style="border: 0;width: 45px;" class="count" id="count-'+pid+'" name="qty" value="'+data+'" readonly><span class="plus bg-dark"  onclick="cartproductplus('+pid+')" id="plus-'+pid+'">+</span></div>');
            $('#count_deatils'+pid).html('');   
            }else {
            $('#displaycartbutton'+pid).html('<div class="qty" id="c"><span class="minus bg-dark"  onclick="cartproductminus('+pid+')" id="minus-'+pid+'">-</span><input type="text" style="border: 0;width: 45px;" class="count" id="count-'+pid+'" name="qty" value="'+data+'" readonly><span class="plus bg-dark"  onclick="" id="">+</span></div>');

            $('#count_deatils'+pid).html('<p style="color:red;font-size:14px;text-align:center">Quantity Exceeded</p>');    
            } $.ajax({
              type: "POST",
              url: 'view_cart.php',
              data: {pid:pid},
               success: function(data){
                   console.log(data);
                $(".cart-items").html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
                $(".cart-items").html(data);
                $.ajax({
              type: 'POST',
              url: 'get_count.php',
              data: {p_id:pid},
              success: function(data){
            //alert(data);
            $('#badge_count').html(data);
            $('#badge_count1').html(data);
            $('#badge_count2').html(data);
            //$("#schedbox").load(location.href+" #schedbox>*","");
              }
             
            });
               }
            });
            }
             
            });
        }

        function cartproductminus(pid){
            //var c_id = pid;
                    
            $.ajax({
              type: 'POST',
              url: 'update_cart_minus.php',
              data: {c_id:pid},
              success: function(data){
                  if(data <= '0'){

            $.ajax({
              type: "POST",
              url: 'deletecat.php',
              data: {c_id:pid},
              success: function(data){
                  $.ajax({
              type: "POST",
              url: 'view_cart.php',
              data: {pid:pid},
               success: function(data){
                   console.log(data);
                $(".cart-items").html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
                $(".cart-items").html(data);
                $.ajax({
              type: 'POST',
              url: 'get_count.php',
              data: {p_id:pid},
              success: function(data){
            //alert(data);
            $('#badge_count').html(data);
            $('#badge_count1').html(data);
            $('#badge_count2').html(data);
            //$("#schedbox").load(location.href+" #schedbox>*","");
              }
             
            });
               }
            });
              }
            });
            }
            if(data >= '1' )
            {
                
                $('#displaycartbutton'+pid).html('<div class="qty" id="c"><span class="minus bg-dark"  onclick="cartproductminus('+pid+')" id="minus-'+pid+'">-</span><input type="text" style="border: 0;width: 45px;" class="count" id="count-'+pid+'" name="qty" value="'+data+'" readonly><span class="plus bg-dark"  onclick="cartproductplus('+pid+')" id="plus-'+pid+'">+</span></div>');
            $('#count_deatils'+pid).html('');   

            } else if (data >= '6'){
                $('#displaycartbutton'+pid).html('<div class="qty" id="c"><span class="minus bg-dark"  onclick="cartproductminus('+pid+')" id="minus-'+pid+'">-</span><input type="text" style="border: 0;width: 45px;" class="count" id="count-'+pid+'" name="qty" value="'+data+'" readonly><span class="plus bg-dark"  onclick="" id="">+</span></div>');

            $('#count_deatils'+pid).html('<p style="color:red;font-size:14px;text-align:center">Quantity Exceeded</p>');    

            } else if (data == '0'){
                $('#displaycartbutton'+pid).html('<fieldset id="script-'+pid+'"><input type="hidden" name="price" id="price-'+pid+'" value="310"><button class="btn btnTheme btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4" style="padding:6px;" type="button" id="submit-'+pid+'" onclick="addtocartlist('+pid+');" ><i class="icon-cart"></i>Add To Cart</button></fieldset>');
            }
             $.ajax({
              type: "POST",
              url: 'view_cart.php',
              data: {pid:pid},
               success: function(data){
                   console.log(data);
                $(".cart-items").html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
                $(".cart-items").html(data);
                $.ajax({
              type: 'POST',
              url: 'get_count.php',
              data: {p_id:pid},
              success: function(data){
            //alert(data);
            $('#badge_count').html(data);
            $('#badge_count1').html(data);
            $('#badge_count2').html(data);
            //$("#schedbox").load(location.href+" #schedbox>*","");
              }
             
            });
               }
            });
              }
            });
        }


        function addtocartlist(pid){
            $.ajax({
              type: 'POST',
              url: 'add_cart.php',
              data: {p_id:pid},
              success: function(data){

                $('#displaycartbutton'+pid).html('<div class="qty" id="c"><span class="minus bg-dark"  onclick="cartproductminus('+pid+')" id="minus-'+pid+'">-</span><input type="text" style="border: 0;width: 45px;" class="count" id="count-'+pid+'" name="qty" value="1" readonly><span class="plus bg-dark"  onclick="cartproductplus('+pid+')" id="plus-'+pid+'">+</span></div>');
         
             $.ajax({
              type: "POST",
              url: 'view_cart.php',
              data: {pid:pid},
               success: function(data){
                   console.log(data);
                $(".cart-items").html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
                $(".cart-items").html(data);
                $.ajax({
              type: 'POST',
              url: 'get_count.php',
              data: {p_id:pid},
              success: function(data){
            //alert(data);
            $('#badge_count').html(data);
            $('#badge_count1').html(data);
            $('#badge_count2').html(data);
            //$("#schedbox").load(location.href+" #schedbox>*","");
            $.ajax({
              type: 'POST',
              url: 'view_cart_success.php',
              data: {p_id:pid},
              success: function(data){
            $("#add_to_cart_modal").modal('show');
            //$("#schedbox").load(location.href+" #schedbox>*","");
            $(".success-modal").html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
            $(".success-modal").html(data);

              }
             
            });
              }
             
            });
               }
            });

              }
             
            });
        }


        function getWeight(e,pid){
                var p_id = e.value;
                var pro_id = pid;
                //alert(p_id);
                //alert(pro_id);
                $.ajax({
              type: 'POST',
              url: 'change_product.php',
              data: {p_id:p_id},
              success: function(data){
            //$("#add_to_cart_modal").modal('show');
            //$("#schedbox").load(location.href+" #schedbox>*","");
             
            $('#product'+pro_id).html(' ');
            $('#product'+pro_id).html(data);
            $(".product"+pro_id).prop("id", " ");
            $(".product"+pro_id).prop("id", "product"+p_id);
              }
             
            });
        }

        function deletec(e,cart_id,pid){
                //alert('hi');
                var c_id = cart_id;
                //alert(c_id);
            $.ajax({
              type: "POST",
              url: 'deletec.php',
              data: {c_id:c_id},
              success: function(data){
            //alert(data);
            if(data=='Deleted'){
            //location.reload(true);
               $('#displaycartbutton'+pid).html('');
                $('#displaycartbutton'+pid).html('<fieldset id="script-'+pid+'"><input type="hidden" name="price" id="price-'+pid+'" value="310"><button class="btn btnTheme btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4" style="padding:6px;" type="button" id="submit-'+pid+'" onclick="addtocartlist('+pid+');" ><i class="icon-cart"></i>Add To Cart</button></fieldset>');
                
            $.ajax({
              type: "POST",
              url: 'view_cart.php',
              data: {pid:pid},
               success: function(data){
                   console.log(data);
                $(".cart-items").html('<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>');
                $(".cart-items").html(data);
                $.ajax({
              type: 'POST',
              url: 'get_count.php',
              data: {p_id:pid},
              success: function(data){

            //alert(data);
            $('#badge_count').html(data);
            $('#badge_count1').html(data);
            $('#badge_count2').html(data);
            //$("#schedbox").load(location.href+" #schedbox>*","");
              }
             
            });
               }
            });
            }    

            //$('#cityId1').empty();
                  //$('#cityId1').append(data);
                
              }
             
            });
        }



$("#register_account").click(function(){
	//alert('hi');
	var name = $('#Name').val();
	var mobile = $('#MobileNumber').val();
	var password = $('#Password').val();
	if(name!='' && mobile!='' && password!=''){
$.ajax({
  type: 'POST',
  url: 'register.php',
  data: {name:name,mobile:mobile,password:password},
  success: function(data){
	//alert(data);
	
$("#login").show();
$("#success").show();
   $("#register").hide();
  }
 
});
}
});
	</script>

</body>

<!-- Mirrored from htmlbeans.com/html/botanical/shop-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:08:02 GMT -->
</html>