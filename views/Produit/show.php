<?php
include "../../database/DbConnection.php";


$sql1 = "SELECT * FROM `category`";

$result1 = $connexion->query($sql1);

$sql = "SELECT * FROM `produit`";

$result = $connexion->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show all products</title>
</head>

<body>


    <?php
    if ($result1->num_rows > 0) {
        print '<select name="category" id="category"  class="form-select" aria-label="Default select example">';

        while ($row = $result1->fetch_assoc()) {
            print '<option value="">' . $row['nom_category']  . '</option>';
        }
        print '</select>';
    } else {
        echo "No categories found";
    }
    ?>


</body>

</html>