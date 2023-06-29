<?php

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['uid'];
$pwd = $_POST['pwd'];
$pwdRepeat = $_POST['pwdrepeat'];

if(isset($_POST['admin'])){
    $admin = true;
} else {
    $admin = false;
}

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}

if(invalidUid($username) !== false){
    header("location: ../signup.php?error=invaliduid");
    exit();
}

if(invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();
}

if(pwdMatch($pwd, $pwdRepeat) !== false){
    header("location: ../signup.php?error=thepassdontmatch");
    exit();
}

if(uidExists($conn, $username, $email) !== false){
    header("location: ../signup.php?error=usernametaken");
    exit();
}

$message = '<p>Olá, '.$username.'. Seu cadastro no site do Coletivo Artístico Humanos foi finalizado. Explore nosso site!</p>';

$subject = 'Cadastro finalizado. Seja bem vindo(a)!';

sendEmail($message, $subject, $email);
createUser($conn, $name, $email, $username, $pwd);