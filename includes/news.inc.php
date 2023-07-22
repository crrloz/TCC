<?php include_once 'dbh.inc.php';

if(isset($_POST["submit_news"])){
    if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $image = file_get_contents($_FILES["image"]["tmp_name"]);
    
        $sql = "INSERT INTO news (newsName, newsUrl, newsPic) VALUES (?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../news.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "sss", $title, $url, $image);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        header("location: ../news.php?error=none");
        exit();
    } else {
        header("location: ../news.php?error=imageerror");
        exit();
    }
} else {
    header("location: ../news.php");
    exit();
}