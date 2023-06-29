<?php

if(isset($_POST["submit"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    if(isset($_POST["admin"])){
        $admin = true;
    } else {
        $admin = false;
    }

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($_POST['uid'], $_POST['pwd']) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    } else if($admin !== false){
        loginAdmin($conn, $username, $pwd);
    } else {
        loginUser($conn, $username, $pwd);
    }
    
} else {
    header("location: ../login.php");
    exit();
}