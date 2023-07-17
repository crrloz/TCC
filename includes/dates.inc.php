<?php
require_once "dbh.inc.php";

$sql = "SELECT eventsDate, eventsName FROM events";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../schedule.php?error=statementfailed");
    exit();
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$dates = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventName = $row['eventsName'];
        $eventDate = $row['eventsDate'];

        $dates[] = array(
            'data' => $eventDate,
            'url' => 'schedule.php?event='.urlencode($eventName)
        );
    }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

echo json_encode($dates);