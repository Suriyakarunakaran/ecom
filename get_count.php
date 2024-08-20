<?php
include('includes/connect.php');
   	$ip_idc1 = $_SERVER['REMOTE_ADDR'];
		$cartList1 = mysqli_query($conn,"SELECT SUM(quantity) as badge_count FROM cart WHERE ip_id='$ip_idc1'");
			while($cart1 = mysqli_fetch_array($cartList1))
			{
				$badge=$cart1['badge_count'];
			}
	 echo $badge;
		
      ?>
