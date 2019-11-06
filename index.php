<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>

<?php
    require "header.php";
?>

    <main>
        <?php
            // Checks if user is logged in
            if (isset($_SESSION['userId'])) {
                echo '<p>You are logged in!</p>';
                header("Location: home.php");
            }
            else {
                echo '<p>You are logged out!</p>';
            }
        ?>
    </main>

<?php
    require "footer.php";
?>
