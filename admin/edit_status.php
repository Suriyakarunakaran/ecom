<?php include 'includes/connect.php' ?>
<?php include 'includes/login_check.php';

if(isset($_POST["submit"])){            
    $status=$_POST["status"];
    $dispatched_date=date('Y-m-d');
	$out_date=date('Y-m-d');;
	$delivered_date=date('Y-m-d');
	$id=$_POST["id_a"];
	$uid=$_POST["uid"];
	        $sql = "UPDATE orders SET status='$status' WHERE ord_id='$id'";
     $result = mysqli_query($conn, $sql);
           
            if($result) {
                   
		     header("location:view_orders.php?u_id=$uid");

            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         }
      ?>
