<?php

$serverName = "localhost";
$dbPassword = "coiso";
$dbUsername = "teste";
$dbName = "aseul";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("A tentativa de conexão foi falha: " . mysqli_connect_error());
}