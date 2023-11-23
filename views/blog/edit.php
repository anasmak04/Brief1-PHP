<?php
include '../../database/DbConnection.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $author = $_POST['id_user'];
    $sql = "UPDATE `blog` SET `nom`='$nom', `description`='$description', `id_user` = '$author' WHERE `id`='$id'";

    $result = $connexion->query($sql);

    if (isset($result)) {
        header('location:show.php');
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

    <title>Update blog</title>
</head>

<body>

    <div class="container mt-4">
        <h1 class="text-capitalize text-center">blog Management System</h1>
        <p class="text-capitalize text-center">Update blog values</p>
        <form action="edit.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                $blog_id = $_GET['id'];
                $sql = "SELECT * FROM `blog` WHERE `id`='$blog_id'";
                $result = $connexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $nom = $row['nom'];
                        $description = $row['description'];
                        $author = $row['id_user'];
                    }
                }
            }
            ?>
            <div class="row">
                <div class="col">
                    <input type="number" name="id" value="<?php echo $id; ?>" class="form-control" placeholder="Id blog">
                </div>
                <div class="col">
                    <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" placeholder="nom blog">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>" placeholder="description">
                </div>
                <div class="col">
                    <input type="number" class="form-control" name="id_user" value="<?php echo  $author; ?>" placeholder="author">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-4 ">Update blog</button>
        </form>
    </div>

</body>

</html>