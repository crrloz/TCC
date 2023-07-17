<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST['submit_reset'])){
    if(emptyInputLogin($_POST['email_reset'], $_POST['email_reset']) !== false){
        header("location: ../reset.php?error=emptyinput");
        exit();

    } else {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = 'http://localhost/TCC/create_new_pass.php?selector='.$selector.'&validator='.bin2hex($token);

        $expires = date("U") + 1800;

        $userEmail = $_POST['email_reset'];

        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Ocorreu um erro com o statement.";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Ocorreu um erro com o statement.";
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);

        $message = '<p>Recebemos uma requisição para a troca da senha de sua conta. Clique no link abaixo para mudá-la. Caso não tenha requisitado, ignore este E-mail.</p>';
        $message.= '<p>Aqui está seu link:<br>';
        $message.= '<a href="'.$url.'">'.$url.'</a></p>';

        $subject = 'Troca de sua Senha no CAH';
    
        require '../vendor/PHPMailer/src/Exception.php';
        require '../vendor/PHPMailer/src/PHPMailer.php';
        require '../vendor/PHPMailer/src/SMTP.php';

        sendEmail($message, $subject, $userEmail);

        // $to = $userEmail;

        // $subject = 'Troca de sua Senha no CAH';

        // $message = '<p>Recebemos uma requisição para a troca da senha de sua conta. Clique no link abaixo para mudá-la. Caso não tenha requisitado, ignore este E-mail.</p>';
        // $message.= '<p>Aqui está seu link:<br>';
        // $message.= '<a href="'.$url.'">'.$url.'</a></p>';

        // $headers = 'From: carlos <magnesitium@gmail.com>\r\n';
        // $headers.= 'Reply-To: magnesitium@gmail.com\r\n';
        // $headers.= 'Content-type: text/html\r\n';

        // mail($to, $subject, $message, $headers);
        header("location: ../reset.php?error=none");
        exit();
    }

} else {
    header("location: ../reset.php");
    exit();
}