<?php
include '../../database/DbConnection.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id='$user_id'";
    $result = $connexion->query($sql);

    if ($result ) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $connexion->error;
    }


    header('location:show.php');
}
?>

