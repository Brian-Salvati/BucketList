<?php
    require "header.php";
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <?php if (!isset($_SESSION['userId'])) { ?>
        <p>Please login to create lists</p>
    <?php } else { ?>
    
    <!-- Retrieve user lists -->
    <?php
        $sql = "SELECT lname FROM users u, lists l WHERE l.uid = u.u_id AND u.username = '" . $_SESSION['userUid'] . "';";
        $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) { ?>
            <ul>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <li><a href="list.php?list=<?php echo $row ['lname']?>"><?php echo $row ['lname']; ?><a></li>
        <?php }} ?>
            </ul>
    <?php } ?>
</html>

