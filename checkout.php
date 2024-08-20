<?php include('includes/connect.php');?>
<?php include 'includes/login_check.php';?>
<?php
    if(isset($_POST['submit'])){
    $ip_id = $_SERVER['REMOTE_ADDR'];
    $ord_id ='ORD-'.rand(10000,99999);
    $p_st ='Completed';
    $addr = $_POST['address'];
    $sql = "SELECT * FROM cart WHERE ip_id='$ip_id' OR userid = '$user_mobile'";
    $query = mysqli_query($conn,$sql);
    if (mysqli_num_rows($query) > 0) {      
        while ($row=mysqli_fetch_array($query)) {
        $product_id[] = $row["p_id"];
        $quantity[] = $row["quantity"];
        $price[] = $row["price"];
        $role[] = $row['userid'];
        $total[] ='';
    }
        for ($i=0; $i < count($product_id); $i++) {
        	$total[$i] = $price[$i] * $quantity[$i];
            $sql = "INSERT INTO orders (user_id,product_id,ord_id,quantity,price,p_status,address,total) VALUES ('$user_mobile','$product_id[$i]','$ord_id','$quantity[$i]','$price[$i]','$p_st','$addr','$total[$i]')";
            mysqli_query($conn,$sql);
            $sql_product = "SELECT  * FROM products WHERE id='".$product_id[$i]."'";
            $query_p = mysqli_query($conn,$sql_product);
        if (mysqli_num_rows($query_p) > 0) {
            # code...
            while ($row_p=mysqli_fetch_array($query_p)) {
              $product_id_p = $row_p["id"];
              $quantity_p = $row_p["quantity"];
            }
            $quan=$quantity_p-$quantity[$i];
             $sql = "UPDATE products SET quantity='".$quan."' WHERE id='".$product_id[$i]."'";
                mysqli_query($conn,$sql);
            }
            $sql = "DELETE FROM cart WHERE ip_id='$ip_id' OR userid = '$user_id'";
		    mysqli_query($conn,$sql);
		   	$msg = "Dear $name,
                    Your order has been successfully placed.
                    Order details are,
                    Transaction id is  and
                    Order Id is $ord_id
                    Amount : Rs.$net_total";

                    // use wordwrap() if lines are longer than 70 characters
                    $msg = wordwrap($msg,70);

// send email
                mail($email,"ONE STORE",$msg);
                
		    header("location:payment_success.php?id=$ord_id");

		
        }
    }          
    }


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/botanical/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:08:02 GMT -->
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
		<?php include'includes/header_2.php'?>
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(images/b-bg7.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Checkout</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="home.html">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Checkout</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<?php 
 
		$badge  = 0;
		$cartList1 = mysqli_query($conn,"SELECT SUM(quantity) as badge_count FROM cart WHERE userid = $user_mobile");
		$cart123 = mysqli_fetch_array($cartList1);
		$cart123456 = $cart123['badge_count'];
			// while($cart1 = mysqli_fetch_array($cartList1))
			// {
				// $badge=$cart1['badge_count'];
			// }
			if($cart123456 > 0){
			?>
			<section class="abtSecHolder container pt-xl-24 pb-xl-12 pt-lg-20 pb-lg-10 pt-md-16 pb-md-8 pt-10 pb-5">
				<form method="post" action="checkout.php">
				<h5>Delivery Address? <a class="ltn__secondary-color" href="#ltn__returning-customer-login" data-toggle="collapse">Click here</a> <a href="account.php" class=" btn btn-md btn-success" style="float:right">Add New Address</a></h5>
				<div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
		            <?php
						$cartList = mysqli_query($conn,"SELECT * FROM address WHERE userid='$user_mobile' ORDER BY created_at");
						while($cart = mysqli_fetch_array($cartList))
						{
							$id = $cart['id'];
							$name = $cart['name'];
							$mobile = $cart['mobile'];
							$locality = $cart['locality'];
							$pincode = $cart['pincode'];
							$address = $cart['address'];
							$city = $cart['city'];
							$state = $cart['state'];
							$landmark = $cart['landmark'];
							$alt_mobile = $cart['alt_mobile'];
						?>
		                <div class="ltn_coupon-code-form ltn__form-box">
							<div class="radio">
								<label><input type="radio" name="address" value="<?php echo $cart['id']?>" checked style="width:20px"> <span style="font-family: Futura,Trebuchet MS,Arial,sans-serif !important;"><b><?php echo $cart['name']?></b><br><b>Mobile &nbsp;&nbsp;&nbsp;:</b> <?php echo $cart['mobile']?><br><b>Locality &nbsp;:</b> <?php echo $cart['locality']?><br><b>Address &nbsp;:</b> <?php echo $cart['address']?><br><b>City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $cart['city']?><br><b>State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $cart['state']?></span></label>
							</div>
		 				</div>            
					<?php } ?>	
                </div><br>
				<div class="row">
					<div class="col-12 col-lg-6">
						<h3 class="playfair fwEblod mb-4">Payment Method</h3>
						<div id="accordion" class="accordionList">
							<div class="card mb-2">
								<div class="card-header px-xl-5 py-xl-3" id="headingOne">
									<h5 class="mb-0">
										<input type="radio" name="pay" class="btn btn-link fwEbold  collapsed p-0" data-toggle="collapse" data-target="#collapseOne" value="Online payments" aria-expanded="true" aria-controls="collapseOne">&nbsp;&nbsp;&nbsp;&nbsp;
										<span>Online payments</span><i class="fas fa-sort-down float-right"></i>
									</h5>
								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body px-xl-5 py-0">
										<p class="mb-7">Pay via Online; you can pay with your credit card if you don’t have a PayPal account.</p>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header px-xl-5 py-xl-3" id="headingTwo">
									<h5 class="mb-0">
										<input type="radio" name="pay" class="btn btn-link fwEbold collapsed p-0" data-toggle="collapse" data-target="#collapseTwo" value="Cash on delivery" aria-expanded="false" aria-controls="collapseTwo">
										&nbsp;&nbsp;&nbsp;&nbsp;
										<span>Cash on delivery</span><i class="fas fa-sort-down float-right"></i>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body px-xl-5 py-0">
										<p class="mb-7">Pay with cash upon delivery.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<h3 class="playfair fwEblod mb-4">Cart Totals</h3>
						<table class="table">
                            <tbody>
								<?php
									$s_no=1;
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
										//$sub_total=$cart['sub_total'];
									$pList = mysqli_query($conn,"SELECT * FROM products WHERE id='$p_id'");
									while($pro = mysqli_fetch_array($pList))
									{
										$p_id1=$pro['id'];
										$p_image=$pro['product_image'];
										$p_name=$pro['product_name'];
										$net_weight=$pro['net_weight'];
										$prices=$pro['price'];
										$brand=$pro['brand'];
									}
						               $fgst = 8;
						               $del_charge = 50;
								?>	
	            				<?php
	                         		$g =  $sub_total*$fgst;
	                                $gs = $g/100;
	                            ?>
		                            <tr>
		                                <td>
		                                	<?php echo $p_name;?> (<?php echo $net_weight;?>) <strong>× <?php echo $cart['quantity']?></strong>
											<br>
											&#8377; <?php echo $prices?>
										</td>
		                                <td>&#8377; <?php echo $cart['price'];?></td>
		                            </tr>
								<?php } ?>  
									<tr>
	                                    <td><strong>GST Amount (<?php echo $fgst ?>%)</strong></td>
	                                    <td><strong>&#8377; <?php echo number_format((float)$gs, 2, '.', '');?></strong></td>
	                                </tr>
									<tr>
	                                    <td><strong>Delivery Charge </strong></td>
	                                    <td><strong>&#8377; <?php echo number_format((float)$del_charge, 2, '.', '');;?></strong></td>
	                                </tr>           
	           						<tr>
	                                    <td><strong>Order Total</strong></td>
	                                    <td><strong>&#8377; <span id="sub_total2"><?php echo $sub_total+$gs+$del_charge;?></span></strong></td>
	                                </tr>
								<?php 
						 			$ord_id = mt_rand(100000,999999);
									$priceList = mysqli_query($conn,"SELECT SUM(price) as sub_total FROM cart WHERE ip_id='$ip_idc'");
									$price = mysqli_fetch_array($priceList);
									$sub_total=$price['sub_total'];		
									$x=0;
									$cartList = mysqli_query($conn,"SELECT * FROM cart WHERE ip_id='$ip_idc'");
									while($cart = mysqli_fetch_array($cartList))
									{
										$x++;
										$p_id=$cart['p_id'];
										$c_id=$cart['id'];
										$userid=$cart['userid'];
										$quantity=$cart['quantity'];
										$price=$cart['price'];
										//$sub_total=$cart['sub_total'];
									$pList = mysqli_query($conn,"SELECT * FROM products WHERE id='$p_id'");
									while($pro = mysqli_fetch_array($pList))
									{
										$p_id1=$pro['id'];
										$p_image=$pro['product_image'];
										$p_name=$pro['product_name'];
										$net_weight=$pro['net_weight'];
										$prices=$pro['price'];
									}
								?>					
									<input type="hidden" name="product_id<?php echo $x;?>" value="<?php echo $p_id;?>"/>
									<input type="hidden" name="quantity<?php echo $x;?>" value="<?php echo $quantity;?>"/>
									<input type="hidden" name="price<?php echo $x;?>" value="<?php echo $price;?>"/>
								<?php } ?>
		
								<input type="hidden" name="total" value="<?php echo $sub_total;?>"/>
								<input type="hidden" name="order_id" value="<?php echo $ord_id; ?>">
					   		    <input type="hidden" name="cou_id" id="cou_id" value=""/>
								<input type="hidden" name="percentage" id="percentage"/>
								<input type="hidden" name="gst" id="gst" value="<?php echo $gs?>"/>
								<input type="hidden" name="delivery_charge" id="delivery_charge" value="<?php echo $del_charge?>"/>
								<input type="hidden" name="" id="sub" value="<?php echo $sub_total+$gs+$del_charge;?>"/>
								<input type="hidden" name="total" id="g_total" value="<?php echo $sub_total+$gs+$del_charge;?>"/>                        
                            </tbody>
                        </table>
                        <button class="btn btn-success btn-sm btnShop fwEbold text-white py-3 px-4 py-md-3 px-md-4" type="submit" name="submit">Place Order</button>
					</div>
				</div>
				</form>
			</section>
		<?php } else {?>

		<h1 style="text-align:center;color:green">Add Items into Cart</h1>
		<?php } ?>
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
</body>

<!-- Mirrored from htmlbeans.com/html/botanical/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 12:08:05 GMT -->
</html>