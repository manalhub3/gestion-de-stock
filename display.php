<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f5f5f5;
    color: #333;
}

header {
    background-color: #1c1c1c;
    display: flex;
    align-items: center;
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 100;
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
    color: #1e90ff;
}

.hero {
    background-color: #0073e6;
    color: #ffffff;
    padding: 50px 20px;
    text-align: center;
    margin-top: 60px; /* To ensure it doesn't overlap with the fixed header */
}

.hero h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.services {
    padding: 50px 20px;
    background-color: #ffffff;
    color: #333;
}

.services h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 2em;
    color: #0073e6;
}

.service {
    text-align: center;
    margin: 20px 0;
}

.service h3 {
    font-size: 1.5em;
    color: #1c1c1c;
    margin-bottom: 10px;
}

footer {
    background-color: #1c1c1c;
    color: #ffffff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    width: 100%;
    bottom: 0;
    box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
}

.product-list {
    padding: 50px 20px;
    background-color: #ffffff;
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #333;
    padding: 10px;
    text-align: center;
}

th {
    background-color: #0073e6;
    color: #ffffff;
}

button {
    padding: 5px 10px;
    margin: 0 5px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    background-color: #f0f8ff;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #add8e6;
}

a {
    text-decoration: none;
}

a img {
    border-radius: 5px;
    transition: transform 0.3s;
}

a img:hover {
    transform: scale(1.1);
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
                <li><a href="dispaly.php">Produits</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="hero">
        <h1>La liste des produits</h1>
    </section>

    <section class="product-list">
        <table>
            <thead>
                <tr>
                    <th>id_Produit</th>
                    <th>Prod_Code</th>
                    <th>Prod_Designation</th>
                    <th>Prod_Prix_A</th>
                    <th>Prod_Marge</th>
                    <th>Prod_Quantite_St</th>
                    <th>Prod_Seuil</th>
                    <th>id_Fournisseur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connexion.php");
                $sql = "SELECT * FROM stock ORDER BY id_Produit";
                $result = mysqli_query($conn, $sql);
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
                                <td>
                                    <button onclick=\"location.href='modifier.php?id=" . $row["id_produit"] . "'\">Modifier</button>
                                    <button onclick=\"location.href='supprimer.php?id=" . $row["id_produit"] . "'\">Supprimer</button>
                                    <button onclick=\"location.href='details.php?id=" . $row["id_produit"] . "'\">Détails</button>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Aucun enregistrement trouvé.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <p style="text-align: center;">
            <a href="display.php" class="btn">
            </a>
            <a href="menu4.html" class="back-to-home">Retour à l'accueil</a>
        </p>
    </section>
    
    <footer>
        <p>&copy; 2024 The Manal's. Tous droits réservés.</p>
    </footer>
</body>
</html>
