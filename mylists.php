<?php
    require "header.php";
?>

<?php
    if (!isset($_SESSION['userId'])) {
        echo '<p>Please login to create lists</p>';
    }
?>

