<?php
    include "dbcon.php";

    $id = $_GET['del_id'];

    $delete = "DELETE FROM student WHERE idnumber = '$id'";
    $result = $conn->query($delete);

    if($result == TRUE) {
        $message = "Student was successfully deleted.";
        header('location: index.php?notif='.$message);
    } else {
        $message = "Unable to delete student record.";
        header('location: index.php?notif='.$message);
    }
?>