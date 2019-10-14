<?php
// Checks if user got to signup page legitimately
if (isset($_POST['signup-submit'])) {
    // Establishes db connection
    require 'dbh.inc.php';

    // Saves fields from user signup form
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // Checks if any fields are empty
    if (empty($username)  || empty($email)  || empty($password)  || empty($passwordRepeat)) {
        // Keeps username and email fields filled out when user is sent back to signup page
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        // Stops script from running if user makes mistake
        exit();
    }
    // Checks if both email and username are invalid
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)) {
        // If invalid email and username, no fields will be sent back to signup page
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    // Checks if invalid email using filter
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If invalid email, only username will be sent back to signup page
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    // Checks if invalid username using pattern
    else if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
        // If invalid username, only email will be sent back to signup page
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    // Checks if passwords match
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {
        $sql = "SELECT username FROM users WHERE username=?";
        // Prepared statement 
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            // Binds params from user to sql statement
            mysqli_stmt_bind_param($stmt, "s", $username);
            // Runs query on db
            mysqli_stmt_execute($stmt);
            // Stores result in $stmt
            mysqli_stmt_store_result($stmt);
            // $resultCheck is equal to the number of rows returned from db. Should be 0 or 1 in this case
            $resultCheck = mysqli_stmt_num_rows($stmt);
            // If $resultCheck > 0 then the username already exists in db
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    // Binds params from user to sql statement
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    // Runs query on db
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
// In case someone tries to access signup page without clicking signup button
else {
    header("Location: ../signup.php");
    exit();
}