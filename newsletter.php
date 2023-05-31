<?php

$name = $_POST['name'];
$email = $_POST['email'];


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
$sql = "INSERT INTO newsletter (name,email) VALUES ('$name', '$email')";

// Exécuter la requête SQL
if (mysqli_query($conn, $sql)) {
    header("Location: contact.php?success=You have been subscribe successfully");
    exit();
}else {
    header("Location: contact.php?error=Please try again");
    exit();
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
