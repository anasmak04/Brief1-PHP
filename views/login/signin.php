<?php

include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";

    $result = $connexion->query($sql);
    $path = "../../index.php";
    if ($result) {
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

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }



    form {
        margin-top: 50px;
    }

    input[type=text],
    input[type=password],
    input[type=number] {
        width: 50%;
        padding: 15px;
        margin: 0 auto;
        display: block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 0 auto;
        display: block;
        border: none;
        cursor: pointer;
        width: 50%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    a {
        color: dodgerblue;
    }

    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }

    h2,
    p {
        text-align: center;
    }
</style>


<body>
    <h2>User Registration Form</h2>

    <form action="signin.php" method="post">
        <input type="text" name="email" required placeholder="enter your email"><br>
        <input type="password" name="password" required placeholder="enter your password"><br>

        <button class="registerbtn" type="submit" name="submit">Register</button>
        <hr>

        <p>You Don't have an account? <a href="login.php">Register</a></p>
    </form>
</body>

</html>