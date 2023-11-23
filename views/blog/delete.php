<?php
include '../../database/DbConnection.php';

if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];
    $sql = "DELETE FROM `blog` WHERE id='$blog_id'";
    $result = $connexion->query($sql);

    if ($result ) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $connexion->error;
    }


    header('location:show.php');
}
?>

