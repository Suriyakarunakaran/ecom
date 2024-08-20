<?php include 'includes/connect.php' ?>
<?php include 'includes/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php
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
    // $keyword = implode(",",$keywords);
    $sql = "INSERT INTO products (p_code,product_name,brand,cat,sub_cat,description,net_weight,quantity,price,keywords,product_image) VALUES('".$p_code."','".$_POST["product_name"]."','".$_POST["brand"]."','".$_POST["cat"]."','".$_POST["sub_cat"]."','".$_POST["description"]."','".$_POST["net_weight"]."','".$_POST["quantity"]."','".$_POST["price"]."',
          '".$keywords."','".$strtotime.$_FILES["product_image"]["name"]."')";
    $result = mysqli_query($conn, $sql);
    if($result) {
      header("location:product.php");
    } else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
<?php
  // Create connection
  if(isset($_POST["update"])){            
    $target_dir = "uploads-products/";
    $strtotime = strtotime("now");
    if(!empty($_FILES["product_image"]["name"])){
      $target_fileb = $target_dir . basename($strtotime.$_FILES["product_image"]["name"]);
    }
    $uploadOk = 1;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "<center>Sorry, your file was not uploaded.</center>";
    // if everything is ok, try to upload file
    } 
    else {
      if(!empty($_FILES["product_image"]["name"])){
        move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_fileb);
      }
      if(!empty($_FILES["product_image"]["name"])){
        $product_image = $strtotime.$_FILES["product_image"]["name"];
      } else {
        $product_image =$_POST['product_image1'];  
      }    
    }
    $id_e = $_POST['id_a'];
    $product_name = $_POST['product_name'];
    $brand = $_POST['brand'];
    $cat = $_POST['cat'];
    $sub_cat = $_POST['sub_cat'];
    $description = $_POST['description'];
    $net_weight = $_POST['net_weight'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $keyword = $_POST['keywords'];
    //$keyword = implode(",",$keywords);
    //$bussines_name =$bussines_name1;
    //$firm_address =$firm_address1;
    $sql = "UPDATE products SET product_name ='$product_name',brand='$brand',cat='$cat',sub_cat='$sub_cat',description='$description',net_weight='$net_weight',quantity='$quantity',price='$price',keywords='$keyword',product_image='$product_image' WHERE id='$id_e'";
    $result = mysqli_query($conn, $sql);
    if($result) {           
      echo'<script>
      alert("Product Updated successfuly!");
      document.location = "product.php";
      </script>';
    }
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
<?php
  $edit_product_image= '';
  $edit_product_name= '';
  $edit_brand= '';
  $edit_cat= '';
  $edit_sub_cat= '';
  $edit_net_weight= '';
  $edit_quantity= '';
  $edit_price= '';
  $edit_created_at= '';
  $edit_p_code= '';
  $edit_description= '';
  $edit_keywords= '';
  $edit = false; 
  if (isset($_GET['edit'])) {
    $edit = true;
    $edit_id = $_GET['edit'];
    $edit_UserList = mysqli_query($conn,"SELECT * FROM products WHERE id='$edit_id'");
    $edit_user = mysqli_fetch_array($edit_UserList);
    $edit_product_image= $edit_user['product_image'];
    $edit_product_name= $edit_user['product_name'];
    $edit_brand= $edit_user['brand'];
    $edit_cat= $edit_user['cat'];
    $edit_sub_cat= $edit_user['sub_cat'];
    $edit_net_weight= $edit_user['net_weight'];
    $edit_quantity= $edit_user['quantity'];
    $edit_price= $edit_user['price'];
    $edit_created_at= $edit_user['created_at'];
    $edit_p_code= $edit_user['p_code'];
    $edit_description= $edit_user['description'];
    $edit_keywords= $edit_user['keywords'];
  }
?>
<?php
  if(isset($_GET["delete"])){
    $delete_id = $_GET['delete'];
    $sql = "DELETE  FROM products WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      echo'<script>
      alert("Deleted successfuly!");
      document.location = "product.php";
      </script>';
    } 
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products</title>
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
              <h3 class="page-title">Product</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="product.php">
                      <input type="hidden" name="id_a" value="<?php echo $edit_id;?>"/>
                      <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="product_name" value="<?php echo $edit_product_name ?>" placeholder="Product Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Select Brand</label>
                        <select class="form-select form-select" name="brand" id="exampleSelectGender">
                        <?php if ($edit == true): ?> 
                          <option value="<?php echo $edit_brand ?>"><?php echo $edit_brand ?></option>
                           <?php
                            $BrandList = mysqli_query($conn,"SELECT * FROM brand");
                            while($brand = mysqli_fetch_array($BrandList))
                            {?>
                              <option value="<?php echo $brand['brand_name'];?>"><?php echo $brand['brand_name'];?></option>                                      
                          <?php } ?>
                        <?php else: ?>
                          <option value="">--Select Brand--</option>
                        <?php
                            $BrandList = mysqli_query($conn,"SELECT * FROM brand");
                              while($brand = mysqli_fetch_array($BrandList))
                              {?>
                              <option value="<?php echo $brand['brand_name'];?>"><?php echo $brand['brand_name'];?></option>                                      
                        <?php } ?>
                        <?php endif ?>
                              
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Select Category</label>
                        <select class="form-select form-select" name="cat" id="exampleSelectGender">
                        <?php if ($edit == true): ?> 
                          <option value="<?php echo $edit_cat ?>"><?php echo $edit_cat ?></option>
                          <?php
                            $CatList = mysqli_query($conn,"SELECT * FROM cat WHERE cat_name!='$cat_name'");
                              while($cat = mysqli_fetch_array($CatList))
                              {?>
                                <option value="<?php echo $cat['cat_name'];?>"><?php echo $cat['cat_name'];?></option>                
                          <?php } ?>    
                        <?php else: ?>
                          <option value="">--Select Category--</option>
                          <?php
                            $CatList = mysqli_query($conn,"SELECT * FROM cat WHERE cat_name!='$cat_name'");
                            while($cat = mysqli_fetch_array($CatList))
                            {?>
                              <option value="<?php echo $cat['cat_name'];?>"><?php echo $cat['cat_name'];?></option>
                              <?php } ?>    
                        <?php endif ?>                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Select Sub Category</label>
                        <select class="form-select form-select" name="sub_cat" id="exampleSelectGender">
                        <?php if ($edit == true): ?> 
                          <option value="<?php echo $edit_sub_cat ?>"><?php echo $edit_sub_cat ?></option>
                        <?php else: ?>
                          <option value="">--Select Sub Category--</option>
                        <?php endif ?>
                          <?php
                            $CatList = mysqli_query($conn,"SELECT * FROM sub_cat");
                              while($cat = mysqli_fetch_array($CatList))
                              {?>
                                <option value="<?php echo $cat['sub_cat'];?>"><?php echo $cat['sub_cat'];?></option>
                                            
                              <?php } ?>    
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Product Description</label>
                        <textarea class="form-control" placeholder="Product Description" name="description" id="exampleTextarea1" rows="4"><?php echo $edit_description;?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Net Weight</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="net_weight" value="<?php echo $edit_net_weight ?>" placeholder="Net Weight">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="price" value="<?php echo $edit_price ?>" placeholder="Price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Quantity</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="quantity" value="<?php echo $edit_quantity ?>" placeholder="Quantity">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Product Keywords</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="keywords" value="<?php echo $edit_keywords ?>" placeholder="Keywords">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Product Image</label>
                        <input type="hidden" name="product_image1" value="<?php echo $edit_product_image;?>"/>
                        <input type="file" class="form-control" id="exampleInputName1" name="product_image" placeholder="Product Image">
                      </div>
                      <?php if ($edit == true): ?> 
                        <img src="uploads-products/<?php echo $edit_product_image ?>" style="height: 200px;"><br><br>              
                        <button type="submit" name="update" class="btn btn-warning me-2">Update</button>
                      <?php else: ?>
                        <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                      <?php endif ?>                      
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x: scroll;">
                    <h4 class="card-title">Product</h4>
                    <p class="card-description"> Product Details</p>
                    <table class="table table-hover" id="example">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Product Name</th>
                          <th>Brand</th>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Net Weight</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $s_no='1';
                          $UserList = mysqli_query($conn,"SELECT * FROM products");
                          while($user = mysqli_fetch_array($UserList))
                          {
                            $product_image= $user['product_image'];
                            $product_name= $user['product_name'];
                            $brand= $user['brand'];
                            $cat= $user['cat'];
                            $sub_cat= $user['sub_cat'];
                            $net_weight= $user['net_weight'];
                            $quantity= $user['quantity'];
                            $price= $user['price'];
                            $created_at= $user['created_at'];
                            $p_code= $user['p_code'];
                            $description= $user['description'];
                            $keywords= $user['keywords'];
                            $id= $user['id'];
                          ?>
                        <tr>
                          <th scope="row"><?php echo $s_no++;?></th>
                          <td><img src="uploads-products/<?php echo $product_image;?>"/ height="80px" width="80px"></td>
                          <td><?php echo $product_name;?></td>
                          <td><?php echo $brand;?></td>
                          <td><?php echo $cat;?></td>
                          <td><?php echo $sub_cat;?></td>
                          <td><?php echo $net_weight;?></td>
                          <?php if($quantity<=0) {?>
                          <td><span class="badge badge-danger">Out of Stock</span></td>
                          <?php } else {?>
                          <td><?php echo $quantity;?></td>
                          
                          <?php } ?>
                          <td>Rs.<?php echo $price;?></td>
                          <td><?php echo $created_at;?></td>
                          <td><a href="product.php?edit=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-lead-pencil"></i></a>|<a href="product.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"><i></a></td>
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
