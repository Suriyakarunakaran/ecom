<?php include 'includes/connect.php' ?>
<?php include 'includes/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Evara</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include'includes/header.php' ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
              <!-- partial:partials/_sidebar.html -->
        <?php include'includes/sidebar.php' ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">            
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="true">Users</a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link active" id="business-tab" data-bs-toggle="tab" href="#business-1" role="tab" aria-selected="false">Business</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="performance-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">Performance</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="conversion-tab" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">Conversion</a>
                    </li> -->
                  </ul>
                  <div class="d-md-block d-none">
                    <a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
                    <a href="#" class="text-light p-1"><i class="mdi mdi-dots-vertical"></i></a>
                  </div>
                </div>
                <?php               
                  $s_no=1;
                  $OrderList = mysqli_query($conn,"SELECT * FROM orders GROUP BY ord_id");
                  $num_order = mysqli_num_rows($OrderList);
                  $order = mysqli_fetch_array($OrderList);
                ?>
                <?php 
                  $s_no=1;
                  $UserList = mysqli_query($conn,"SELECT * FROM register_user");
                  $num_user = mysqli_num_rows($UserList);
                  $user = mysqli_fetch_array($UserList);
                ?>
                <?php 
                  $s_no=1;
                  $DeliverList = mysqli_query($conn,"SELECT * FROM orders where status = 'Delivered'");
                  $num_deliver = mysqli_num_rows($DeliverList);
                  $delivered = mysqli_fetch_array($DeliverList);
                ?>
                <?php 
                  $s_no=1;
                  $ProductsList = mysqli_query($conn,"SELECT * FROM products");
                  $num_products = mysqli_num_rows($ProductsList);
                  $products = mysqli_fetch_array($ProductsList);
                ?>

                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Total Orders</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num_order ?></h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Total Users</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num_order ?></h2>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Delivered Orders</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num_deliver ?></h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-eye icon-md absolute-center text-dark"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Total Products</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num_products ?></h2>
                            <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cube icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0"></p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark"></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include 'includes/footer.php' ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
