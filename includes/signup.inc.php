<?php
if(isset($_POST['submit_signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput&name=".$name."&email=".$email."&uid=".$username);
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid".$name."&email=".$email);
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail".$name."&uid=".$username);
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=thepassdontmatch?".$x);
        exit();
    }

    if(uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken".$name."&email=".$email."&uid=".$username);
        exit();
    }

    $message = '<style>
    </style>
    <body style="background-color: rgb(250, 238, 221); padding: 40px 0; border-radius: 4px; box-shadow: 0 5px 15px rgba(0, 0, 0, 22%);">
        <!-- Conteúdo -->
        <section class="section-email-content">
            <!-- Título de Boas Vindas -->
            <div class="wrap-welcome-text color6" style="text-align: center; padding-top: 50px; color: ;">
                <span class="f-glitten" style="font-size: 75px; padding: 0 15px;"">Bem-vindo<span class="f-glitten" style="font-size: 30px;"> (a)<span>!</span>
            </div>

            <!-- Texto -->
            <div class="wrap-content-text">
                <div class="container" style="margin-right: auto; margin-left: auto; width: 100%;">
                    <div class="row" style="display: flex; flex-wrap: wrap;">
                        <div style="position: relative; width: 100%; min-height: 1px; text-align: center; padding: 0 15px;">
                            <span style="font-size: 20px; color: #7F4AA4;">Olá, <span style="text-transform: uppercase; color: #7F4AA4;">';
                            $message .= $username;
                            $message .= '</span></span>. Seu cadastro no site do Coletivo Artístico Humanos foi finalizado. O nosso Coletivo é um grupo de dança situado em Arraial do Cabo, dedicado a representar e celebrar a rica cultura afro-brasileira por meio da expressão corporal.
                        </div>
                        <div style="position: relative; width: 100%; min-height: 1px; text-align: center; padding: 0 15px;">
                            Por favor, <a href="localhost/TCC/index.php">explore nosso site</a> e suas funcionalidades. Caso não tenha criado uma conta a partir deste e-mail, contate-nos através do <a href="localhost/TCC/contact.php">nosso site</a> ou e-mail para resolvermos qualquer problema.
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
    
} else {
    header("location: ../signup.php");
    exit();
}