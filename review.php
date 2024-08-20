<?php
include('includes/connect.php');
?>

<?php
         
            // Create connection

if(isset($_POST["submit"])){            
    $review = $_POST['review'];
	$rating = $_POST['rating'];
	$userid = $_POST['userid'];
	$p_id = $_POST['p_id'];
		
            
    $sql = "INSERT INTO review (userid,review,rating,p_id) 
			VALUES('".$userid."','".$review."','".$rating."','".$p_id."')";
    $result = mysqli_query($conn, $sql);
       
    if($result) {
        echo "<script>
        alert('Product review submited');
        window.location.href='account.php';
        </script>";        
	//  header("location:my_orders.php");
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    $conn->close();
    }
?>
