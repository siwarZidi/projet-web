<?php
// Récupérer les valeurs du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];

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
$sql = "INSERT INTO comments (name,email,subject,message) VALUES ('$name', '$email','$subject','$msg')";

// Exécuter la requête SQL
if (mysqli_query($conn, $sql)) {
    header("Location: contact.php?success=Your message has been sent successfully");
    exit();
}else {
    header("Location: contact.php?error=Please try again");
    exit();
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>