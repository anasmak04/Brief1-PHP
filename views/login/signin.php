<?php

include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";

    $result = $connexion->query($sql);
    $path = "../../index.php";
    if ($result) {
        header("location:".$path);
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

    <form action="signin.php" method="post">
        Email: <input type="text" name="email" required><br>
        Password: <input type="password" name="password" required><br>

        <button type="submit" name="submit">Register</button>
        <hr>

        <p>Already registered? <a href="login.php">Login</a></p>
    </form>
</body>

</html>