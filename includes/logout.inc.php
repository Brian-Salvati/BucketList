<?php

session_start();
// Deletes values inside session variables
session_unset();
// Destroys all sessions
session_destroy();
header("Location: ../index.php");
?>