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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>View users</title>
</head>

<body>
    <div class="container">
        <div class="m-4">
            <a href="create.php" class="btn btn-primary">new user</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['lastName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Update</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure do you want to delete this user?')">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "No users found";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>