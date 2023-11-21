<?php

include '../../database/DbConnection.php';
$sql = "SELECT * FROM user";
$result = $connexion->query($sql);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View users</title>


</head>

<body>


    <table class="table">

        <thead>

            <tr>

                <th>ID</th>

                <th>First Name</th>

                <th>Last Name</th>

                <th>Email</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            <?php 

                $r = $result->fetch_assoc();
            ?>

            <tr>
            <td><?php echo $r['id']; ?></td>
            <td><?php echo $r['firstName']; ?></td>
            <td><?php echo $r['lastName']; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <td><a class="btn btn-info" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </tr>
        </tbody>

    </table>
</body>

</html>