<?php
session_start();
session_destroy();
//header('Location: index.php');
 echo "<script>
alert('Logout Successfully');
window.location.href='login.php';
</script>";
?>