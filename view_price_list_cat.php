
<?php

include('includes/connect.php');
    $price_from= $_POST['price_from'];
	$price_to = $_POST['price_to'];
	//$ip_id = $_SERVER['REMOTE_ADDR'];
	$list_items ='';
	$wheres = '';
	$wheref = '';
						
	
	if (isset($_POST['price_from'])) {
			$price_from= $_POST['price_from'];
			$price_to = $_POST['price_to'];
			$cat = $_POST['cat'];
	
			$wheref .= "AND price BETWEEN $price_from AND $price_to GROUP BY product_name ORDER BY price";
	}
						

	$ProductList = mysqli_query($conn,"SELECT COUNT(id) as count FROM products WHERE cat='$cat'$wheref");
	while($product = mysqli_fetch_array($ProductList))
	{
		$count = $product['count'];
	}
					
				                         
							$s_no='1';
							//echo "SELECT * FROM products $wheref";
			$UserListN = mysqli_query($conn,"SELECT * FROM products WHERE cat='$cat' $wheref");
			while($userN = mysqli_fetch_array($UserListN))
			{
				$p_idN = $userN['id'];
				$product_name = $userN['product_name'];
				$cat = $userN['cat'];
				$price =$userN['price'];
				$product_image = $userN['product_image'];

			
                                     
			$list_items .= ' 	
								<div class="col-12 col-sm-6 col-lg-3 featureCol mb-7 product'.$p_idN.'" id="product'.$p_idN.'">
									<div class="border" style="height: 250px">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<a href="shop-detail.php?p_id='.$p_idN.'">
												<img src="admin/uploads-products/'.$product_image.'" alt="image description" class="img-fluid w-100"  style="height: 100px;object-fit: contain;">
											</a>
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<!-- <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li> -->';
											
												if(isset($_SESSION['mobile'])){
												$wishlist = mysqli_query($conn,"SELECT * FROM wishlist where user_id = '$user_mobile' AND p_id ='$p_id'");
												$wish_row  = mysqli_num_rows($wishlist);
													if($wish_row > 0) {
														$List_wish = mysqli_fetch_array($wishlist);
														$status = $List_wish['status'];
														if($status == 0) { 
														$list_items .= '<li class="mr-2 overflow-hidden"><a href="wish_list.php?like=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>';
														 } else { 
														$list_items .= '<li class="mr-2 overflow-hidden"><a href="wish_list.php?unlike=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>';
														}
													} else {
														$list_items .= '<li class="mr-2 overflow-hidden"><a href="wish_list.php?like=<?php echo $p_id ?>" class="icon-heart d-block"></a></li>';
													} 
												} 
												$list_items .= '<li class="mr-2 overflow-hidden"><a href="shop-detail.php?p_id=<?php echo $p_id ?>" class="icon-eye d-block"></a></li>
												<!-- <li class="mr-2 overflow-hidden"><a href="shop-detail.php?p_id=<?php echo $p_id ?>" class="icon-eye d-block"></a></li> -->
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.php?p_id='.$p_idN.'">'. $product_name.'</a></span>
											<span class="price d-block fwEbold">Rs.'.$price.'</span>
											<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">Hot</span>
										</div>
									</div>
								</div>';
			 }
			
	
			
echo $list_items;
									
	?>								