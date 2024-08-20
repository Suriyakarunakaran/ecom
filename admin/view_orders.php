<?php include 'includes/connect.php';?>
<?php include 'includes/login_check.php';
 $id_o=$_REQUEST['u_id'];
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
                  <div class="card-body"  style="overflow-x: scroll;">
                    <table class="table table-hover" id="example" >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Order Id</th>
                          <th>Tracking Status</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>View Order</th>
                          <th>Invoice</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $s_no=1;
                          $cartList = mysqli_query($conn,"SELECT * FROM orders WHERE user_id='$id_o' GROUP BY ord_id");
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
                            $status = $cart['status'];
                            $created_at = $cart['created_at']; 
                          ?>
                        <tr>
                          <td><?php echo $s_no ++;?></td>
                          <td><?php echo $order_id;?></td>
                          <td><button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $id?>">Tracking Status</td>
                          <td><?php echo $p_status;?></td>
                          <td><?php echo $created_at;?></td>
                          <td><a href="view_orders_list.php?ord_id=<?php echo $order_id?>" class="btn btn-success" >View</a></td>
                          <?php if($status == 'Delivered') { ?>
                          <td><a href="invoice.php?ord_id=<?php echo $order_id?>" class="btn btn-info" >Invoice</a></td>
                          <?php } else { ?>
                          <td><button class="btn btn-info" disabled >Invoice</button></td>
                          <?php } ?> 
                        </tr>
                          <div class="modal fade" id="myModal<?php echo $id?>" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Tracking Status</h4>
                                  <a href="view_orders.php?u_id=<?php echo $id_o?>" type="button" class="close" data-dismiss="modal">&times;</a>          
                                </div>
                                <div class="modal-body">
                                  <form class="form" method="post" action="edit_status.php">    
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                          <div class="form-group">
                                            <label for="email2">Tracking Status</label>
                                            <select class="form-control" name="status" required>
                                              <?php if($status == '') { ?>
                                              <option value="">Select Status</option>
                                              <option value="Order Pending">Order Pending</option>
                                              <option value="Order Approved">Order Approved</option>
                                              <option value="Order Shipped">Order Shipped</option>
                                              <option value="Dispatched">Dispatched</option>
                                              <option value="Out for delivery">Out for delivery</option>
                                              <option value="Delivered">Delivered</option>
                                              <?php } else { ?>
                                              <option value="<?php echo $status ?>"><?php echo $status ?></option>
                                              <option value="Order Pending">Order Pending</option>
                                              <option value="Order Approved">Order Approved</option>
                                              <option value="Order Shipped">Order Shipped</option>
                                              <option value="Dispatched">Dispatched</option>
                                              <option value="Out for delivery">Out for delivery</option>
                                              <option value="Delivered">Delivered</option>
                                              <?php } ?>
                                            </select>
                                          </div>                                    
                                          <input type="hidden" name="id_a" value="<?php echo $order_id?>"/>
                                          <input type="hidden" name="uid" value="<?php echo $id_o?>"/>                      
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-action">
                                      <button class="btn btn-success" name="submit" type="submit">Update Status</button>
                                      <a href="view_orders.php?u_id=<?php echo $id_o?>"class="btn btn-info" data-mdb-dismiss="modal">Close</a>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div> 
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
  <script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}</script>

  </body>
</html>
