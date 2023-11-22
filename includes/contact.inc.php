<?php
if(isset($_POST['submit_contact'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $x = "&name=".$name."&email=".$email."&phone=".$phone."&message".$message;

    if(empty($name) || empty($email) || empty($message)){
        header("location: ../contact.php?error=emptyinput".$x);
        exit();
    } else if(invalidEmail($email)){
        header("location: ../contact.php?error=invalidemail".$x);
        exit();
    }

    $subject = 'NOVA MENSAGEM DE ';
    $subject .= strtoupper($name).' | CAH';

    $message .= '<br><br>Nome: '.$nome.'<br>E-mail: '.$email;
    if(isset($phone)){
        $message .= '<br>Telefone: '.$phone;
    }

    require '../vendor/PHPMailer/src/Exception.php';
    require '../vendor/PHPMailer/src/PHPMailer.php';
    require '../vendor/PHPMailer/src/SMTP.php';

    sendEmail($message, $subject, 'coletivo.art.humanos@gmail.com');

    header("location: ../contact.php?error=none");
    exit();
} else {
    header("location: ../contact.php");
    exit();
}