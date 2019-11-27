<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "xj0461";
$dbName = "bucket_db";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
?>
