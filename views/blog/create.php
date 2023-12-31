<?php
include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {

    $id = mysqli_real_escape_string($connexion, $_POST['id']);
    $nom_blog = mysqli_real_escape_string($connexion, $_POST['nom']);
    $description_blog = mysqli_real_escape_string($connexion, $_POST['description']);
    $author_blog = mysqli_real_escape_string($connexion, $_POST['id_user']);
    $sql = "INSERT INTO `blog`(`nom`, `description`, `id_user`) VALUES ('$nom_blog', '$description_blog', '$author_blog')";

    $result = $connexion->query($sql);

    if ($result) {
        header('Location:show.php');
    } else {
        echo "Error from insert produit: " . $connexion->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Blog Page</title>
</head>

<body>


    <div class="container mt-4">

        <a href="show.php" class="btn btn-primary">view all blogs</a>

        <h1 class="text-capitalize text-center">Blog management system </h1>
        <p class="text-capitalize text-center">insert a values from Blog</p>
        <form action="create.php" method="post">
            <div class="row">

                <div class="col">
                    <input type="text" name="nom" class="form-control" placeholder="Nom blog">
                </div>
            </div>
            <div class="row m-4">
                <textarea name="description" placeholder="Description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="row mt-4">

                <div class="col">
                    <input type="number" name="id_user" class="form-control" placeholder="nom author">
                </div>
            </div>
            <div class="row mt-4">

                <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>
    </div>


    <script src="../../public/js/script.js"></script>
</body>

</html>