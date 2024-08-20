<?php 
    session_start();
    if (!isset($_SESSION['mobile'])) {
    $_SESSION['msg'] = "You Must Login First";
    echo "<script>
        alert('You Must Login First');
        window.location.href='index.php';
        </script>";
    }
     $user_mobile = $_SESSION['mobile'];
?>