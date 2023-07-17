<?php
session_start();
require_once "dbh.inc.php";
require_once "functions.inc.php";

if(isset($_POST['delete_user'])){
    $id = $_SESSION['userid'];
    $result = deleteUser($conn, $id);

    if($result !== false){
        require_once "logout.inc.php";
        header("location: ../index.php");
        exit();
    } else {
        header("location: ../profile.php?error=couldnotdeleteuser");
        exit();
    }
} else {
    header("location: ../profile.php");
    exit();
}