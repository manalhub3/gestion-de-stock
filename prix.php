<?php
include("connexion.php");

$sql = "SELECT * FROM stock WHERE (prod_quantite >= 2*prod_seuil)";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits en Solde</title>
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
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

h2 {
    color: #007bff;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
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
    <link rel="stylesheet" href="styles.css"> 
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
        <h2>Produits en Solde</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Produit</th>
                    <th>Code Produit</th>
                    <th>Désignation</th>
                    <th>Prix</th>
                    <th>Marge</th>
                    <th>Quantité</th>
                    <th>Seuil</th>
                    <th>ID Fournisseur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $row["id_produit"] . "</td>
                                <td>" . $row["pre_code"] . "</td>
                                <td>" . $row["prod_design"] . "</td>
                                <td>" . $row["prod_prix_A"] . "</td>
                                <td>" . $row["prod_merge"] . "</td>
                                <td>" . $row["prod_quantite"] . "</td>
                                <td>" . $row["prod_seuil"] . "</td>
                                <td>" . $row["id_fourniseur"] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Aucun produit ne correspond aux critères.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="menu4.html" class="btn">Retour à la page d'accueil</a>
    </div>
</section>

<footer>
    <p>&copy; 2024 The Manal's. Tous droits réservés.</p>
</footer>

</body>
</html>
