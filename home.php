<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<?php
    require "header.php";
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <?php if (!isset($_SESSION['userId'])) { ?>
        <p>Please login to create lists</p>
    <?php } else { ?>

    <!-- <body>
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
    </body> -->
    

    <!-- Test html editable table -->
    <table id="data_table" class="table table-striped">
        <thead>
            <tr>
                <th>Number2</th>
                <th>Name</th>
                <th>Notes</th>
                <th>Completed</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT iid, iname, notes, cmpl FROM items;";
                $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr id="<?php echo $row ['iid']; ?>">
                            <td><?php echo $row ['iid']; ?></td>
                            <td><?php echo $row ['iname']; ?></td>
                            <td><?php echo $row ['notes']; ?></td>
                            <td><?php echo $row ['cmpl']; ?></td>
                        </tr>
                    <?php }} ?>
        </tbody>
    </table>
    <?php } ?>

</html>



