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

                $r = $result->fetch_assoc();
                ?>
                <td><?php echo $r['id']; ?></td>
                <td><?php echo $r['firstName']; ?></td>
                <td><?php echo $r['lastName']; ?></td>
                <td><?php echo $r['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php $r['id'] ?>" class="btn btn-warning">update</a>
                    <a href="delete.php?id=<?php $r['id'] ?>" class="btn btn-danger">delete</a>
                </td>
            </tbody>
        </table>
    </div>
</body>

</html>