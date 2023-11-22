<?php
include '../../database/DbConnection.php';

if (isset($_POST['submit'])) {

    $id_produit = $_POST['id_produit'];
    $nom_produit = $_POST['nom_produit'];
    $description_produit = $_POST['description_produit'];

    $sql = "UPDATE `produit` SET `nom`='$nom_produit', `description`='$description_produit' WHERE `id`='$id_produit'";

    $result = $connexion->query($sql);

    if ($result) {
        header('Location: show.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connexion->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Update Product</title>
</head>

<body>

    <div class="container mt-4">
        <h1 class="text-capitalize text-center">Product Management System</h1>
        <p class="text-capitalize text-center">Update product values</p>
        <form action="edit.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                $produit_id = $_GET['id'];
                $sql = "SELECT * FROM `produit` WHERE `id`='$produit_id'";
                $result = $connexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id_produit = $row['id'];
                        $nom_produit = $row['nom'];
                        $description_produit = $row['description'];
                    }
                }
            }
            ?>
            <div class="row">
                <div class="col">
                    <input type="number" name="id_produit" value="<?php echo $id_produit; ?>" class="form-control" placeholder="Product ID">
                </div>
                <div class="col">
                    <input type="text" name="nom_produit" value="<?php echo $nom_produit; ?>" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <input type="text" class="form-control" name="description_produit" value="<?php echo $description_produit; ?>" placeholder="Product Description">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-4">Update Product</button>
        </form>
    </div>

</body>

</html>
