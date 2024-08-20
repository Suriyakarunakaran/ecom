<?php
include('includes/connect.php');
//$mobile_no=$_SESSION['mobile_no'];
?>
<?php
         
$c_id = $_POST['c_id'];
$sql = "DELETE  FROM cart WHERE id='$c_id'";
 if (mysqli_query($conn, $sql)) {
  echo'Deleted';
  } 
?>