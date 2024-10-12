<?php
// Connexion à la base de données MySQL en utilisant PDO
$serveur = 'localhost';
$utilisateur = 'root';
$mot_de_passe = '';
$base_de_donnees = 'auth';
session_start();
try {
    $bdd = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $_SESSION['email'], $_SESSION['email']);
    // Définir le mode d'erreur de PDO à Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Récupérer l'identifiant de l'utilisateur actuellement connecté (vous devez implémenter la logique d'authentification)
$utilisateur_id = 1; // Par exemple, à remplacer par la vraie logique d'authentification

// Récupérer les préférences de paramétrage actuelles de l'utilisateur
$requete = $bdd->prepare("SELECT * FROM parametrage WHERE utilisateur_id = ?");
$requete->execute([$utilisateur_id]);
$parametrage = $requete->fetch();

// Traitement du formulaire de modification des préférences
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lignes_pagination = $_POST["lignes_pagination"];
    $style_css = $_POST["style_css"];
    $reseaux_sociaux_json = $_POST["reseaux_sociaux_json"];

    // Mettre à jour les préférences de paramétrage dans la base de données
    $requete_update = $bdd->prepare("UPDATE parametrage SET lignes_pagination = ?, style_css = ?, reseaux_sociaux_json = ? WHERE utilisateur_id = ?");
    $requete_update->execute([$lignes_pagination, $style_css, $reseaux_sociaux_json, $utilisateur_id]);

    // Redirection vers le tableau de bord avec un message de succès
    header("Location: dashboard.php?success=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h2>Tableau de bord</h2>
    <?php if (isset($_GET['success'])): ?>
        <p>Préférences mises à jour avec succès.</p>
    <?php endif; ?>
    <form action="dashboard.php" method="POST">
        <label for="lignes_pagination">Nombre de lignes pour la pagination:</label><br>
        <input type="number" id="lignes_pagination" name="lignes_pagination" value="<?php echo $parametrage['lignes_pagination']; ?>" required><br>
        
        <label for="style_css">Style CSS:</label><br>
        <input type="text" id="style_css" name="style_css" value="<?php echo $parametrage['style_css']; ?>"><br>
        
        <label for="reseaux_sociaux_json">Réseaux sociaux (JSON):</label><br>
        <textarea id="reseaux_sociaux_json" name="reseaux_sociaux_json"><?php echo $parametrage['reseaux_sociaux_json']; ?></textarea><br>
        
        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>
