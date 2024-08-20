<?php include('includes/connect.php');?>
<?php include 'includes/login_check.php'?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/botanical/cart-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:08:07 GMT -->
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
	<style type="text/css">
		.cart-plus-minus, .dec.qtybutton, .inc.qtybutton {
		    background-color: var(--white);
		    font-size: 20px;
		    font-weight: 700;
		    cursor: pointer;
		    display: flex;
		    align-items: center;
    		justify-content: center;
		}

		.inc.qtybutton {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
           	width: 30px;
            height: 30px;
            font: 20px/1.5 Arial,sans-serif;
            text-align: center;
            background-color:#79aa13 !important;
            border-radius: 0px 30px 30px 0px;
            }
        .dec.qtybutton {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 20px/1.5 Arial,sans-serif;
            text-align: center;
            background-clip: padding-box;
            background-color: #df2424 !important;
            border-radius: 30px 0px 0px 30px;
        }

        .dec.qtybutton:hover{
            background-color: #ff0808 !important;
        }
        .inc.qtybutton:hover{
            background-color: #5ba515 !important;
        }
        input.cart-plus-minus-box {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 15px;
            font-weight: 400;
            line-height: 30px;
            min-width: 20px;
            text-align: center;
            height:30px;
        }
	</style>
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
							<h1 class="headingIV fwEbold playfair mb-4">My Cart</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-sm-2 mr-1"><a href="home.html">Home</a></li>
								<li class="mr-sm-2 mr-1">/</li>
								<li class="mr-sm-2 mr-1"><a href="category.php">Shop</a></li>
								<li class="mr-sm-2 mr-1">/</li>
								<li class="active">My Cart</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- cartHolder -->
			<div class="cartHolder container pt-xl-21 pb-xl-24 py-lg-20 py-md-16 py-10">
				<?php 
	            $ip_idc1 = $_SERVER['REMOTE_ADDR'];
	            $badge  = 0;
	            $cartList1 = mysqli_query($conn,"SELECT SUM(quantity) as badge_count FROM cart WHERE ip_id='$ip_idc1' AND userid = '$user_mobile'");
	            $cart123 = mysqli_fetch_array($cartList1);
	            $cart123456 = $cart123['badge_count'];

	            if($cart123456 > 0){
	            ?>
				<div class="row">
					<!-- table-responsive -->
					<div class="col-12 table-responsive">
						<!-- cartTable -->
						<table class="table cartTable mb-xl-22">
							<thead>
								<tr>
									<th scope="col" class="text-uppercase fwEbold border-top-0 text-center">product</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0 text-center">price</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0 text-center" style="width: 20%">quantity</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0 text-center" style="width: 20%">total</th>
									<th scope="col" class="text-uppercase fwEbold border-top-0 text-center"></th>
								</tr>
							</thead>
							<tbody>
								<?php
                                    $ip_idc = $_SERVER['REMOTE_ADDR'];
                                    $priceList = mysqli_query($conn,"SELECT SUM(price) as sub_total FROM cart WHERE ip_id='$ip_idc'");
                                    $price = mysqli_fetch_array($priceList);
                                    $sub_total=$price['sub_total'];
                                    $cartList = mysqli_query($conn,"SELECT * FROM cart WHERE ip_id='$ip_idc'");
                                    while($cart = mysqli_fetch_array($cartList))
                                    {
                                        $p_id=$cart['p_id'];
                                        $c_id=$cart['id'];
                                        $userid=$cart['userid'];
                                        $pList = mysqli_query($conn,"SELECT * FROM products WHERE id='$p_id'");
                                    while($pro = mysqli_fetch_array($pList))
                                    {
                                        $p_id1=$pro['id'];
                                        $p_name=$pro['product_name'];
                                        $prices=$pro['price'];
                                        $image=$pro['product_image'];
                                    }
                                ?>
								<tr class="align-items-center">
									<td class="d-flex align-items-center border-top-0 border-bottom px-0 py-6">
										<div class="imgHolder">
											<img src="admin/uploads-products/<?php echo $image ?>" alt="" class="img-fluid">
										</div>
										<span class="title pl-2"><a href="shop-detail.html"><?php echo $p_name ?></a></span>
									</td>
									<td class="fwEbold border-top-0 border-bottom px-0 py-6">
										Rs. <?php echo $prices ?>
										<input type="hidden" id="single_price1<?php echo $p_id1;?>" name="single_price" value="<?php echo $prices?>"/>
									</td>
									<td class="border-top-0 border-bottom px-0 py-6">
										<div class="cart-plus-minus" onclick="changequantity1(this,<?php echo $p_id1;?>,<?php echo $c_id;?>)">
										<input type="text" style="width: 30%; font-weight: 700" value="<?php echo $cart['quantity']?>" id="quantity1<?php echo $p_id1;?>" name="qtybutton" min="1" max="6" class="cart-plus-minus-box quantity1"  readonly>
										</div>
									
									</td>
									<td class="fwEbold border-top-0 border-bottom px-0 py-6 text-center" ><span>Price : &#8377; </span><input type="text" class="price1" id="price1<?php echo $p_id1;?>"name="price" value="<?php echo $cart['price']?>" style="width:30px;text-align: right;border:none;background-color:#ffffff00;padding-left:0px" readonly></td>
									<td class="fwEbold border-top-0 border-bottom px-0 py-6" ><span class="fas fa-times float-right" style="background-color:red;padding:20px;color:white" onclick="deletec(this,<?php echo $cart['id']?>)"></span></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">					
					<div class="col-12 col-md-6 ml-auto">
						<div class="d-flex justify-content-between">
							<table class="table">
                                <tbody>
                                	<tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><strong>&#8377; <span id="sub_total1"><?php echo $sub_total;?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
						</div>
						<div class="btn-wrapper text-right">
							<?php if (isset($_SESSION['mobile'])) {?>
                                <a href="checkout.php" class="btn btnTheme w-100 fwEbold text-center text-white md-round py-3 px-4 py-md-3 px-md-4">Proceed to checkout</a>
							<?php } else {?>
 								<a href="#costumModal4"  data-toggle="modal" class="theme-btn-1 btn btn-effect-1">Login</a>
							<?php } ?>								
									
                        </div>
					</div>
				</div>
				<?php } else {?>
                	<h1 style="text-align:center;color:green">Add Items into Cart</h1>
            	<?php } ?>
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
		$(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
        $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
        $(".qtybutton").on("click", function() {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            
          
           if ($button.text() == "+") {
               if (oldValue <= 5) {
                var newVal = parseFloat(oldValue) + 1;
               }else{
                 newVal = 6;  
               }    
                
            } else {
                if (oldValue >= 2) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().find("input").val(newVal);
        });





function changequantity1(e,product_id,c_id)
{
     var quantity = "#quantity1" + (product_id);
     var quantity1 = $(quantity).val()||0;
    
    var sinlge_price = "#single_price1" + (product_id);
     var sinlge_price1 = $(sinlge_price).val()||0;
     //alert(sinlge_price1);
    var price = quantity1 * sinlge_price1;
    
    $("#price1" + (product_id)).val(price)||0;
     
     //$('.price').blur(function () {
    var sum = 0;
    $('.price1').each(function() {
        if($(this).val()!="")
         {
            sum += parseFloat($(this).val());
         }

    });
   
     //alert(sum);
        $('#sub_total').html(sum);
        $('#sub_total1').html(sum);
        
//});

    //alert('hi');
    var c_id = c_id;
    var quan = quantity1;
    var pri = price;
    //alert(price);
$.ajax({
  type: "POST",
  url: 'update_cart.php',
  data: {c_id:c_id,quan:quan,pri:pri},
  success: function(data){
//alert(data);
if(data=='Updated'){
	console.log(pri);
  //$("#pros").load(location.href+" #pros>*","");
//$('#ordine').modal('show');
}    

//$('#cityId1').empty();
      //$('#cityId1').append(data);
    
  }
 
});

}

function deletec(e,cart_id)
{
    //alert('hi');
    var c_id = cart_id;
    //alert(c_id);
$.ajax({
  type: "POST",
  url: 'delete_cart.php',
  data: {c_id:c_id},
  success: function(data){
//alert(data);
if(data=='Deleted'){
location.reload(true);
      //$("#pros").load(location.href+" #pros>*","");
  //$("#ordine").load(location.href+" #ordine>*","");
//$('#ordine').modal('show');
}    

//$('#cityId1').empty();
      //$('#cityId1').append(data);
    
  }
 
});
}
	</script>
</body>

<!-- Mirrored from htmlbeans.com/html/botanical/cart-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:08:08 GMT -->
</html>