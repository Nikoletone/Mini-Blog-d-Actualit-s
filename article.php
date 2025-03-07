<?php
require_once 'connection_BDD.php';

/**
 * Redirige vers la page d'accueil si le paramètre 'id' n'est pas défini ou n'est pas numérique.
 * 
 * Ce script vérifie si le paramètre 'id' est présent dans l'URL et s'il s'agit d'une valeur numérique.
 * Si le paramètre 'id' est manquant ou non numérique, l'utilisateur est redirigé vers la page d'accueil.
 * 
 * 
 */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
} else {
    /**
     * Récupère un article de la base de données en fonction de l'ID fourni.
     * 
     * L'ID est obtenu à partir de la requête GET et est assaini en utilisant strip_tags.
     * Une requête préparée est utilisée pour sélectionner l'article dans la base de données.
     * Si l'article n'est pas trouvé, l'utilisateur est redirigé vers la page d'accueil.
     * 
     * @var string $id L'ID de l'article obtenu à partir de la requête GET.
     * @var PDOStatement $requette_selection_article La requête préparée pour sélectionner l'article.
     * @var object|false $article L'objet article récupéré ou false si non trouvé.
     */

    $id = strip_tags($_GET['id']);
    $requette_selection_article = $conn->prepare('SELECT * FROM articles WHERE id = :id');
    $requette_selection_article->execute(array('id' => $id));
    $requette_selection_article->setFetchMode(PDO::FETCH_OBJ);
    $article = $requette_selection_article->fetch();

    if (!$article) {
        header('Location: index.php');
        exit();
    }
}

require_once 'menu_burger.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->titre ?></title>
</head>
<body>
    <main>
        <div>
            <h1><?= $article->titre?></h1>
            <p><?= $article->contenu?></p>
            <p><?= $article->categorie?></p>
            <!-- ici on afiche la date de publication en jour moi et année  -->
            <time datetime="<?= $article->date_publication?>">
                Publié le <?= date('d/m/Y', strtotime($article->date_publication))?> 
            </time>
            <br>
            <a href="index.php"> Revenir a l'Accueil</a>
        </div>
    </main>
</body>
</html>
