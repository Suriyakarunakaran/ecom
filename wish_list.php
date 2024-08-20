<?php include'includes/connect.php';
include'includes/login_check.php';
?>
<?php
 if (isset($_GET['like'])) {
   $p_id=$_GET['like'];
   $status='1';
   $sql = "INSERT INTO wishlist (user_id,p_id,status) VALUES('$user_mobile','$p_id','$status')";
    if (mysqli_query($conn, $sql)) {
        //header('Location:category.php');
            echo "<script>
            alert('This Product Added Successfully in the Wishlist');
            window.location.href='shop-detail.php?p_id=$p_id';
            </script>";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();
    }

    if (isset($_GET['unlike'])) {
    $p_id=$_GET['unlike'];
    $sql = "DELETE FROM wishlist where p_id = $p_id AND user_id = $user_mobile";
    if (mysqli_query($conn, $sql)) {
        //header('Location:category.php');
            echo "<script>
            alert('This Product Removed From Wishlist');
            window.location.href='shop-detail.php?p_id=$p_id';
            </script>";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();
    }

    if (isset($_GET['shop'])) {
    $p_id=$_GET['shop'];
    $sql = "DELETE FROM wishlist where p_id = $p_id AND user_id = $user_mobile";
    if (mysqli_query($conn, $sql)) {
        //header('Location:category.php');
            echo "<script>
            alert('Add This Product to Cart');
            window.location.href='shop-detail.php?p_id=$p_id';
            </script>";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();
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
        <?php include ('includes/header_2.php'); ?>
        <!-- main -->
        <main>
            <!-- introBannerHolder -->
            <section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(images/b-bg7.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
                            <h1 class="headingIV fwEbold playfair mb-4">Wishlist</h1>
                            <ul class="list-unstyled breadCrumbs d-flex justify-content-center">
                                <li class="mr-2"><a href="home.html">Home</a></li>
                                <li class="mr-2">/</li>
                                <li class="active">Wishlist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- twoColumns -->
            <div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
                <div class="row">
                    <div class="col-12 col-lg-12 order-lg-3">
                        <!-- content -->
                        <article id="content">
                            <div class="row">
                                <!-- featureCol -->
                                <?php 
                                    $sat_list='1';
                                    $wishlist = mysqli_query($conn,"SELECT * FROM wishlist where user_id= '$user_mobile'  AND status = '$sat_list'");
                                    while($list = mysqli_fetch_array($wishlist))
                                    {
                                        $p_id = $list['id'];
                                        $product_id = $list['p_id'];
                                        $status = $list['status'];

                                    $UserListN = mysqli_query($conn,"SELECT * FROM products where id = '$product_id'");
                                    while($userN = mysqli_fetch_array($UserListN))
                                    {
                                        $p_id = $userN['id'];
                                        $product_name = $userN['product_name'];
                                        $cat = $userN['cat'];
                                        $price =$userN['price'];
                                        $product_image =$userN['product_image'];
                                    }
                                
                                ?>
                                    <div class="col-12 col-sm-6 col-lg-2 featureCol mb-7">
                                    <div class="border">
                                        <div class="imgHolder position-relative w-100 overflow-hidden">
                                            <a href="shop-detail.php?p_id=<?php echo $p_id ?>">
                                                <img src="admin/uploads-products/<?php echo $product_image ?>" alt="image description" class="img-fluid w-100">
                                            </a>
                                            <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                                                <?php if($status == 1){?>
                                                    <li class="mr-2 overflow-hidden"><a href="wish_list.php?unlike=<?php echo $p_id ?>" class="icon-heart d-block" style="background: #28a745; color: white;"></a></li>
                                                <?php } ?>

                                                <?php if($status == 1){?>
                                                    <li class="mr-2 overflow-hidden"><a href="wish_list.php?shop=<?php echo $p_id ?>" class="icon-eye d-block"></a></li>
                                                <?php } ?>
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