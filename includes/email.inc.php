<?php

require_once "dbh.inc.php";
require_once "functions.inc.php";

if(isset($_POST['email_selected']) || isset($_POST['email_all'])){
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require '../vendor/PHPMailer/src/Exception.php';
    require '../vendor/PHPMailer/src/PHPMailer.php';
    require '../vendor/PHPMailer/src/SMTP.php';

    if(isset($_POST['email_selected'])){
        $emails = $_POST['email_selected'];

        foreach($emails as $email){
            sendEmail($message, $subject, $email);
        }

        header("location: ../profile.php?sentto=selected");
        exit();
    } else if(isset($_POST['email_all'])){
        $sql = "SELECT usersEmail FROM users";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $emails = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $emails[] = $row['usersEmail'];
        }
        
        foreach($emails as $email){
            sendEmail($message, $subject, $email);
        }

        header("location: ../profile.php?sentto=all");
        exit();
    }
} else if(isset($_POST['delete_users'])){
    $emails = $_POST['email'];
    $result = deleteUser($conn, $emails);

    if($result !== false){
        header("location: ../profile.php?error=none");
        exit();
    } else {
        header("location: ../profile.php?error=couldnotdeleteusers");
        exit();
    }
} else {
    header("location: ../profile.php");
    exit();
}