<?php
    
    include_once("dbh.inc.php");
    
    $input = filter_input_array(INPUT_POST);

    if ($input['action'] === 'edit') {
        $sql = "UPDATE items SET iname='".$input['iname'] . "', notes='".$input['notes'] . "', cmpl='".$input['cmpl'] . "' WHERE iid='" . $input['iid'] . "'";
        mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    } else if ($input['action'] === 'delete') {
        $sql = "UPDATE items SET deleted = '1' WHERE iid='" . $input['iid'] . "'";
        mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    } else if ($input['action'] === 'add') {
        $sql = "INSERT INTO items (l_id, iname, notes, cmpl) VALUES ((SELECT lid FROM lists WHERE lname =  = '" . $_SESSION['list'] . "' ), '".$input['iname'] . "', '".$input['notes'] . "', '".$input['cmpl'] . "')";
        mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    }

    // $input = filter_input_array(INPUT_POST);
    // if ($input['action'] === 'edit') {
    //     $update_field='';
    //     if (isset($input['iname'])) {
    //         $update_field.= "iname='".$input['iname']."'";
    //     }
    //     else if (isset($input['notes'])){
    //         $update_field.= "notes='".$input['notes']."'";
    //     }
    //     else if (isset($input['cmpl'])){
    //         $update_field.= "cmpl='".$input['cmpl']."'";
    //     }
    //     if ($update_field && $input['iid']) {
    //         $sql = "UPDATE items SET $update_field WHERE iid='" . $input['iid'] . "'";
    //         mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    //     }
    // }

    mysqli_close($mysqli);
    echo json_encode($input);
?>