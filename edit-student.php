<?php
    //from edwin
    include "dbcon.php";

    if (isset($_GET['edit_id'])) {
        $id = $_GET['edit_id'];
        
        $select = "SELECT * FROM student WHERE idnumber = '$id'";
        $result = $conn->query($select);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $idno = $row['idnumber'];        
                $lastname = $row['lastname'];
                $firstname = $row['firstname'];
                $mi = $row['mi'];
                $birth = $row['birthdate'];
                $year_sec = $row['year_section'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="post" action="update-student.php">
        <table>
            <tr>
                <td>ID Number:</td>
                <td>
                    <input type="hidden" name="hiddenId" value="<?php echo $idno;?>">
                    <?php echo $idno;?></td>
            </tr>
            <tr>
                <td>Lastname:</td>
                <td><input type="text" name="last" value="<?php echo $lastname;?>"></td>
            </tr>
            <tr>
                <td>Firstname</td>
                <td><input type="text" name="first" value="<?php echo $firstname;?>"></td>
            </tr>
            <tr>
                <td>MI:</td>
                <td><input type="text" name="mi" value="<?php echo $mi;?>"></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="birth" value="<?php echo $birth;?>"></td>
            </tr>
            <tr>
                <td>Year & Section:</td>
                <td><input type="text" name="year_sec" value="<?php echo $year_sec;?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Update" name="update"></td>
            </tr>
        </table>
    </form>
</body>
</html>