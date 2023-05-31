<!DOCTYPE html>
<html>
<head>
    <title>shopping cart</title>
    <link href="css/style.css" rel="stylesheet">
    <style>
        h2{
            font-size: 50px;
            text-align: center;
            color: #c17a74;
        }
        body {
            background-image: url('img/back.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-size: 30px;
            color: #bd2130;
        }

    </style>


</head>
<body>
<br>
<div class="col-lg-3 d-none d-lg-block">
    <a href="index.html" class="text-decoration-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1" >S&J</span>Fashion</h1>
    </a>
</div>
<h2>Here is your shopping cart</h2>
<?php

    // Connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $nomBaseDeDonnees = "web";

    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Requête pour récupérer les utilisateurs
$requete = "SELECT  * FROM orders";
$resultat = $connexion->query($requete);

// Vérifier si des résultats ont été obtenus
if ($resultat->num_rows > 0) {
// Parcourir les lignes de résultats
while ($row = $resultat->fetch_assoc()) {

echo $row["value"] ;
echo "<hr>";
}

} else {
echo "Order not found .";
}

// Fermer la connexion à la base de données
$connexion->close();
?>

</body>
</html>