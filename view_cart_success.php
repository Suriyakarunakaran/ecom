<?php
session_start();
if (isset($_SESSION['id'])) {
//$session_id = $_SESSION['id'];
$userid = $_SESSION['table_id'];
}else
{
$userid = 'Null';    
}


include('Login/includes/connect.php');
    $p_id = $_POST['p_id'];
	//$ip_id = $_SERVER['REMOTE_ADDR'];
	$list_items ='';
$s_no=1;
			$pList = mysqli_query($conn,"SELECT * FROM products WHERE id='$p_id'");
			while($pro = mysqli_fetch_array($pList))
			{
				$p_id1=$pro['id'];
				$p_image=$pro['product_image'];
				$front_image=$pro['front_image'];
				$p_name=$pro['product_name'];
				$net_weight=$pro['net_weight'];
				$prices=$pro['price'];
				$brand=$pro['brand'];
			
			
	$list_items .= '
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-product-img">';
											  
					$s_no1='1';
					$UserListN1 = mysqli_query($conn,"SELECT * FROM product_images WHERE p_id='$p_id1' LIMIT 1 ");
			while($userN1 = mysqli_fetch_array($UserListN1))
			{
                                                $list_items .= '<a href="single.php?id='.$p_id1.'"><img src="Login/Admin/uploads-products/'.$userN1['product_image'].'" alt=""></a>';
			 }
                                           $list_items .= ' </div>
                                            <div class="modal-product-info">
                                                <h5><a href="single.php?id='.$p_id1.'">'.$p_name.'s</a></h5>
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Cart</p>
                                                <div class="btn-wrapper">
                                                    <a href="cart.php" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                   
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none---">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br> Use (Happy Morning) discount code at checkout</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
       ';
			}
echo $list_items;
									
	?>								