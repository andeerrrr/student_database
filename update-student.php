<?php 
    //from edwin
    include "dbcon.php";

    if (isset($_POST['update'])) {
        $id = $_POST['hiddenId'];
        $lastname = $_POST['last'];
        $firstname = $_POST['first'];
        $mi = $_POST['mi'];
        $birth = $_POST['birth'];
        $year_sec = $_POST['year_sec'];
        
        $update = "UPDATE student
        SET lastname = '$lastname', firstname = '$firstname', mi = '$mi', birthdate = '$birth', year_section = '$year_sec'
        WHERE idnumber = '$id'";

        $result = $conn->query($update);

        if($result == TRUE) {
            $message = "Student was successfully modified.";
            header('location: index.php?notif='.$message);
        } else {
            $message = "Unable to update student record.";
            header('location: index.php?notif='.$message);
        }
    }

?>