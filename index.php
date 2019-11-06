<?php
    require "header.php";
?>

    <main>
        <?php
            // Checks if user is logged in
            if (isset($_SESSION['userId'])) {
                // echo '<p>You are logged in!</p>';
                header("Location: home.php");
            }
            else {
                echo '<p>You are not logged in!</p>';
            }
        ?>
    </main>

<?php
    require "footer.php";
?>
