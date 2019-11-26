<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<?php
    require "header.php";
    $_SESSION['list']=$_GET['list'];
    include_once 'includes/dbqh.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>List</title>
    </head>

    <body>
        <?php echo $_SESSION['list']; ?>
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
                <?php
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
    </body>
</html>