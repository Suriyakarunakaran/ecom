<?php include 'connect.php';

if(isset($_POST["register"])){

    $email = $_POST["email"];
    $name=$_POST["name"];
    $mobile=$_POST["mobile"];
    $password=$_POST["password"];
     $sql = "INSERT INTO register_user (name, mobile, password,email) VALUES('".$_POST["name"]."','".$_POST["mobile"]."','".$_POST["password"]."','".$_POST["email"]."')";
     $result = mysqli_query($conn, $sql);        
        if($result) {   
           echo "<script>
              alert('Added Successfully');
              window.location.href='../index.php';
              </script>";

        } else {
           echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        $conn->close();
    }
?>
        <!-- The Modal -->
        <div class="modal fade" id="myModalregister">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Register</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body --> 
                    <div class="modal-body">
                        <form class="contactForm" action="includes/register.php" method="post">
                        <div class="d-flex flex-wrap row1 mb-md-1">
                            <div class="form-group col-12 mb-5">
                                <label>Your Name</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Enter Your Name *">
                            </div>
                            <div class="form-group col-12 mb-5">
                                <label>Mobile Number</label>
                                <input type="tel" id="mobile" class="form-control" name="mobile" placeholder="XXXXXXXXXX *">
                            </div>
                            <div class="form-group col-12 mb-5">
                                <label>Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email address *">
                            </div>
                            <div class="form-group col-12 mb-5">
                                <label>Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <input type="submit" name="register" class="btn btn-success float-left" value="Register">
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>