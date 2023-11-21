<?php
include '../../database/DbConnection.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id='$user_id'";
    $result = $connexion->query($sql);

    if ($result === TRUE) {
        echo "User deleted successfully.";
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
    <title>delete user</title>
</head>
<body>
    
    <h1 class="text-capitalize">user was deleted succesfully</h1>
    <a href="show.php">back to dashbord</a>
</body>
</html>