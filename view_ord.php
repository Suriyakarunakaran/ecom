<?php include 'includes/connect.php'?>
<?php include 'includes/login_check.php'?>
<?php $ord_id = $_REQUEST['id'];?>
<?php
if (isset($_POST['update'])) {
  
  $f_name=$_POST['f_name'];
  $l_name=$_POST['l_name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $gender=$_POST['gender'];
  $dat=$_POST['dat'];
  $password=$_POST['password'];
  
  $rid=$_POST['rid'];



$then = "UPDATE register_user SET f_name='$f_name',l_name='$l_name',email='$email',mobile='$mobile',gender='$gender',dat='$dat',password='$password' WHERE id='$rid'";
$result = mysqli_query($conn, $then);
if($result){
    echo "<script>
	alert('Submit Successfully');
	window.location.href='index.php';
	</script>";
             
        }
        else{
            echo "Please enter the data";
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
.nav-link.active{
  	background-color: green !important;
}
.form-control{
	background-color: white;
  	height: 40px;
  	margin-bottom: 10px;
}
.form-control:focus{
  	background-color: white;
}

.track-line {
    height: 2px !important;
    background-color: green
}

.dot {
    height: 10px;
    width: 10px;
    margin-left: 3px;
    margin-right: 3px;
    margin-top: 0px;
    background-color: green;
    border-radius: 50%;
    display: inline-block
}

.big-dot {
    height: 25px;
    width: 25px;
    margin-left: 0px;
    margin-right: 0px;
    margin-top: 0px;
    background-color: green;
    border-radius: 50%;
    display: inline-block
}

.big-dot i {
    font-size: 12px
}


.views {
    font-size: 0.85rem
}

.btn {
    color: #666;
    font-size: 0.85rem
}

.btn:hover {
    color: #61b15a
}

.green-label {
    background-color: #defadb;
    color: #48b83e;
    border-radius: 5px;
    font-size: 0.8rem;
    margin: 0 3px
}

.btn.btn-success {
    visibility: visible;
	color:white;
}
.ui-autocomplete {
    position: absolute;
    top: 0;
    padding:3px !important;
    cursor: default;
    background-color:#fff;
    border: 1px solid #aaaaaa;
    max-height: 200px;
	list-style-type:none !important;
    overflow-y: auto;   /* prevent horizontal scrollbar */
    overflow-x: hidden; /* add padding to account for vertical scrollbar */
    z-index:1000 !important;
}
hr{
	margin-top:10px;
	margin-bottom:10px;
}
.ui-autocomplete {
    position: absolute;
    top: 0;
    padding:3px !important;
    cursor: default;
    background-color:#fff;
    border: 1px solid #aaaaaa;
    max-height: 200px;
	list-style-type:none !important;
    overflow-y: auto;   /* prevent horizontal scrollbar */
    overflow-x: hidden; /* add padding to account for vertical scrollbar */
    z-index:1000 !important;
}
.cart-plus-minus {
    border: 2px solid;
    height: 57px;
    line-height: 56px;
    width: 84px;
    text-align: center;
}
.shoping-cart-total {
    float: right;
    max-width: 520px;
    width: 100%;
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
							<div class="ltn__myaccount-tab-content-inner"> 
                            <?php
                                $s_no=1;
                                $cartList = mysqli_query($conn,"SELECT * FROM orders WHERE ord_id='$ord_id'");
                                    while($cart = mysqli_fetch_array($cartList))
                                    {
                                        $p_id=$cart['product_id'];
                                        $c_id=$cart['id'];
                                        $userid=$cart['user_id'];
                                        $address=$cart['address'];
                                        // $gst=$cart['gst'];
                                        // $net=$cart['net_total'];
                                        //$sub_total=$cart['sub_total'];
                                    $pList = mysqli_query($conn,"SELECT * FROM products WHERE id='$p_id'");
                                    while($pro = mysqli_fetch_array($pList))
                                    {
                                        $p_id1=$pro['id'];
                                        $p_image=$pro['product_image'];
                                        $p_name=$pro['product_name'];
                                        $prices=$pro['price'];
                                        $status =  $cart['status'];
                                    }
                            ?>          
                            <div class="row" style="margin-bottom: 20px;border: 1px solid #aebea8; border-radius: 30px;">     
                                <br>
                                <div class="col-md-4 col-lg-4" style="text-align:center">
                                    <img src="admin/uploads-products/<?php echo $p_image ?>" height="70px" width="70px" style="margin-top:20px"/>
                                    <p><b><?php echo $p_name;?></b></p>
                                </div>
                                <div class="col-md-4 col-lg-4" style="text-align:center;">
                                    <br>
                                    <p><b>Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $cart['quantity'];?></p>
                                    <p><b>Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>Rs. <?php echo $prices;?></p>
                                </div>
                                <!-- <div class="col-md-4 col-lg-3" style="text-align:left;">
                                    <br>
                                    <p><b>GST &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>Rs. <?php echo $gst;?></p>
                                    <p><b>Net Weight &nbsp;&nbsp;: </b><?php echo $net;?> Kg</p>
                                </div> -->
                                <div class="col-md-4 col-lg-4" style="text-align:center">
                                    <br>
                                    <p><b>Order Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> <?php echo $ord_id ;?></p>
                                    <a href="" data-toggle="modal" data-target="#myModal<?php echo $p_id1?>" class="btn btn-warning" style="color:white"><b>Add Review</b></a>
                                </div>
                                <br>
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="bg-white p-2 border rounded px-3" style="margin-bottom:20px">
                                                <div class="d-flex flex-row justify-content-between align-items-center order">
                                                    <div class="d-flex flex-column order-details"><span>Your order has been delivered</span><span class="date"></span></div>
                                                    <div class="tracking-details"><button disabled class="btn btn-outline-primary btn-sm" type="button">Track order details</button></div>
                                                </div>
                                                <hr class="divider mb-4">
                                                <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                                	<span class="dot"></span>
                                                    <?php if($cart['status']=='Order Pending') { ?> 
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Pending"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Approved"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Shipped"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Dispatched"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Out for Delivery"></span>
                                                        <hr class="flex-fill">
                                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white" data-toggle="tooltip" data-placement="top" title="Delivered"></i></span>                                        
                                                    <?php } ?>
                                                    <?php if($cart['status']=='Order Approved') { ?> 
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Pending"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Approved"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Shipped"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Dispatched"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Out for Delivery"></span>
                                                        <hr class="flex-fill">
                                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white" data-toggle="tooltip" data-placement="top" title="Delivered"></i></span>                                        
                                                    <?php } ?>
                                                    <?php if($cart['status']=='Order Shipped') { ?> 
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Pending"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Approved"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Shipped"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Dispatched"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Out for Delivery"></span>
                                                        <hr class="flex-fill">
                                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white" data-toggle="tooltip" data-placement="top" title="Delivered"></i></span>                                        
                                                    <?php } ?>
                                    				<?php if($cart['status']=='Dispatched') {?>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Pending"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Approved"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Shipped"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Dispatched"></span>
                                                        <hr class="flex-fill">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Out for Delivery"></span>
                                                        <hr class="flex-fill">
                                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white" data-toggle="tooltip" data-placement="top" title="Delivered"></i></span>                                                    
                                    				<?php }?>
                                    				    
                                    				  <?php if($cart['status']=='Out for delivery') {?>
                                                       <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Pending"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Approved"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Shipped"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Dispatched"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Out for Delivery"></span>
                                                        <hr class="flex-fill">
                                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white" data-toggle="tooltip" data-placement="top" title="Delivered"></i></span>
                                    				<?php }?>
                                    				   
                                    			    <?php if($cart['status']=='Delivered') {?>
                                                         <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Pending"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Approved"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Shipped"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Order Dispatched"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="dot" data-toggle="tooltip" data-placement="top" title="Out for Delivery"></span>
                                                        <hr class="flex-fill track-line">
                                                            <span class="d-flex justify-content-center align-items-center big-dot dot"><i class="fa fa-check text-white" data-toggle="tooltip" data-placement="top" title="Delivered"></i></span>
                                                    
                                    				<?php }?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- The Modal -->
                            <div id="myModal<?php echo $p_id1?>" class="modal fade" role="dialog" style="margin-top:50px">
                                <div class="modal-dialog modal-md">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="">
                                          <?php echo $p_name;?>
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>
                                            <div class="modal-body" style="">
                                        <form method="post" action="review.php">
                                                <input type="hidden" name="userid" value="<?php echo $userid?>"/>
                                                <input type="hidden" name="p_id" value="<?php echo $p_id1?>"/>
                                                 <div class="col-12">
                                                    <label>Your rating: <span>*</span></label>
                                                    <select name="rating" class="form-control" required>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label>Review: <span>*</span></label>
                                                    <textarea class="form-control" name="review" required></textarea>
                                                </div>                      
                                            </div>
                                            <div class="modal-footer">
                                               <button class="btn btn-success" type="submit" name="submit" style="float:right">Submit Review</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                    <!-- The Modal -->
                            </div>
                            <?php if($status == 'Delivered') { ?>
                              <td><a href="invoice.php?ord_id=<?php echo $ord_id?>" class="btn btn-success btn-lg" >Invoice</a></td>
                            <?php } else { ?>
                              <td><button class="btn btn-success btn-lg" disabled title="This Order Deliver Soon">Invoice</button></td>
                            <?php } ?> 
						</article>
					</div>
					<div class="col-12 col-lg-4 order-lg-1">
                        <!-- sidebar -->
                        <aside id="sidebar">
                            <section class="widget mb-9">
                                <ul class="list-unstyled tagNavList mb-0">                          
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link py-3 mb-3 d-block" href="account.php">Dashboard <i class='fa fa-home mr-3 float-left'></i></a>

                                        <a class="nav-link py-3 mb-3 d-block" href="account.php">Address <i class='fa fa-map-marker-alt mr-3 float-left'></i></a>

                                        <a class="nav-link py-3 mb-3 d-block" href="account.php">Account Details <i class='fa fa-user mr-3 float-left'></i></a>

                                        <a class="nav-link py-3 mb-3 d-block" href="account.php">Orders <i class='fa fa-shopping-cart mr-3 float-left'></i></a>

                                        <!-- <a class="nav-link py-3 mb-3 d-block" id="v-pills-place-tab" data-toggle="pill" href="#v-pills-place" role="tab" aria-controls="v-pills-place" aria-selected="false">Place Orders <i class='fa fa-cart-arrow-down mr-3 float-left'></i></a> -->

                                        <a class="nav-link py-3 mb-3 d-block" href="includes/logout.php">Logout <i class='fa fa-sign-out-alt mr-3 float-left'></i></a>
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