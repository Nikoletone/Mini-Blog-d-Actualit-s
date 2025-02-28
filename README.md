## prochaine étapes:
 - ajouter un bouton de deconnection dans la nav
 - faire ensorte que quand je clique sur ajouter un article une page s'affiche sur la page déjà en encore d'utilisation et pas que ce soit une redirection
 - faire en sorte que que l'admin puisse avoir le '' ajouter un article '' .
 - travailler le style ainsi que les interaction utilisateurs




# Mini-Blog-d-Actualit-s
mettre en pratiques les choses apprise en cours.
Objectifs
  -Créer et connecter une base de données MySQL avec PDO.
  -Réaliser un formulaire de soumission d’articles (POST) avec validation.
  -Afficher une liste dynamique d’articles depuis la base (GET) à l’aide de boucles.
  -Implémenter la navigation entre une page d’affichage global et une page de détail d’article.
  -(Optionnel) Utiliser des sessions pour simuler une connexion utilisateur et afficher un message personnalisé.


les technologie utliser:
  -PHP
  -MySQL
  -HTML
  -CSS
  -JavaScript (je sais pas encore si je vais l'utiliser)
  -Apache
  -phpmyadmin
  -VS Code
  -Git 


  ## Installation

1. Clonez le dépôt sur votre machine locale :

    ```sh
    git clone https://github.com/<votre-nom-utilisateur>/TD-Mini-Blog-d-Actualites.git
    ```

2. Accédez au répertoire du projet :

    ```sh
    cd TD-Mini-Blog-d-Actualites
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
4. **Déconnexion** : Utilisez le formulaire de déconnexion sur la page d'accueil pour vous déconnecter.

## Structure du projet

- [`index.php`](index.php ) : Page d'accueil affichant les articles.
- [`inscription.php`](inscription.php ) : Page d'inscription pour les nouveaux utilisateurs.
- [`connection.php`](connection.php ) : Page de connexion pour les utilisateurs existants.
- [`article.php`](article.php ) : Page affichant le contenu d'un article spécifique.
- [`connection_BDD.php`](connection_BDD.php ) : Fichier de configuration de la connexion à la base de données.
- [`header.php`](header.php ) : En-tête du site.
- [`footer.php`](footer.php ) : Pied de page du site.

## Contribuer

Les contributions sont les bienvenues ! Veuillez soumettre une pull request pour toute amélioration ou correction de bug, comme je suis debutante je prend tout conseil et/ou subjection.


