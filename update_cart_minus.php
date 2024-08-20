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
    $ip_id = $_SERVER['REMOTE_ADDR'];
    $sql = "SELECT * FROM cart WHERE p_id='$c_id' AND ip_id='$ip_id'";
    $resultu = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultu);
    $quantity = $row['quantity'];

    
    $sql1 = "SELECT * FROM products WHERE id='$c_id' ";
    $resultu1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($resultu1);
    $price = $row1['price'];
    $quantity1 = $quantity - 1;
    $price = $quantity1 * $price;
    
      $sql2 = "UPDATE cart SET quantity ='$quantity1',price='$price' WHERE p_id='$c_id' AND ip_id='$ip_id'";
         $resultu2 = mysqli_query($conn, $sql2);
        
            if($resultu2) {
       echo $quantity1;
            }
//rowcount						
	 
	   

      ?>
