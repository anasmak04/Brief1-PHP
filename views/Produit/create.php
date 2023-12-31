<?php
include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {
    $id_category = mysqli_real_escape_string($connexion , $_POST['id_category']);
    $nom_category = mysqli_real_escape_string($connexion , $_POST['nom_category']);
    $nom_produit = mysqli_real_escape_string($connexion , $_POST['nom_produit']);
    $description_produit = mysqli_real_escape_string($connexion , $_POST['description_produit']);
    $id_category_produit = mysqli_real_escape_string($connexion , $_POST['id_category_produit']);

    $sql1 = "INSERT INTO `category` (id, nom) VALUES ('$id_category', '$nom_category')";
    $result1 = $connexion->query($sql1);

    $sql2 = "INSERT INTO `produit` (nom, description, id_category) VALUES ('$nom_produit', '$description_produit', '$id_category_produit')";
    $result2 = $connexion->query($sql2);

    if ($result1 && $result2) {
        header('location:show.php');
    } else {
        echo "Error from insert produit" . $connexion->error;
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

        <a href="show.php" class="btn btn-primary">View All Products</a>

        <h1 class="text-capitalize text-center">Product management system </h1>
        <p class="text-capitalize text-center">insert new product by category</p>
        <form action="create.php" method="post">
            <div class="row m-4">
                <input type="number" name="id_category" class="form-control" placeholder="Id category">
            </div>
            <div class="row m-4">
                <input type="text" name="nom_category" class="form-control" placeholder="Nom Category">

            </div>
       
            <div class="row m-4">
                <input type="text" name="nom_produit" class="form-control" placeholder="Nom Product">

            </div>
            <div class="row m-4">
                <input type="text" name="description_produit" class="form-control" placeholder="Description Product">
            </div>
            <div class="row m-4">
                <input type="number" name="id_category_produit" class="form-control " placeholder="Id Category for Product">
            </div>
            <div class="row m-4">
                <button type="submit" name="submit" class="btn btn-primary " style="margin: 0 auto; display :block">Submit</button>

            </div>
        </form>

    </div>
    </div>
</body>

</html>