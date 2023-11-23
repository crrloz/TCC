<?php
require_once 'dbh.inc.php';
session_start();

if(isset($_POST['submit_img'])){
    if ($_FILES["imageFile"]["error"] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES["imageFile"]["tmp_name"]);
        $userId = $_SESSION['userid'];
    
        $sql = "UPDATE users SET usersPic = ? WHERE usersId = ?";
        $stmt = mysqli_stmt_init($conn);
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../profile.php?error=stmtfailed");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "si", $imageData, $userId);
            mysqli_stmt_execute($stmt);
        }
    
        $_SESSION['imagesrc'] = "data:image/jpeg;base64," . base64_encode($imageData);
        header("location: ../profile.php?error=none");
        exit();
    } else {
        header("location: ../profile.php?error=imageerror");
        exit();
    }
} else {
    header("location: ../profile.php");
    exit();
}