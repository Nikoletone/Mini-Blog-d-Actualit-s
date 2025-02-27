
<?php
require_once 'connection_BDD.php';

if (isset($_POST['Ajouter'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $categorie = $_POST['categorie'];
    try {
    $requete_insertion = $conn->prepare('INSERT INTO articles (titre, contenu, categorie) VALUES(:titre, :contenu, :categorie)');
    $requete_insertion->execute(
        array(
            'titre' => $titre, 
            'contenu'=> $contenu,
            'categorie'=> $categorie
        )
    );
    $requete_insertion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Article ajouté avec succès";
}catch (Exception $e) {
     echo "Erreur lors de l'ajout de l'article: " . $e->getMessage();
 }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sumission d'articles</title>
</head>
<body>
    <form method="post" action="submit.php">
        <fieldset>
            <legend>Ajouter des nouveaux articles</legend>
            <label for="titre" name="titre">Tite</label>
            <input type="text" name="titre" id="titre" required>
            <br>
            <label for="contenu" name="contenu">Contenu</label>
            <textarea name="contenu" id="contenu"  required></textarea>
            <br>
            <label for="categorie" name="categorie">categorie</label>
            <input type="text" name="categorie" id="categorie" required >
            <br>
            <input type="submit" value="Ajouter" name="Ajouter">
        </fieldset>
    </form>
</body>
</html>


