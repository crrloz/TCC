<?php

if(isset($_POST['date'])){
    require_once 'dbh.inc.php';

    $name = $_POST['name'];

    $dateParts = explode('/', $_POST['date']);
    $date = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

    $descri = $_POST['descri'];

    $sql = "INSERT INTO events (eventsName, eventsDate, eventsDesc) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../schedule.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $name, $date, $descri);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../schedule.php?error=none");
    exit();
} else {
    header("location: ../schedule.php");
    exit();
}

