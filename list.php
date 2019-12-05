<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script> -->
<?php
    require "header.php";
    $_SESSION['list']=$_GET['list'];
    include_once 'includes/listquery.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>List</title>
    </head>

    <body>
        <?php echo $_SESSION['list']; ?>
        <form id="table_form" action="includes/add_item.inc.php" method="post" onsubmit="return formSubmit();">
        <!-- <form id="table_form" method="post"> -->
            <table id="data_table" class="">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Notes</th>
                        <th>Completed</th>
                    </tr>
                </thead>
                <tbody id="table_data">
                    <?php
                    if ($resultCheck > 0) {
                        $index = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $index++;
                        ?>
                            <tr id="<?php echo $index; ?>">
                                <td><?php echo $index; ?></td>
                                <td><?php echo $row ['iname']; ?></td>
                                <td><?php echo $row ['notes']; ?></td>
                                <td><?php echo $row ['cmpl']; ?></td>
                            </tr>       
                    <?php }} ?>
                    </tbody>
                <tbody id="new_item_form">
                            <tr>
                                <td>#</td>
                                <td><input type="text" name="iname" required/></td>
                                <td><input type="text" name="notes"/></td>
                                <td><input type="text" name="cmpl"/></td>
                            </tr>
                </tbody>
            </table>
            <input type="submit" name="submit" id="submit" value="Submit" />
        </form>
       
        <script type="text/javascript">
            function formSubmit() {
                $.ajax({
                    type: 'POST',
                    url: 'includes/add_item.inc.php',
                    data: $('#table_form').serialize(),
                    beforeSend: function() {
                        $('#submit').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        $('#submit').attr('disabled', false);
                        var newData = JSON.parse(data),
                            newIndex = function() { 
                              var lastIndex = $('#table_data tr').last().attr('id');  
                              return parseInt(lastIndex)+1;
                            };
                        html = '<tr>';
                        html += '<td>' + newIndex() + '</td>';
                        html += '<td>' + newData.iname + '</td>';
                        html += '<td>' + newData.notes + '</td>';
                        html += '<td>' + newData.cmpl + '</td></tr>';
                        $('#table_data').append(html);
                    }
                });
                var form = document.getElementById('table_form').reset();
                return false;
            }
        </script>
        <!-- <button type="button" id="button_add_row">Add Row</button> -->
    </body>
</html>