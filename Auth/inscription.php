<?php
// Connexion à la base de données
$server = "localhost";
$username = "root";
$password = "";
$database = "auth";
session_start();
try {
    $bdd = new PDO("mysql:host=$serveur;dbname=$database", $username, $password);
    // Définir le mode d'erreur de PDO à Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT); // Hashage du mot de passe

    // Insertion de l'utilisateur dans la base de données
    $requete = $bdd->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
    $requete->execute([$nom, $email, $mot_de_passe]);

    // Création de l'utilisateur dans MySQL
    $requete_create_user = $bdd->prepare("CREATE USER :email IDENTIFIED BY :email");
    $requete_create_user->execute(['email' => $email]);

    // Attribution des privilèges à l'utilisateur (vous pouvez ajuster selon vos besoins)
    $requete_grant_privileges = $bdd->prepare("GRANT SELECT ON auth.* TO :email");
    $requete_grant_privileges->execute(['email' => $email]);
    $_SESSION['email'] = $email;
    // Redirection vers une page de succès ou autre
    header("Location: connexion.php");
    exit();
}
