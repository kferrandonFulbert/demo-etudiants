<?php
// Connexion à la base de données MySQL en utilisant PDO
$server = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "auth";

try {
    $bdd = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
    // Définir le mode d'erreur de PDO à Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Vérification des informations de connexion dans la base de données
    $requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $requete->execute([$email]);
    $utilisateur = $requete->fetch();

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
        // Authentification réussie, rediriger vers le tableau de bord
        header("Location: dashboard.php");
        exit();
    } else {
        // Informer l'utilisateur que les informations de connexion sont incorrectes
        $message_erreur = "Adresse email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="connexion.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="mot_de_passe">Mot de passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
        
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
