<?php include 'includes/connect.php';

if(isset($_POST["add_address"])){
    $user_id = $_POST['user_id'];
    $name=$_POST["name"];
    $mobile=$_POST["mobile"];
    $pin=$_POST["pin"];
    $locality = $_POST['locality'];
    $city = $_POST['city'];
    $state  =$_POST['state'];
    $landmark = $_POST['landmark'];
    $alter = $_POST['alter'];
    $address = $_POST['address'];
     $sql = "INSERT INTO address (userid,name, mobile, pincode,locality,city,state,landmark,alt_mobile,address) VALUES('".$_POST["user_id"]."','".$_POST["name"]."','".$_POST["mobile"]."','".$_POST["pin"]."','".$_POST["locality"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["landmark"]."','".$_POST["alter"]."','".$_POST["address"]."')";
     $result = mysqli_query($conn, $sql);        
        if($result) {   
           echo "<script>
              alert('Added Successfully');
              window.location.href='index.php';
              </script>";

        } else {
           echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();
    }


if(isset($_POST["edit_address"])){            
    $name = $_POST['name'];
   $id = $_POST['id'];
   $mobile = $_POST['mobile'];
   $pincode = $_POST['pin'];
   $locality = $_POST['locality'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
    $landmark = $_POST['landmark'];
   $alt_mobile = $_POST['alter'];;
      
            
             $sql = "UPDATE address SET name='$name',mobile='$mobile',pincode='$pincode',locality='$locality',address='$address',city='$city',state='$state',landmark='$landmark',alt_mobile='$alt_mobile' WHERE id='$id'";
     $result = mysqli_query($conn, $sql);
           
            if($result) {
                     
            echo "<script>
            alert('Address Updated');
            window.location.href='account.php';
            </script>";

            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         }
      ?>