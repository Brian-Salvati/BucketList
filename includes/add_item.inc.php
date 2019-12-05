<?php
    
    include_once("dbh.inc.php");

    // if (isset($_POST['submit'])) {

        $itemName = format_input($_POST['iname']);
        $itemNotes = format_input($_POST['notes']);
        $itemCompleted = format_input($_POST['cmpl']);

        // $data = array(
        //     ':iname' => $itemName,
        //     ':notes' => $itemNotes,
        //     ':cmpl' => $itemCompleted
        // );

        if (empty($itemName)) {
            exit();
        }
        else {
            // $sql = "INSERT INTO items (l_id, iname, notes, cmpl) VALUES ((SELECT lid FROM lists WHERE lname = '" . $_SESSION['list'] . "' ), '$itemName', '$itemNotes', '$itemCompleted')";
            $sql = "INSERT INTO items (l_id, iname, notes, cmpl) VALUES ('3', '$itemName', '$itemNotes', '$itemCompleted')";
            // $sql = "INSERT INTO items (l_id, iname, notes, cmpl) VALUES ('3', ':iname', ':notes', ':cmpl')";

            // $stmt = $conn->prepare($sql);
            // if ($stmt->execute($data)) {
            //     $output = array(
            //         'iname' => $_POST['iname'],
            //         'notes' => $_POST['notes'],
            //         'cmpl' => $_POST['cmpl']
            //     );

            //     echo json_encode($output);
            // }
            if (mysqli_query($conn, $sql)) {
                //echo "Record added!";
                // $output = array(
                //             'iname' => $itemName,
                //             'notes' => $itemNotes,
                //             'cmpl' => $itemCompleted
                //         );

                $output->iname = $itemName;
                $output->notes = $itemNotes;
                $output->cmpl = $itemCompleted;
                echo json_encode($output);
            }
            else {
                //echo "Failed to add";
            }
            mysqli_close($conn);
        }

        function format_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    

?>