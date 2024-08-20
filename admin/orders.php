<?php include 'includes/connect.php' ?>
<?php include 'includes/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php
  // Create connection
  if(isset($_POST["submit"])){
    $brand_name=$_POST["brand_name"];
    $sql = "INSERT INTO brand (brand_name) VALUES('$brand_name')";
    $result = mysqli_query($conn, $sql);
    if($result) {
      header("location:brands.php");
    }
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
    }
?>
<?php
  // Create connection
  if(isset($_POST["update"])){            
    $brand_name=$_POST["edit_brand"];
    $id=$_POST["id_a"];
    $sql = "UPDATE brand SET brand_name='$brand_name' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if($result) {
      header("location:brands.php");
    } else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
<?php
  $edit_brand = "";
  $edit = false; 
  if (isset($_GET['edit'])) {
  $edit = true;
  $id = $_GET['edit'];
  $edit_UserList = mysqli_query($conn,"SELECT * FROM brand where id='$id'");
  $edit_user = mysqli_fetch_array($edit_UserList);
  $edit_brand = $edit_user['brand_name'];
  $edit_id= $edit_user['id'];
  }
?>
<?php
  if(isset($_GET["delete"])){
    $delete_id = $_GET['delete'];
    $sql = "DELETE FROM brand WHERE id='$delete_id'";
    if (mysqli_query($conn, $sql)) {
      header('Location:brands.php');
    } else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orders</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
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
            <div class="page-header">
              <h3 class="page-title">Orders</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Orders</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Orders Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x: scroll;">
                    <table class="table table-hover" id="example">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>User Details</th>
                          <th>View Orders</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $s_no='1';
                          $UserList = mysqli_query($conn,"SELECT * FROM orders GROUP BY user_id");
                          while($user = mysqli_fetch_array($UserList))
                          {
                            $user_id= $user['user_id'];
                            $address= $user['address'];
                            $pList = mysqli_query($conn,"SELECT * FROM register_user WHERE mobile='$user_id'");
                          while($p = mysqli_fetch_array($pList))
                          {
                            $reg_name = $p['name'];
                            $reg_mobile = $p['mobile'];
                            $reg_email = $p['email'];
                            $reg_address = $p['address'];
                          }
                          $addList = mysqli_query($conn,"SELECT * FROM address WHERE userid='$reg_mobile'");
                          while($addp = mysqli_fetch_array($addList))
                          {
                            $name = $addp['name'];
                            $mobile = $addp['mobile'];
                            $pincode = $addp['pincode'];
                            $locality = $addp['locality'];
                            $address_d = $addp['address'];
                            $city = $addp['city'];
                            $state = $addp['state'];
                            $landmark = $addp['landmark'];
                            $alt_mobile = $addp['alt_mobile'];
                          } 
                          ?>

                        <tr>
                          <th scope="row"><?php echo $s_no++;?></th>
                          <td style="width:50%"><b>Name : </b><?php echo $name;?><br>
                            <b>Mobile : </b><?php echo $mobile;?>,<br><b>Email : </b><?php echo $reg_email;?>
                          </td>
                          <td><a href="view_orders.php?u_id=<?php echo $user_id;?>" class="btn btn-warning">View Orders</a></td>                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include 'includes/footer.php';?>
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
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- End custom js for this page -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable( {
    aaSorting: [],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
  </script>
  </body>
</html>
