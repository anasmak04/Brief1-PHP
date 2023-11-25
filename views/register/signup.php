<?php

include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`)
            VALUES ('$id', '$firstName', '$lastName', '$email', '$password')";

    $result = $connexion->query($sql);
    $path = "../login/signin.php";

    if ($result) {
        echo "Registration done successfully!";
        header("location:" . $path);
    } else {
        echo "Something went wrong while registration!<br>";
        echo "Error Description: " . $connexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>
    <h2>User Registration Form</h2>



    <form action="signup.php" method="post">
        Id: <input type="number" name="id"><br>
        First Name: <input type="text" name="firstName"><br>
        Last Name: <input type="text" name="lastName"><br>
        Email: <input type="text" name="email" required><br>
        Password: <input type="password" name="password" required><br>

        <button type="submit" name="submit">Register</button>
        <hr>

        <p>Already registered? <a href="login.php">Login</a></p>
    </form>
</body>

</html>