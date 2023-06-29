<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// FUNÇÕES DE CADASTRO

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ? UNION SELECT * FROM admins WHERE adminsUid = ? OR adminsEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $username, $username, $username, $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ? , ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?error=nenhum");
    exit();
}

function createAdmin($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO admins (adminsName, adminsEmail, adminsUid, adminsPwd) VALUES (?, ?, ? , ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php?error=nenhum");
    exit();
}

function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

// FUNÇÕES DE LOGIN

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $pwd);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}

function loginAdmin($conn, $username, $pwd){
    $adminExists = uidExists($conn, $username, $pwd);

    if ($adminExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $sql = "SELECT adminsPwd FROM admins WHERE adminsUid = $username";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=statementfailed");
        exit();
    }

    $result = mysqli_query($conn, $sql);

    if ($resultado) {
        $line = mysqli_fetch_assoc($result);
        $storedPwd = $line['adminsPwd'];

        if (password_verify($pwd, $storedPwd)) {
            session_start();
            $_SESSION["adminid"] = $uidExists["adminsId"];
            $_SESSION["adminuid"] = $uidExists["adminsUid"];
            header("location: ../index.php");
            exit();
        } else {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["adminid"] = $adminExists["adminsId"];
        $_SESSION["adminuid"] = $adminExists["adminsUid"];
        header("location: ../index.php");
        exit();
    }
}

// OUTRAS

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendEmail($message, $subject, $email){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'eklipsing@gmail.com';
    $mail->Password = 'jsnelhjugrwiygpp';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom('comunicacaoprohu@gmail.com', 'Coletivo Artístico Humanos');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();
}