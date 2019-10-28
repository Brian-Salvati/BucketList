<?php
    require "header.php";
    require 'includes/dbh.inc.php';
?>

<!-- <?php
    if (!isset($_SESSION['userId'])) {
        echo '<p>Please login to create lists</p>';
    } 
    else {
        
    }
?> -->

<!DOCTYPE html>
<html>
    <title>
        <head>Here's your list!</head>
    </title>
<body>
    <?php
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            //$row becomes array of data from db
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['email'] . "<br>";
            }

        }
    ?>
</body>
</html>

