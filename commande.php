<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "web";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $valeur) {
            // Insérer la valeur dans la base de données
            $requete = "INSERT INTO orders (value) VALUES (:valeur)";
            $statement = $connexion->prepare($requete);
            $statement->bindParam(':valeur', $valeur);
            $statement->execute();
        }
    }

    header("Location: shopping_cart.php?success=your order has been confirmed successfully");
    exit();
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$connexion = null;
?>