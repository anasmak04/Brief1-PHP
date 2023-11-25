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
            <a href="./create.php" class="btn btn-success">Create a new Blog</a>

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
                                <p class="card-text">Blog Name : <?php echo $row['firstName']; ?></p>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure do you want to delete this user?')" class="btn btn-danger">Delete</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                    View More
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nom']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo $row['description']; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>