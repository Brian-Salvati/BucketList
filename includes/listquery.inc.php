<?php
    include_once 'includes/dbh.inc.php';

    $sql = "SELECT lid, lname, iid, iname, notes, cmpl FROM users u, lists l, items i
        WHERE i.l_id = l.lid AND l.uid = u.u_id AND lname = '" . $_SESSION['list'] . "' AND u.username = '" . $_SESSION['userUid'] . "';";
        $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        $resultCheck = mysqli_num_rows($result);
?>