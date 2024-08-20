<?php include('connect.php');
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
        
        $query = "SELECT * FROM register WHERE mobile='$mobile' AND password='$password'";
        $results = mysqli_query($conn, $query);
        
            
            if (mysqli_num_rows($results) == 1) {

              $_SESSION['mobile'] = $mobile;
              

              $_SESSION['success'] = "You are now logged in";
              /*header('location: index.php');*/
                echo "
                <script>
            alert('Logged In Successfully');
            window.location.href='../index.php';
            </script>";

            }else {
              echo "<script>
              alert('Wrong username/password combination');
            window.location.href='login.php';
            </script>";
            }
        
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Evara</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../images/logo.png">
                </div>
                <form class="pt-3" action="login.php" method="post">
                  <div class="form-group">
                    <input type="tel" name="mobile" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Registered Mobile Number">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Your Password">
                  </div>
                  <div class="mt-3">
                    <input class="btn d-grid btn-primary btn-lg font-weight-medium auth-form-btn" name="login" value="SIGN IN" type="submit">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>