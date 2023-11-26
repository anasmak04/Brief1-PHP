<?php
include '../../database/DbConnection.php';

$sql = "SELECT * FROM user";
$result = $connexion->query($sql);

?>


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
            height: 550px
        }

        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Innovation</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="../../index.php">Dashboard</a></li>
                    <li class=" d-flex align-items-center">
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
                        <a href="create.php" style="display: flex; align-items:center; width:fit-content; float:right;" class="btn btn-primary">
                            <lord-icon src="https://cdn.lordicon.com/pdsourfn.json" trigger="hover">
                            </lord-icon>
                        </a>
                    </div>
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">FirstName</th>
                                    <th scope="col">LastName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $counter++;
                                ?>
                                        <tr>
                                            <td><?php echo $row['firstName']; ?></td>
                                            <td><?php echo $row['lastName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td>
                                                <a style="width: fill-content;" href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">
                                                    <lord-icon src="https://cdn.lordicon.com/lsrcesku.json" trigger="hover">
                                                    </lord-icon></a>

                                                <!-- <form action="edit.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <input name="submit" type="submit" value="submit">
                                                    </form> -->

                                                <a style="width: flit-content;" href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure do you want to delete this user?')">
                                                    <lord-icon src="https://cdn.lordicon.com/xekbkxul.json" trigger="hover" colors="primary:#121331,secondary:#ffffff,tertiary:#646e78,quaternary:#ebe6ef">
                                                    </lord-icon>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No users found</td></tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

</body>

</html>