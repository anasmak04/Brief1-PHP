<?php
include '../../database/DbConnection.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    $sql = "UPDATE `user` SET `firstName`='$firstName', `lastName`='$lastName', `email`='$email' WHERE `id`='$id'";


    $result = $connexion->query($sql);

    if ($result === TRUE) {
        echo "User updated successfully.";
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

    <title>Update User</title>
</head>

<body>

    <div class="container mt-4">
        <h1 class="text-capitalize text-center">User Management System</h1>
        <p class="text-capitalize text-center">Update user values</p>
        <form action="edit.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM `user` WHERE `id`='$user_id'";
                $result = $connexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $email = $row['email'];
                        $id = $row['id'];
                    }
                }
            }
            ?>
            <div class="row">
                <div class="col">
                    <input type="number" name="id" value="<?php echo $id; ?>" class="form-control" placeholder="Id user">
                </div>
                <div class="col">
                    <input type="text" name="firstName" value="<?php echo $firstName; ?>" class="form-control" placeholder="First name">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>" placeholder="Last name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="email" value="<?php echo  $email; ?>" placeholder="Email">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-4 ">Update User</button>
        </form>
    </div>

</body>

</html>