<?php
if (isset($_SESSION['userId'])) {
    // Establishes db connection
    require 'dbh.inc.php';

    $listname = $_POST['lname'];
    
}
else {
    header("Location: ../login.php");
    exit();
}