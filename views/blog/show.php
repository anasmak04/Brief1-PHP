<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="./public/js/script.js" defer></script>
    <link rel="stylesheet" href="./public/css/styles.css">
    <style>
        .row.content {
            min-height: calc(100vh - 50px);
        }

        .sidenav {
            background-color: #f1f1f1;
            min-height: calc(100vh - 50px);
            padding-top: 20px;
        }

        .btn-custom {
            display: flex;
            align-items: center;
            float: right;
        }

        .card {
            margin-bottom: 20px;
        }

        @media screen and (min-width: 768px) {
            .sidenav {
                position: fixed;
                width: 250px;
                border-right: 1px solid #ccc;
            }
            .col-xs-12.col-sm-9 {
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>


    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Innovation</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li class="d-flex align-items-center">
                        <a style="display: flex; align-items:center;" href="../user/show.php" class="d-flex align-items-center">
                            <lord-icon src="https://cdn.lordicon.com/mebvgwrs.json" trigger="hover" class="lord-icon"></lord-icon>
                            Users
                        </a>
                    </li>
                    <li><a style="display: flex; align-items:center;" href="../Produit/show.php">
                            <lord-icon src="https://cdn.lordicon.com/eiekfffz.json" trigger="hover">
                            </lord-icon>
                            Products</a></li>
                    <li><a style="display: flex; align-items:center;" href="../blog/show.php"><lord-icon src="https://cdn.lordicon.com/tkaupsqk.json" trigger="hover">
                            </lord-icon>
                            Blogs</a></li>
                </ul><br>
            </div>

            <div class="col-xs-12 col-sm-9" style="margin-top: 20px;">
                <div class="container-fluid ">
                    <div class="m-4">
                        <a href="create.php" class="btn btn-primary btn-custom">
                            <lord-icon src="https://cdn.lordicon.com/pdsourfn.json" trigger="hover"></lord-icon>
                        </a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <h1 class="text-center">All Blogs</h1>
                            <?php
                            include '../../database/DbConnection.php';

                            $sql = "SELECT blog.*, user.firstName 
                                FROM blog 
                                INNER JOIN user ON blog.id_user = user.id";

                            $result = $connexion->query($sql);
                            ?>

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="col-md-4">
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
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

</body>

</html>
