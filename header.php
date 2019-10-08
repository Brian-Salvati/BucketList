<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Example of meta description.">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title></title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
    <body>

        <header>
            <nav>
                <a href="#">
                    <img src="img/fullmetalLogo2.jpg" alt="logo">
                </a>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Manage Lists</a></li>
                    <li><a href="#">About me</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div>
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>
                    <form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>
                </div>
            </nav>    
        </header>

