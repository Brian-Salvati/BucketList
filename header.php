<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <header>
            <nav>
                <a href="home.php">Home</a>
                <a href="mylists.php">My Lists</a>
                <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                        </form>';
                    }
                    else {
                        echo '<a href="login.php">Login</a>';
                    }
                ?>
                <div class="animation start-home"></div>
            </nav>    
        </header>
    </body>
</html>

