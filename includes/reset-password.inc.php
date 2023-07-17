<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST['submit_new_pwd'])){
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['pwdreset'];
    $pwdrepeat = $_POST['pwdresetrepeat'];

    if(emptyInputLogin($pwd, $pwdrepeat) !== false){
        header("location: ../create_new_pass?selector=".$selector."&validator=".bin2hex($validator)."&error=emptyinput");
        exit();
    } else if($pwd !== $pwdrepeat){
        header("location: ../create_new_pass?selector=".$selector."&validator=".bin2hex($validator)."&error=pwdnotthesame");
        exit();
    }
    
    $currentDate = date("U");

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "Ocorreu um erro com o statement.";
    } else {
        mysqli_stmt_bind_param($stmt, "si", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if(!$row = mysqli_fetch_assoc($result)){
            echo "Você precisa re-enviar sua requisição de troca de senha.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if($tokenCheck == false){
                echo "Você precisa re-enviar sua requisição de troca de senha.";
                exit();
            } else if($tokenCheck == true) {
                $tokenEmail = $row['pwdResetEmail'];
                $sql = "SELECT * FROM users WHERE usersEmail =?;";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Ocorreu um erro com o statement.";
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);

                    if(!$row = mysqli_fetch_assoc($result)){
                        echo "Houve um erro.";
                        exit();
                    } else {
                        $sql = "UPDATE users SET usersPwd=? WHERE usersEmail=?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "Ocorreu um erro com o statement.";
                        } else {
                            $newPwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "Ocorreu um erro com o statement.";
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                header("location: ../login.php?pwdreset=pwdupdated");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("location: ../index.php");
    exit();
}