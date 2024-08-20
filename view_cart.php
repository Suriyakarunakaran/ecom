<?php
session_start();
if (isset($_SESSION['id'])) {
//$session_id = $_SESSION['id'];
$userid = $_SESSION['table_id'];
}else
{
$userid = 'Null';    
}


include('includes/connect.php');
    $p_id = $_POST['pid'];
	//$ip_id = $_SERVER['REMOTE_ADDR'];
	$list_items ='';
	$s_no=1;
		$ip_idc = $_SERVER['REMOTE_ADDR'];
		$priceList = mysqli_query($conn,"SELECT SUM(price) as sub_total FROM cart WHERE ip_id='$ip_idc'");
		$price = mysqli_fetch_array($priceList);
		$sub_total=$price['sub_total'];
		$cartList = mysqli_query($conn,"SELECT * FROM cart WHERE ip_id='$ip_idc'");
			while($cart = mysqli_fetch_array($cartList))
			{
				$p_id=$cart['p_id'];
				$c_id=$cart['id'];
				$userid=$cart['userid'];
				//$sub_total=$cart['sub_total'];
				$pList = mysqli_query($conn,"SELECT * FROM products WHERE id='$p_id'");
				while($pro = mysqli_fetch_array($pList))
				{
					$p_id1=$pro['id'];
					$p_image=$pro['product_image'];
					$p_name=$pro['product_name'];
					$net_weight=$pro['net_weight'];
					$prices=$pro['price'];
					$brand=$pro['brand'];
				}

			}
echo $list_items;
									
	?>								