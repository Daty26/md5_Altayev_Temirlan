<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = 'root';
$dBName = "SpaceNotes";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Сбой подключения: " .mysqli_connect_error());
}