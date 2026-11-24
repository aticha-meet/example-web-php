<?php

$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "green-life";
$port = "3310";

$conn = mysqli_connect($hostname, $user, $pass, $dbname, $port);

if (mysqli_error($conn)) {
    die("Not Connect");
}

mysqli_set_charset($conn, 'utf8mb4');
