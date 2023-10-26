<?php
require_once "dbh.inc.php";

$sql = "SELECT eventsDate, eventsStartingHour, eventsName FROM events";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../schedule.php?error=stmtfailed");
    exit();
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$dates = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventName = $row['eventsName'];
        $eventHour = $row['eventsStartingHour'];
        $eventDate = $row['eventsDate'];

        $dates[] = array(
            'data' => $eventDate,
            'hora' => $eventHour,
            'url' => 'schedule.php?event='.urlencode($eventName)
        );
    }
}

$sql = "SELECT eventsDate, eventsStartingHour, eventsName FROM events WHERE CONCAT(eventsDate, ' ', eventsStartingHour) > NOW() ORDER BY CONCAT(eventsDate, ' ', eventsStartingHour) ASC LIMIT 1";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=eventstmtfailed");
    exit();
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$nextEvent = new stdClass();

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $eventName = $row['eventsName'];
    $eventHour = $row['eventsStartingHour'];
    $eventDate = $row['eventsDate'];

    $nextEvent->data = $eventDate;
    $nextEvent->hora = $eventHour;
    $nextEvent->url = 'schedule.php?event=' . urlencode($eventName);

    $proximaDataHora = PHP_INT_MAX;
    $proximaDataHoraEvento = null;

    $eventTimestamp = strtotime("$eventDate $eventHour");

    if ($eventTimestamp < $proximaDataHora) {
        $proximaDataHora = $eventTimestamp;
        $proximaDataHoraEvento = $eventDate . ' ' . $eventHour;
    }

    $nextEvent->proximaDataHoraEvento = $proximaDataHoraEvento;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

$response = array(
    'dates' => $dates,
    'nextEvent' => $nextEvent
);

echo json_encode($response);