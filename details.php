<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
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

        .product-details {
            max-width: 600px;
            margin: 80px auto 20px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product-name {
            font-size: 2rem;
            margin-top: 0;
            margin-bottom: 0.5rem;
            color: #007bff;
        }

        .product-description {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .product-features {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .product-features li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            color: #777;
        }

        .product-features li:last-child {
            border-bottom: none;
        }

        .back-btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .back-btn:hover {
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
        </ul>
    </nav>
</header>

<div class="product-details">
    <?php
    include("connexion.php");

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM stock WHERE id_Produit=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        
            echo "<h2 class='product-name'>Détails du Produit</h2>".
                "<ul class='product-features'>
                    <li>ID: " . $row["id_produit"] . "</li>
                    <li>Code: " . $row["pre_code"] . "</li>
                    <li>Désignation: " . $row["prod_design"] . "</li>
                    <li>Prix: " . $row["prod_prix_A"] . "</li>
                    <li>Marge: " . $row["prod_merge"] . "</li>
                    <li>Quantité en Stock: " . $row["prod_quantite"] . "</li>
                    <li>Seuil: " . $row["prod_seuil"] . "</li>
                    <li>ID Fournisseur: " . $row["id_fourniseur"] . "</li>
                </ul>";
        } else {
            echo "<p>Aucun produit trouvé avec cet identifiant.</p>";
        }
    } else {
        echo "<p>ID du produit non spécifié.</p>";
    }
    ?>
    <a href="dispaly.php" class="back-btn">Retour</a>
</div>

<footer>
    <p>&copy; 2024 The Manal's . Tous droits réservés.</p>
</footer>

</body>
</html>


