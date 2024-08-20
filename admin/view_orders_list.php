<?php include 'includes/connect.php';?>
<?php include 'includes/login_check.php';?>
<?php
 $id_o=$_REQUEST['ord_id'];
         
// Create connection

if(isset($_POST["submit"])){            
$target_dir = "uploads-products/";
$strtotime = strtotime("now");

if(!empty($_FILES["product_image"]["name"])){
    $target_file = $target_dir . basename($strtotime.$_FILES["product_image"]["name"]);
    }

$uploadOk = 1;



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<center>Sorry, your file was not uploaded.</center>";
// if everything is ok, try to upload file
} else {
   if(!empty($_FILES["product_image"]["name"])){
         move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
        }
         

    }
    $p_code = rand(10000,99999);
$keywords = $_POST['keywords'];
  $keyword = implode(",",$keywords);
    
            
             $sql = "INSERT INTO products (p_code,product_name,brand,cat,sub_cat,description,net_weight,quantity,price,keywords,product_image) 
      VALUES('".$p_code."','".$_POST["product_name"]."','".$_POST["brand"]."','".$_POST["cat"]."','".$_POST["sub_cat"]."','".$_POST["description"]."','".$_POST["net_weight"]."','".$_POST["quantity"]."','".$_POST["price"]."',
      '".$keywords."','".$strtotime.$_FILES["product_image"]["name"]."')";
     $result = mysqli_query($conn, $sql);
           
            if($result) {
                     
         header("location:products.php");

            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
          
         }
      ?>
      <?php
      if(isset($_GET["delete_order"])){  
        $id=$_GET['delete_order'];
              $sql = "DELETE  FROM orders WHERE id='$id'";
 
 
            if (mysqli_query($conn, $sql)) {
    
           echo "<script>
        alert('Deleted Successfully');
        window.location.href='orders.php';
        </script>";

            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
          }
      ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Orders</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" media="all">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <table class="table">
              <thead>
                
        <tr>
        <th>#</th>
        <th>Order Id</th>
    <th>Product</th>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Price</th>
        <th>Status</th>
    <th>Date</th>
    <th>Action</th>
    </tr>
        
              </thead>
              <tbody>
          <?php
      $s_no=1;
      $tList = mysqli_query($conn,"SELECT SUM(price) as total FROM orders WHERE ord_id='$id_o'");
      while($t = mysqli_fetch_array($tList))
      {
       $total = $t['total'];  
      }
      $cartList = mysqli_query($conn,"SELECT * FROM orders WHERE ord_id='$id_o'");
      while($cart = mysqli_fetch_array($cartList))
      {
          $id = $cart['id'];
          $user_id = $cart['user_id'];
          $product_id = $cart['product_id'];
          $order_id = $cart['ord_id'];
          $quantity = $cart['quantity'];
          $price = $cart['price'];
          $trx_id = $cart['trx_id'];
          $p_status = $cart['p_status'];
          $created_at = $cart['created_at'];
        $pList = mysqli_query($conn,"SELECT * FROM products WHERE id='$product_id'");
      while($p = mysqli_fetch_array($pList))
      {
        //$p_image = $p['product_image'];
        $p_name = $p['product_name'];
        $p_image = $p['product_image'];
        $idp = $p['id'];
      }
      ?>
    
  
      <tr>
        <td><?php echo $s_no ++;?></td>
        <td><?php echo $order_id;?></td>
    <td><img src="uploads-products/<?php echo $p_image;?>" height="100px" width="100px"/></td>
    <td><?php echo $p_name;?></td>
    <td><?php echo $quantity;?></td>
    <td>Rs.<?php echo $price;?></td>
        <td><?php echo $p_status;?></td>
        <td><?php echo $created_at;?></td>
    <td><a href="view_orders_list.php?delete_order=<?php echo $id?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModald<?php echo $cart['id']?>"><i class="mdi mdi-popcorn"><i></a></td>
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
