<?php

//include('Login/includes/check_login.php');
include('includes/connect.php');
 //$mobile_s=$_SESSION['mobile'];
 //$name_s=$_SESSION['name'];
 //$role_s=$_SESSION['role'];
 //$id_s=$_SESSION['table_id'];
?>
<?php
    $c_id = $_POST['c_id'];
	$quan = $_POST['quan'];
	$pri = $_POST['pri'];

//rowcount						
	   $sql = "UPDATE cart SET quantity ='$quan',price='$pri' WHERE id='$c_id'";
         $resultu = mysqli_query($conn, $sql);
        
            if($resultu) {
       echo'Updated';
	   }

      ?>
