<?php
include "../../database/DbConnection.php";

$sql1 = "SELECT * FROM `category`";
$result1 = $connexion->query($sql1);
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
                        <a href="create.php" style="display: flex; align-items:center; width:fit-content; float:right;" class="btn btn-primary">
                            <lord-icon src="https://cdn.lordicon.com/pdsourfn.json" trigger="hover">
                            </lord-icon>
                        </a>
                    </div>
                    <form method="post">
                        <select name="category" class="form-select" aria-label="Default select example" style="width: 500px; padding:20px; height:30px; margin: 0 auto; display: block;" aria-label="Default select example">
                            <?php
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) {
                            ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['nom'] ?></option>
                            <?php
                                }
                            } else {
                                echo '<option value="">No categories found</option>';
                            }
                            ?>
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary mt-4" style="width: 500px; margin: 0 auto; display: block; position:relative; top:10px;">Show Products</button>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $id_category1 = $_POST['category'];
                        $sql2 = "SELECT * FROM `produit` WHERE `id_category` = '$id_category1'";
                        $result2 = $connexion->query($sql2);

                        if ($result2) {
                            if ($result2->num_rows > 0) {
                                echo '<h2>Products</h2>';
                                while ($row = $result2->fetch_assoc()) {
                    ?>
                                    <div class="card" style="width: 30rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row['id'] ?></h5>
                                            <h5 class="card-title"><?= $row['nom'] ?></h5>
                                            <p class="card-text"><?= $row['description'] ?></p>
                                            <div style="display: flex; gap:12px;">
                                            <a  style="width: fit-content; display:flex; align-items:center;"  href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure do you want to delete this user?')">
                                                <lord-icon src="https://cdn.lordicon.com/xekbkxul.json" trigger="hover" colors="primary:#121331,secondary:#ffffff,tertiary:#646e78,quaternary:#ebe6ef">
                                                </lord-icon>
                                                Delete</a>
                                            <a style="width: fit-content; display:flex; align-items:center;"  href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">
                                            <lord-icon src="https://cdn.lordicon.com/lsrcesku.json" trigger="hover">
                                                        </lord-icon>
                                            Update</a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                    <?php
                                }
                            } else {
                                echo '<p>No products found for this category</p>';
                            }
                        } else {
                            echo 'Error executing the query: ' . $connexion->error;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

</body>

</html>