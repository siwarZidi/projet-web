<?php

$search = $_POST['search'];



// Connexion à la base de données

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "web";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}


// Requête SQL pour insérer les données dans la table appropriée
$sql = "INSERT INTO search (search) VALUES ('$search')";

// Exécuter la requête SQL
mysqli_query($conn, $sql);

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
