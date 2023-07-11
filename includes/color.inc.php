<?php session_start();

if(isset($_POST['color'])){
    $_SESSION['usercolor'] = $_POST['color'];
} 

header("location: ../profile.php");
exit();