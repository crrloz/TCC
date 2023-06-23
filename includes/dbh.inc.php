<?php

$serverName = "localhost";
$dbPassword = "";
$dbUsername = "root";
$dbName = "dbtcc";
$dbPort = 3307;

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName, $dbPort);

if(!$conn){
    die("A tentativa de conexão foi falha: " . mysqli_connect_error());
}