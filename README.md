## prochaine étapes:
 - faire en sorte que que l'admin puisse avoir le '' ajouter un article '' .
 - continue travailler le style ainsi que les interaction utilisateurs 




# Mini Blog d’Actualités

Ce projet est un mini blog d'actualités développé en PHP. Il permet aux utilisateurs de s'inscrire, de se connecter, de consulter des articles et de les ajouter.

## Prérequis

- PHP 7.4 ou supérieur
- MySQL
- Serveur web (Apache, Nginx, etc.)
- Composer (optionnel)

## Installation

1. Clonez le dépôt sur votre machine locale :

    ```sh
    git clone https://github.com/Nikoletone/Mini-Blog-d-Actualit-s.git
    ```

2. Accédez au répertoire du projet :

    ```sh
    cd Mini-Blog-d-Actualit-s
    ```

3. Configurez votre base de données MySQL :

    - Créez une base de données nommée `mini_blog`.
    - Importez le fichier `database.sql` pour créer les tables nécessaires.

    ```sql
    CREATE DATABASE mini_blog;
    USE mini_blog;

    CREATE TABLE utilisateurs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        mot_de_passe VARCHAR(255) NOT NULL
    );

    CREATE TABLE articles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(255) NOT NULL,
        contenu TEXT NOT NULL,
        categorie VARCHAR(255) NOT NULL,
        date_publication DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    ```

4. Configurez votre serveur web pour pointer vers le répertoire du projet.

5. Mettez à jour les informations de connexion à la base de données dans le fichier [`connection_BDD.php`](connection_BDD.php ) :

    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password1 = "";
    $dbname = "mini_blog";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password1);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES utf8");
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
    ?>
    ```

## Utilisation

1. **Inscription** : Accédez à la page [`inscription.php`](inscription.php ) pour créer un nouveau compte utilisateur.
2. **Connexion** : Accédez à la page [`connection.php`](connection.php ) pour vous connecter avec vos identifiants.
3. **Accueil** : Une fois connecté, vous serez redirigé vers la page [`index.php`](index.php ) où vous pourrez consulter les articles.
4. **Ajouter un article** : Accédez à la page [`submit.php`](submit.php ) pour ajouter un nouvel article.
5. **Déconnexion** : Utilisez le formulaire de déconnexion sur la page d'accueil pour vous déconnecter.

## Structure du projet

- [`index.php`](index.php ) : Page d'accueil affichant les articles.
- [`inscription.php`](inscription.php ) : Page d'inscription pour les nouveaux utilisateurs.
- [`connection.php`](connection.php ) : Page de connexion pour les utilisateurs existants.
- [`article.php`](article.php ) : Page affichant le contenu d'un article spécifique.
- [`submit.php`](submit.php ) : Page permettant d'ajouter un nouvel article.
- [`connection_BDD.php`](connection_BDD.php ) : Fichier de configuration de la connexion à la base de données.
- [`menu_burger.php`](menu_burger.php ) : Fichier contenant le menu de navigation.
- [`style_menu-burger.css`](style_menu-burger.css ) : Fichier CSS pour le style du menu de navigation.
- [`test.js`](test.js ) : Fichier JavaScript pour ajouter des fonctionnalités interactives au menu de navigation.

## Contribuer

Les contributions sont les bienvenues ! Veuillez soumettre une pull request pour toute amélioration ou correction de bug.

## Licence

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.

