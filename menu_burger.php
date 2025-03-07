<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_menu-burger.css">
    <title><nav-burger></nav-burger></title>

</head>
<body>
<header>
     <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="submit.php">Ajouter un article</a></li>
                <li><a href="tout_articles.php">Blog</a></li>
                <form method="post">
                <input type="submit" name="deconnection" value="Se déconnecter">
                <?php
                        if (isset($_POST["deconnection"])) {
                            session_destroy();
                            header("Location: connection.php"); 
                        }
                ?>  

            </ul>
        </nav>
        <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
        </button>
     </header>
</body>
<script src="test.js"></script>
</html>
