<?php

include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {
    $id_category = $_POST['id'];
    $nom_category = $_POST['nom_category'];
    $id_produit = $_POST['id_produit'];
    $nom_produit = $_POST['nom_produit'];
    $description_produit = $_POST['description_produit'];

    $sql1 = "INSERT INTO `category` VALUES('$id_category','$nom_category')";
    $result = $connexion->query($sql1);
    $sql = "INSERT INTO `produit` VALUES ('$id_produit','$nom_produit','$description_produit','$id_category')";
    $result = $connexion->query($sql);

    if (isset($result)) {
        header('location:');
    } else {
        echo "error from insert produit" . $connexion->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Category</title>
</head>

<body>
    <div class="container mt-4">

        <a href="show.php" class="btn btn-primary">Insert New Product</a>

        <h1 class="text-capitalize text-center">Product management system </h1>
        <p class="text-capitalize text-center">insert new product by category</p>
        <form action="create.php" method="post">
            <div class="row">
                <div class="col">
                    <input type="number" name="id" class="form-control" placeholder="Id category">
                </div>
                <div class="col">
                    <input type="text" name="nom_category" class="form-control" placeholder="Nom Category">
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <input type="number" name="id_produit" class="form-control" placeholder="Id Product">
                </div>
                <div class="col">
                    <input type="text" name="nom_produit" class="form-control" placeholder="Nom Product">
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <input type="text" name="id_category" class="form-control" placeholder="id category">


                </div>


                <div class="row mt-4">
                    <div class="col">
                        <textarea placeholder="product description" name="description_produit" style="padding:15px;" id="" cols="174" rows="10"></textarea>
                    </div>


                </div>
                <div class="row mt-4">

                    <button type="submit" name="submit" class="btn btn-primary mt-4 ">Sign in</button>
        </form>
    </div>
    </div>
</body>

</html>