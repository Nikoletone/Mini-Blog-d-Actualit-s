<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: connection.php');
    exit();
}

require_once 'connection_BDD.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $user_name = htmlspecialchars($user['prenom']);
} else {
    // Si l'utilisateur n'est pas trouvé dans la base de données, détruire la session et rediriger
    session_destroy();
    header('Location: connection.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    
    <?php
    
    /**
     * Ce script se connecte à la base de données et récupère tous les articles.
     * 
     * - Nécessite le fichier 'connection_BDD.php' pour établir une connexion à la base de données.
     * - Prépare et exécute une requête SQL pour sélectionner tous les enregistrements de la table 'articles'.
     * - Définit le mode de récupération pour obtenir des objets.
     * - Récupère tous les articles et les stocke dans la variable $listes_acticles.
     * 
     * Variables:
     * - $requette_selection: 
     * - $listes_acticles: 
     */
    require_once 'connection_BDD.php';

    $requette_selection = $conn->prepare('SELECT * FROM articles');
    $requette_selection->execute();
    $requette_selection->setFetchMode(PDO::FETCH_OBJ);
    $listes_acticles = $requette_selection->fetchAll();
    ?>
    <?php require_once 'header.php'; ?>
    <main>
    <h1>Accueil</h1>
    <p>Bienvenue <?= $_SESSION['prenom']?> sur mon site</p>
    <br>

    <ul>
        <h1>Articles</h1>
        <?php foreach($listes_acticles as $liste_article): ?>
            <li>
                <h2><?= $liste_article->titre ?></h2>
                <p><?= $liste_article->contenu ?></p>
                <p><?= $liste_article->categorie ?></p>
                <p><?= $liste_article->date_publication ?></p>
                <a href="article.php?id=<?= $liste_article->id ?>">Voir plus</a>
            </li>
        <?php endforeach; ?>
    </ul>
    </main>
    <?php require_once 'footer.php'; ?>
</body>
</html>