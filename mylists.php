<?php
    require "header.php";
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <?php
        if (!isset($_SESSION['userId'])) { ?>
            <p>Please login to create lists</p>
    <?php } else { ?>

    <body>
        <table>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Notes</th>
                <th>Completed</th>
            </tr>
            <?php
                $sql = "SELECT iid, iname, notes, cmpl FROM items;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    //$row becomes array of data from db
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>". $row["iid"] ."</td>
                                <td>". $row["iname"] ."</td>
                                <td>". $row["notes"] ."</td>
                                <td>". $row["cmpl"] ."</td>
                            </tr>";
                    }
                    echo "</table>";
                }
            ?>
    </body>
    <?php } ?>
</html>

