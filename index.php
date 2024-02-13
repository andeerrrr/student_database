<?php
    //this one is right na as well
    include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Students System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <a href="create-student.php" class="btn btn-success">Create Student</a>
    <a href="logout.php" class="btn btn-warning">Logout</a>

    <div class="student-list">
        <h2>List of Students</h2>
        <?php
            if(isset($_GET['notif'])) {
                $message = $_GET['notif'];
                echo '<h4 id="notif" style="color:green;">'.$message.'</h4>';
            
                echo '
                    <script>
                    setTimeout(function() {
                        document.getElementById("notif").style.display = "none";
                    }, 3000);
                    </script>
                ';
            }
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>MI</th>
                    <th>Birth Date</th>
                    <th>Year & Sec.</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM student ORDER BY lastname";
                    $result = $conn->query($sql);
                
                    if($result->num_rows > 0) { 
                        while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['mi']; ?></td>
                    <td><?php echo $row['birthdate']; ?></td>
                    <td><?php echo $row['year_section']; ?></td>
                    <td>
                        <a href = "edit-student.php?edit_id=<?php echo $row['idnumber']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete-student.php?del_id=<?php echo $row['idnumber']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                } 
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>