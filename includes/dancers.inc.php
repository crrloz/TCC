<?php
if(isset($_POST['submit_dancers'])){
    if($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        if(isset($_POST['date'])){
            $name = strtoupper($_POST['name']);

            $dateParts = explode('/', $_POST['date']);
            $date = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

            $text = $_POST['text'];
            if(isset($_POST['url'])){
                $url = "https://www.instagram.com/".$_POST['url']."/";
            } else {
                $url = null;
            }

            $image = file_get_contents($_FILES["image"]["tmp_name"]);

            require_once "dbh.inc.php";
        
            $sql = "INSERT INTO dancers (dancersName, dancersBirthDate, dancersText, dancersUrl, dancersPic) VALUES (?,?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../about.php?error=stmtfailed");
                exit();
            }
            
            mysqli_stmt_bind_param($stmt, "sssss", $name, $date, $text, $url, $image);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        
            header("location: ../about.php?error=none");
            exit();
        } else {
            header("location: ../about.php?error=datenotselected");
            exit();
        }
    } else {
        header("location: ../about.php?error=imageerror");
        exit();
    }

} else if(isset($_POST['edit_dancers'])){
    $id = $_POST['id'];
    $name = strtoupper($_POST['name']);

    $dateParts = explode('/', $_POST['date']);
    $date = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

    $text = $_POST['text'];

    if(isset($_POST['url'])){
        $url = "https://www.instagram.com/".$_POST['url']."/";
    } else {
        $url = null;
    }

    $image = $_POST['currentImage'];

    require_once "dbh.inc.php";

    if($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES["image"]["tmp_name"]);

        $sql = "UPDATE dancers
        SET dancersName = ?, dancersBirthDate = ?, dancersText = ?, dancersUrl = ?, dancersPic = ?
        WHERE dancersId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../about.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "sssssi", $name, $date, $text, $url, $image, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../about.php?error=none");
        exit();
    } else if($_FILES["image"]["error"] === 4) {
        $sql = "UPDATE dancers
        SET dancersName = ?, dancersBirthDate = ?, dancersText = ?, dancersUrl = ?
        WHERE dancersId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../about.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $date, $text, $url, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../about.php?error=none");
        exit();
    } else {
        header("location: ../about.php?error=imageerror");
        exit();
    }
} else {
    header("location: ../about.php");
    exit();
}