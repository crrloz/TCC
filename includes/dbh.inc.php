<?php

$serverName = "localhost";
$dbPassword = "";
$dbUsername = "root";
$dbName = "CAH";
$dbPort = 3307;

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName, $dbPort);

if(!$conn){
    die("A tentativa de conexão foi falha: " . mysqli_connect_error());
}

// CREATE TABLE users(
//     UsersId INT(11) PRIMARY KEY AUTO_INCREMENT,
//     usersName VARCHAR(128) NOT NULL,
//     usersEmail VARCHAR(128) NOT NULL,
//     usersUid VARCHAR(128) NOT NULL,
//     usersPwd VARCHAR(128) NOT NULL
// );

// CREATE TABLE pwdReset(
//     pwdResetId INT(11) PRIMARY KEY AUTO_INCREMENT,
//     pwdResetEmail TEXT NOT NULL,
//     pwdResetSelector TEXT NOT NULL,
//     pwdResetToken LONGTEXT NOT NULL,
//     pwdResetExpires TEXT NOT NULL
// );