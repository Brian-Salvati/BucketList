<?php
if (isset($_SESSION['userId'])) {
    // Establishes db connection
    require 'dbh.inc.php';
}
else {
    header("Location: ../login.php");
    exit();
}