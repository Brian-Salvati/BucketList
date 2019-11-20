<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<script type="text/javascript" src="jquery.tableanimation.js"></script>
<?php
    require "header.php";
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
    <?php if (!isset($_SESSION['userId'])) { ?>
        <p>Please login to create lists</p>
    <?php } else { ?>
    
    <!-- Test multiple html tables -->
    <?php
        $sql = "SELECT lid, lname, iid, iname, notes, cmpl FROM users u, lists l, items i
        WHERE i.l_id = l.lid AND l.uid = u.u_id AND u.username = '" . $_SESSION['userUid'] . "';";
        $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <dl class="accordion">
                    <dt><?php echo $row ['lname']; ?></dt>
                    <dd>
                        <table id="data_table" class="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Notes</th>
                                    <th>Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="<?php echo $row ['iid']; ?>">
                                    <td><?php echo $row ['iid']; ?></td>
                                    <td><?php echo $row ['iname']; ?></td>
                                    <td><?php echo $row ['notes']; ?></td>
                                    <td><?php echo $row ['cmpl']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </dd>
                </dl>
        <?php }} ?>

    <!-- Test html editable table -->
    <table class="data_table table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Notes</th>
                <th>Completed</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT iid, iname, notes, cmpl FROM users u, lists l, items i
                        WHERE i.l_id = l.lid AND l.uid = u.u_id AND u.username = '" . $_SESSION['userUid'] . "';";
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

