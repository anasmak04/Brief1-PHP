<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>View users</title>
</head>

<body>

    <?php
    include '../../database/DbConnection.php';

    $sql = "SELECT blog.*, user.firstName 
        FROM blog 
        INNER JOIN user ON blog.id_user = user.id";

    $result = $connexion->query($sql);
    ?>

    <div class="container">
        <div class="row">

            <h1 class="text-center">All Blogs</h1>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 m-3">
                        <div class="card">
                            <div class="card-body border">
                                <h5 class="card-title">Blog Name : <?php echo $row['nom']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Id Author : <?php echo $row['id_user']; ?></h6>
                                <p class="card-text">Description Blog : <?php echo $row['description']; ?></p>
                                <p class="card-text">user BlogName : <?php echo $row['firstName']; ?></p>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure do you want to delete this user?')" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No users found</p>";
            }
            ?>
        </div>
    </div>

</body>

</html>