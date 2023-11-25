<?php
include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPwd = $_POST['confirmPassword'];


    if ($password !== $confirmPwd) {
        echo "Password does not match. Please try again.";
    } else {
        $sql = "INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`)
                VALUES ('$id', '$firstName', '$lastName', '$email', '$password')";

        $result = $connexion->query($sql);
        $path = "../login/signin.php";

        if ($result) {
            echo "Registration done successfully!";
            header("Location: " . $path);
            exit();
        } else {
            echo "Something went wrong while registration!<br>";
            echo "Error Description: " . $connexion->error;
        }
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

    .container {
        padding: 16px;
        background-color: white;
    }

    input[type=text],
    input[type=password],
    input[type=number]  {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        width: fit-content;
        border: none;
        cursor: pointer;
        width: 100%;
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
</style>

<body>
    <h2>User Registration Form</h2>



    <form action="signup.php" method="post">
        Id: <input type="number" name="id"><br>
        First Name: <input type="text" name="firstName"><br>
        Last Name: <input type="text" name="lastName"><br>
        Email: <input type="text" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Confirm Password: <input type="password" name="confirmPassword" required><br>

        <button class="registerbtn" type="submit" name="submit">Register</button>
        <hr>

        <p>Already registered? <a href="login.php">Login</a></p>
    </form>
</body>

</html>