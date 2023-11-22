<?php
include "../../database/DbConnection.php";

$sql1 = "SELECT * FROM `category`";
$result1 = $connexion->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Show all products</title>
</head>

<body>
    <h3 class="text-center pt-4">View all products by categories</h3>
    <form method="post">
        <select name="category" id="category" class="form-select mt-4" style="width: 500px; margin: 0 auto; display: block;" aria-label="Default select example">
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
        <button type="submit" name="submit" class="btn btn-primary mt-4" style="width: 500px; margin: 0 auto; display: block;">Show Products</button>
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
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure do you want to delete this user?')">Delete</a>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Update</a>
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

</body>

</html>