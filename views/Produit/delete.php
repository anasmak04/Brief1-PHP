<?php
include '../../database/DbConnection.php';

if (isset($_GET['id'])) {
    $product_id =mysqli_real_escape_string($connexion ,  $_GET['id']); 
    $sql = "DELETE FROM `produit` WHERE id='$product_id'";
    $result = $connexion->query($sql);

    if ($result) {
        header('Location: show.php'); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connexion->error;
    }
} else {
    echo "No product ID provided for deletion.";
}
?>
