<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "management";    

    $connexion = new mysqli($servername, $username, $password, $dbname);

    if($connexion->connect_error){
        die('error connection here '. $connexion->connect_error);
    } 
    
    else {
        echo 'connection worked successfully';
    }



?>