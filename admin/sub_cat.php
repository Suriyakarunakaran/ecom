<?php include 'includes/connect.php' ?>
<?php include 'includes/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php
  // Create connection
  if(isset($_POST["submit"])){            
    $target_dir = "uploads-cats/";
    $strtotime = strtotime("now");

    if(!empty($_FILES["sub_cat_image"]["name"])){
      $target_file = $target_dir . basename($strtotime.$_FILES["sub_cat_image"]["name"]);
      }
    $uploadOk = 1;
    if ($uploadOk == 0) {
      echo "<center>Sorry, your file was not uploaded.</center>";
    } else {
      if(!empty($_FILES["sub_cat_image"]["name"])){
        move_uploaded_file($_FILES["sub_cat_image"]["tmp_name"], $target_file);
      }     
    }
    $sql = "INSERT INTO sub_cat (cat_id,sub_cat,sub_cat_image) VALUES('".$_POST["cat_name"]."','".$_POST["sub_cat"]."','".$strtotime.$_FILES["sub_cat_image"]["name"]."')";
    $result = mysqli_query($conn, $sql);
    if($result) {
      header("location:sub_cat.php");
    } else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
<?php
  // Create connection
  if(isset($_POST["update"])){            
    $target_dir = "uploads-cats/";
    $strtotime = strtotime("now");
    if(!empty($_FILES["sub_cat_image"]["name"])){
        $target_fileb = $target_dir . basename($strtotime.$_FILES["sub_cat_image"]["name"]);
    }
    $uploadOk = 1;
    if ($uploadOk == 0) {
      echo "<center>Sorry, your file was not uploaded.</center>";
    } 
    else {
      if(!empty($_FILES["sub_cat_image"]["name"])){
        move_uploaded_file($_FILES["sub_cat_image"]["tmp_name"], $target_fileb);
      }
      if(!empty($_FILES["sub_cat_image"]["name"])){
      $sub_cat_image = $strtotime.$_FILES["sub_cat_image"]["name"];
      }else{
      $sub_cat_image =$_POST['sub_cat_image1'];  
      }
    }
    $id = $_POST['id_a'];
    $cat_name = $_POST['cat_name'];
    $sub_cat = $_POST['sub_cat'];
    $sql = "UPDATE sub_cat SET cat_id ='$cat_name',sub_cat='$sub_cat',sub_cat_image='$sub_cat_image' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);  
    if($result) {
      echo'<script>
      alert("Updated successfuly!");
      document.location = "sub_cat.php";
      </script>';
    } 
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
<?php
  $edit_cat_name = "";
  $edit_sub_cat_image = "";
  $edit_sub_cat="";
  $edit = false; 
  if (isset($_GET['edit'])) {
    $edit = true;
    $edit_id = $_GET['edit'];
    $UserList = mysqli_query($conn,"SELECT * FROM sub_cat WHERE id='$edit_id'");
    $user = mysqli_fetch_array($UserList);
      $edit_cat_name= $user['cat_id'];
      $edit_sub_cat= $user['sub_cat'];
      $edit_sub_image= $user['sub_cat_image'];
      $edit_id= $user['id'];
  }
?>
<?php
  if(isset($_GET["delete"])){
    $delete_id = $_GET['delete'];
    $sql = "DELETE  FROM sub_cat WHERE id='$delete_id'";
    if (mysqli_query($conn, $sql)) {
      echo'<script>
      alert("Deleted successfuly!");
      document.location = "sub_cat.php";
      </script>';
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
    <title>Sub Category</title>
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
              <h3 class="page-title">Category</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="sub_cat.php">
                      <input type="hidden" name="id_a" value="<?php echo $edit_id;?>"/>
                      <div class="form-group">
                        <label for="exampleSelectGender">Select Category</label>
                        <select class="form-select form-select" name="cat_name" id="exampleSelectGender">
                        <?php if ($edit == true): ?> 
                          <option value="<?php echo $edit_cat_name ?>"><?php echo $edit_cat_name ?></option>
                        <?php else: ?>
                        <option value="">--Select Category--</option>
                        <?php endif ?>
                          <?php
                            $CatList = mysqli_query($conn,"SELECT * FROM cat WHERE cat_name!='$cat_name'");
                              while($cat = mysqli_fetch_array($CatList))
                              {?>
                                <option value="<?php echo $cat['cat_name'];?>"><?php echo $cat['cat_name'];?></option>
                                            
                              <?php } ?>    
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Sub Category Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="sub_cat" value="<?php echo $edit_sub_cat ?>" placeholder="Sub Category Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Category Image</label>
                        <input type="hidden" name="sub_cat_image1" value="<?php echo $edit_sub_image;?>"/>
                        <input type="file" class="form-control" id="exampleInputName1" name="sub_cat_image" placeholder="Category Image">
                      </div>
                      <?php if ($edit == true): ?> 
                        <img src="uploads-cats/<?php echo $edit_sub_image ?>" style="height: 200px;"><br><br>              
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
                  <div class="card-body" style="overflow: auto;">
                    <h4 class="card-title">Sub Category</h4>
                    <p class="card-description"> Sub Category Details</p>
                    <table class="table table-hover" id="example">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Main Category Name</th>
                          <th>Sub Category Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $s_no='1';
                          $UserList = mysqli_query($conn,"SELECT * FROM sub_cat");
                          while($user = mysqli_fetch_array($UserList))
                          {
                            $cat_name= $user['cat_id'];
                            $sub_cat= $user['sub_cat'];
                            $sub_cat_image= $user['sub_cat_image'];
                            $id= $user['id'];
                        ?>
                        <tr>
                          <th scope="row"><?php echo $s_no++;?></th>
                          <td><img src="uploads-cats/<?php echo $sub_cat_image;?>" style="height:60px;width:60px"/></td>
                          <td><?php echo $cat_name;?></td>
                          <td><?php echo $sub_cat;?></td>
                          <td><a href="sub_cat.php?edit=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-lead-pencil"></i></a>|<a href="sub_cat.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"><i></a></td>
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
