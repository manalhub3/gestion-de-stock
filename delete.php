<?php
include("connexion.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Supprimer le produit de la base de données
    $sql = "DELETE FROM stock WHERE id_Produit=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'>";
        echo "<h2>Produit supprimé avec succès.</h2>";
        echo "<a href='produits.html' class='btn'>Retour à la liste des produits</a>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<h2>Erreur lors de la suppression du produit.</h2>";
        echo "<p>Veuillez réessayer plus tard.</p>";
        echo "<a href='produits.html' class='btn'>Retour à la liste des produits</a>";
        echo "</div>";
    }
} else {
    echo "<div class='container'>";
    echo "<h2>ID du produit non spécifié.</h2>";
    echo "<p>Veuillez sélectionner un produit à supprimer.</p>";
    echo "<a href='produits.html' class='btn'>Retour à la liste des produits</a>";
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un Produit</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

header {
    background-color: #343a40;
    color: #fff;
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.logo-container {
    margin-right: auto;
}

.logo {
    height: 50px;
}

nav ul {
    list-style: none;
    display: flex;
    margin-left: auto;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #17a2b8;
}

.products {
    padding: 50px 20px;
    background-color: #ffffff;
    color: #333;
    margin-top: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

h2 {
    color: #007bff;
    margin-bottom: 20px;
}

p {
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

footer {
    background-color: #343a40;
    color: #ffffff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    width: 100%;
    bottom: 0;
    box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
}

    </style>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous d'ajuster le chemin vers votre fichier CSS -->
</head>
<body>

<header>
    <div class="logo-container">
        <img src="logo1.jpg" alt="Logo" class="logo">
    </div>
    <nav>
        <ul>
            <li><a href="menu4.html">Accueil</a></li>
            <li><a href="display.php">Produits</a></li>
            <li><a href="modifier2.php">Modifier un Produit</a></li>
            
        </ul>
    </nav>
</header>

<section class="products">
    <div class="container">
        <h2>Supprimer un Produit</h2>
        <?php
        include("connexion.php");

        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            // Supprimer le produit de la base de données
            $sql = "DELETE FROM stock WHERE id_Produit=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Produit supprimé avec succès.</p>";
            } else {
                echo "<p>Erreur lors de la suppression du produit. Veuillez réessayer plus tard.</p>";
            }
        } else {
            echo "<p>ID du produit non spécifié.</p>";
        }
        ?>
        <a href="display.php" class="btn">Retour à la liste des produits</a>
        <a href="menu4.html" class="btn">Retour à la page d'accueil</a>
    </div>
</section>

<footer>
    <p>&copy; 2024 The Manal's. Tous droits réservés.</p>
</footer>

</body>
</html>
