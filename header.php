<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> en tête</title>
</head>
<body>
    <header>
        <nav>
            <p>Bonjour <?= $_SESSION['prenom']?></p>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="submit.php">Ajouter un article</a></li>
                <li><a href="connection.php">Connexion</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>