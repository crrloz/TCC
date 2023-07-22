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
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
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
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", strtoupper($name), $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
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

        $userId = $_SESSION["userid"];

        $sql = "SELECT usersPic FROM users WHERE usersId = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $profilePic);
            mysqli_stmt_fetch($stmt);
        
            if ($profilePic !== null) {
                $_SESSION['imagesrc'] = "data:image/jpeg;base64," . base64_encode($profilePic);
            } else {
                $_SESSION['imagesrc'] = "images/patterns/pattern1.jpg";
            }
            mysqli_stmt_close($stmt);
        }

        $sql = "SELECT usersName FROM users WHERE usersId = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $usersName);
            mysqli_stmt_fetch($stmt);

            $arrayName = explode(" ", $usersName);
            $firstName = ucfirst($arrayName[0]);

            $_SESSION['username'] = ucwords($firstName);
            mysqli_stmt_close($stmt);
        }

        $sql = "SELECT isAdmin FROM users WHERE usersId = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $isAdmin);
            mysqli_stmt_fetch($stmt);

            if($isAdmin == 1){
                $_SESSION['isadmin'] = true;
            }
            
            mysqli_stmt_close($stmt);
        }

        if (!isset($_COOKIE["User"]) || !isset($_COOKIE["Senha"])) {
            setcookie("User", $username, time()+60*60*24*364);
            setcookie("Senha", $pwd, time()+60*60*24*364);
        }
        
        header("location: ../index.php?loggedin");
        exit();
    }
}

// OUTRAS

function deleteUser($conn, $id){
    if(is_array($id)){
        if (empty($id)) {
            header("location: ../profile.php?emptyarray");
            exit();
        }
    
        $placeholders = implode(',', array_fill(0, count($id), '?'));
    
        $sql = "DELETE FROM users WHERE usersEmail IN ($placeholders)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../profile.php?stmtfailed");
            exit();
        }
    
        $types = str_repeat('s', count($id));
        mysqli_stmt_bind_param($stmt, $types, ...$id);
    
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        $sql = "DELETE FROM users WHERE usersId = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    
        $rowsAffected = mysqli_stmt_affected_rows($stmt);
        
        if ($rowsAffected > 0) {
            $result = true;
        } else {
            $result = false;
        }

        mysqli_stmt_close($stmt);
    }

    return $result;
}

function showPurchases($conn, $id){
    $sql = "SELECT * FROM sales WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed_sales");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $purchases = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $purchases[] = $row;
    }

    return $purchases;
}

function showAllUsers($conn, $admin){
    $sql = "SELECT * FROM users WHERE isAdmin = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $admin);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $users = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    
    return $users;
}

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

    try {
        $mail->send();
    } catch (PHPMailerException $e) {
        echo "Erro ao enviar o email: " . $e->errorMessage();
    } catch (Exception $e) {
        echo "Erro ao enviar o email: " . $e->getMessage();
    }
}

