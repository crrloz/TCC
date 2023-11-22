<?php

if(isset($_POST['date'])){
    if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantitiy = $_POST['quantity'];

        $dateParts = explode('/', $_POST['date']);
        $date = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
        
        $startingHour = $_POST['time'];
        $descri = $_POST['descri'];
        $image = file_get_contents($_FILES["image"]["tmp_name"]);

        require_once 'dbh.inc.php';

        $sql = "INSERT INTO events (eventsName, eventsPrice, eventsQnt, eventsDate, eventsStartingHour, eventsDesc, eventsPic) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../schedule.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sdissss", $name, $price, $quantitiy, $date, $startingHour, $descri, $image);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../schedule.php?error=none");
        exit();
    } else {
        header("location: ../schedule.php?error=imageerror");
        exit();
    }
} else {
    header("location: ../schedule.php");
    exit();
}

