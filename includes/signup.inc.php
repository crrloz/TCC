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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

require_once "dbh.inc.php";
require_once "functions.inc.php";

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

$message = '<style>
    @media (max-width: 540px) {
        .container {
            max-width: 720px;
        }
    }

    @media (min-width: 768px) {
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 768px) {
        .col-md-6 {
            padding: 10px 0;
        }
    }
</style>
<body style="background-color: rgb(250, 238, 221);">
    <!-- "Title Page" -->
    <section class="section-email-title">
        <div class="bg-email-title" style="background-image: url(images/inaraemulher.jpg); background-repeat: no-repeat; background-position: center; background-size: cover; padding: 160px 15px;">

        </div>
    </section>


    <!-- Conteúdo -->
    <section class="section-email-content">
        <!-- Título de Boas Vindas -->
        <div class="wrap-welcome-text color6" style="text-align: center; padding-top: 50px; color: ;">
            <span class="f-glitten" style="font-size: 75px;">Bem-vindo<span class="f-glitten" style="font-size: 30px;"> (a)<span>!</span>
        </div>

        <!-- Texto -->
        <div class="wrap-content-text">
            <div class="container" style="margin-right: auto; margin-left: auto; width: 100%;">
                <div class="row" style="display: flex; flex-wrap: wrap;">
                    <div class="col-md-6" style="position: relative; width: 100%; min-height: 1px; text-align: center; padding: 0 15px;">
                        <span class="f-glitten color6" style="font-size: 20px;">Olá, <span class="tt-up">';
                        $message .= $username;
                        $message .= '</span></span>. Seu cadastro no site do Coletivo Artístico Humanos foi finalizado. O nosso Coletivo é um grupo de dança situado em Arraial do Cabo, dedicado a representar e celebrar a rica cultura afro-brasileira por meio da expressão corporal.
                    </div>
                    <div class="col-md-6" style="position: relative; width: 100%; min-height: 1px; text-align: center; padding: 0 15px;">
                        Por favor, <a href="index.php" class="hov_underline">explore nosso site</a> e suas funcionalidades. Caso não tenha criado uma conta a partir deste E-mail, contate-nos através do <a href="contact.php" class="hov_underline">nosso site</a> ou E-mail para resolvermos qualquer problema.
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>';

$subject = 'Cadastro finalizado. Seja bem vindo(a)!';

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

sendEmail($message, $subject, $email);
createUser($conn, $name, $email, $username, $pwd);
loginUser($conn, $username, $pwd);