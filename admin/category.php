<?php include 'includes/connect.php' ?>
<?php include 'includes/login_check.php' ?>
<!DOCTYPE html>
<html lang="en">
<?php
  // Create connection
  if(isset($_POST["submit"])){            
  $target_dir = "uploads-cats1/";
  $strtotime = strtotime("now");

  if(!empty($_FILES["cat_image"]["name"])){
    $target_file = $target_dir . basename($strtotime.$_FILES["cat_image"]["name"]);
  }
  $uploadOk = 1;
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<center>Sorry, your file was not uploaded.</center>";
  // if everything is ok, try to upload file
  } else {
    if(!empty($_FILES["cat_image"]["name"])){
      move_uploaded_file($_FILES["cat_image"]["tmp_name"], $target_file);
    }
  }
  $sql = "INSERT INTO cat (cat_name,cat_image) VALUES('".$_POST["cat_name"]."','".$strtotime.$_FILES["cat_image"]["name"]."')";
    $result = mysqli_query($conn, $sql);
    if($result) {
      header("location:category.php");
    } else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
  }
?>
<?php
  // Create connection
  if(isset($_POST["update"])){            
    $target_dir = "uploads-cats1/";
    $strtotime = strtotime("now");

    if(!empty($_FILES["cat_image"]["name"])){
        $target_fileb = $target_dir . basename($strtotime.$_FILES["cat_image"]["name"]);
    }
    $uploadOk = 1;
    if ($uploadOk == 0) {
        echo "<center>Sorry, your file was not uploaded.</center>";
    } 
    else {
      if(!empty($_FILES["cat_image"]["name"])){
        move_uploaded_file($_FILES["cat_image"]["tmp_name"], $target_fileb);
      }
      if(!empty($_FILES["cat_image"]["name"])){
        $cat_image = $strtotime.$_FILES["cat_image"]["name"];
        }else{
        $cat_image =$_POST['cat_image1'];  
      }
    }
    $id = $_POST['id_a'];
    $cat_name = $_POST['cat_name'];
    $sql = "UPDATE cat SET cat_name ='$cat_name',cat_image='$cat_image' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if($result) {        
      echo'<script>
      alert("Updated successfuly!");
      document.location = "category.php";
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
  $edit_cat_image = "";
  $edit = false; 
  if (isset($_GET['edit'])) {
    $edit = true;
    $edit_id = $_GET['edit'];
    $edit_UserList = mysqli_query($conn,"SELECT * FROM cat where id='$edit_id'");
    $edit_user = mysqli_fetch_array($edit_UserList);
    $edit_cat_name= $edit_user['cat_name'];
    $edit_cat_image= $edit_user['cat_image'];
    $edit_id= $edit_user['id'];
  }
?>
<?php
  if(isset($_GET["delete"])){
    $delete_id = $_GET['delete'];
    $sql = "DELETE  FROM cat WHERE id='$delete_id'";
    if (mysqli_query($conn, $sql)) {
      header('Location:category.php');
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
    <title>Category</title>
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
                    <h4 class="card-title">Add Category</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data" action="category.php">
                      <input type="hidden" name="id_a" value="<?php echo $edit_id;?>"/>
                      <div class="form-group">
                        <label for="exampleInputName1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="cat_name" value="<?php echo $edit_cat_name ?>" placeholder="Category Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Category Image</label>
                        <input type="hidden" name="cat_image1" value="<?php echo $edit_cat_image;?>"/>
                        <input type="file" class="form-control" id="exampleInputName1" name="cat_image" placeholder="Category Image">
                      </div>
                      <?php if ($edit == true): ?> 
                        <img src="uploads-cats1/<?php echo $edit_cat_image ?>" style="height: 200px;"><br><br>              
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
                  <div class="card-body">
                    <h4 class="card-title">Category</h4>
                    <p class="card-description"> Add Category</p>
                    <table class="table table-hover" id="example">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Main Category Name</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $s_no='1';
                          $UserList = mysqli_query($conn,"SELECT * FROM cat");
                          while($user = mysqli_fetch_array($UserList))
                          {
                            $cat_name= $user['cat_name'];
                            $cat_image= $user['cat_image'];                           
                            $created_at= $user['created_at'];
                            $id= $user['id'];
                        ?>
                        <tr>
                          <th scope="row"><?php echo $s_no++;?></th>
                          <th><img src="uploads-cats1/<?php echo $cat_image;?>" style="height:60px;width:60px"/></th>
                          <td><?php echo $cat_name;?></td>
                          <td><?php echo $created_at;?></td>
                          <td><a href="category.php?edit=<?php echo $id ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-lead-pencil"></i></a>|<a href="category.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"><i></a></td>
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
