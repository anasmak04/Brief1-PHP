<?php
include "../../database/DbConnection.php";

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPwd = $_POST['confirmPassword'];


    if ($password !== $confirmPwd) {
        echo "Password does not match. Please try again.";
    } else {
        $sql = "INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `confirmPassword`)
                VALUES ('$firstName', '$lastName', '$email', '$password' , '$confirmPwd')";

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

    

   form{
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

    h2,p{
        text-align: center;
    }
</style>

<body>
    <h2>User Registration Form</h2>



    <form action="signup.php" method="post">
   <input type="text" name="firstName" placeholder="Enter your firstName"><br>
        <input type="text" name="lastName" placeholder="Enter your lastName"><br>
        <input type="text" name="email" required placeholder="Enter your Email"><br>
        <input type="password" name="password" required placeholder="Enter your password"><br>
         <input type="password" name="confirmPassword" required placeholder="confrm your password"><br>

        <button class="registerbtn" type="submit" name="submit">Register</button>
        <hr>

        <p>Already registered? <a href="login.php">Login</a></p>
    </form>
</body>

</html>