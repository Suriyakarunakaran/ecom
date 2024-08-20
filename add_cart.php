<?php
session_start();
if (isset($_SESSION['mobile'])) {
$userid = $_SESSION['mobile'];
}   else
{
    $userid = 'Null';    
}

 
include('includes/connect.php');
    $p_id = $_POST['p_id'];
	$ip_id = $_SERVER['REMOTE_ADDR'];
	


	$sql1 = "SELECT * from products WHERE id='$p_id' ";
    $resultu1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($resultu1);
    $price = $row1['price'];
    $quantity = 1;

   // $price = $quantity * $price;	
	
       
	
		 $sql = "INSERT INTO cart (p_id,ip_id,quantity,price,userid) 
			VALUES('".$p_id."','".$ip_id."','".$quantity."','".$price."','".$userid."')";
     $result = mysqli_query($conn, $sql);
           
            if($result) {
            echo'Added';
                
            }
		
      ?>