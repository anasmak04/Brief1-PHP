<?php

include '../../database/DbConnection.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`)
            VALUES ('$id', '$firstName', '$lastName', '$email', '$password')";

    $result = $connexion->query($sql);

    if ($result === TRUE) {
        echo "New user created successfully.";
    } else {
        echo "Error: " . $connexion->error;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>user managment</title>
</head>

<body>



    <div class="container mt-4">

    <a href="show.php">view all users</a>

        <h1 class="text-capitalize text-center">user management system </h1>
        <p class="text-capitalize text-center">insert a values from user</p>
        <form action="create.php" method="post">
            <div class="row">
                <div class="col">
                    <input type="number" name="id" class="form-control" placeholder="Id user">
                </div>
                <div class="col">
                    <input type="text" name="firstName" class="form-control" placeholder="First name">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <input type="text" class="form-control" name="lastName" placeholder="Last name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-4 ">Sign in</button>
        </form>
    </div>
    </div>

</body>

</html>