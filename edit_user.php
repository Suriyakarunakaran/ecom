<?php
include('includes/login_check.php');
include('includes/connect.php');

if(isset($_POST["edit_user"])){            
    $name=$_POST["name"];
    $mobile_reg=$_POST["mobile"];
	$email=$_POST["email"];
	$password=$_POST["password"];
    $sql = "UPDATE register_user SET name='$name',mobile='$mobile_reg',email='$email',password='$password' WHERE mobile='$mobile'";
     $result = mysqli_query($conn, $sql);
           
            if($result) {
            
		    echo "<script>
            alert('Your account details Updated');
            window.location.href='account.php';
            </script>";

            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         }
      ?>