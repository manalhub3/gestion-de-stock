<?php
$conn = new mysqli("localhost", "root", "", "insea_1a");


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
} else {
    echo "Connexion réussie.<br>";
}

$fournisseurs = [];
$result = $conn->query("SELECT id_fourniseur, responsable FROM fournisseurs");

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fournisseurs[] = $row;
        }
        echo "Fournisseurs récupérés avec succès.<br>";
    } else {
        echo "Aucun fournisseur trouvé.<br>";
    }
} else {
    echo "Erreur lors de la récupération des fournisseurs : " . $conn->error . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre_code = isset($_POST['pre_code']) ? $_POST['pre_code'] : '';
    $prod_design = isset($_POST['prod_design']) ? $_POST['prod_design'] : '';
    $prod_prix_A = isset($_POST['prod_prix_A']) ? $_POST['prod_prix_A'] : 0;
    $prod_merge = isset($_POST['prod_merge']) ? $_POST['prod_merge'] : NULL;
    $prod_quantite = isset($_POST['prod_quantite']) ? $_POST['prod_quantite'] : 0;
    $prod_seuil = isset($_POST['prod_seuil']) ? $_POST['prod_seuil'] : 0;
    $id_fourniseur = isset($_POST['id_fourniseur']) ? $_POST['id_fourniseur'] : 0;

    echo "Données du formulaire récupérées.<br>";

    $stmt = $conn->prepare("INSERT INTO stock (pre_code, prod_design, prod_prix_A, prod_merge, prod_quantite, prod_seuil, id_fourniseur) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsiii", $pre_code, $prod_design, $prod_prix_A, $prod_merge, $prod_quantite, $prod_seuil, $id_fourniseur);

    if ($stmt->execute()) {
        echo "Nouvel enregistrement créé avec succès.<br>";
    } else {
        echo "Erreur : " . $stmt->error . "<br>";
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <style>
        /* Styles généraux */
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

.services, .products, .product-form {
    padding: 50px 20px;
    background-color: #ffffff;
    color: #333;
    margin-top: 20px;
}

.services h2, .products h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 2em;
    color: #0073e6;
}

.product-form form {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-top: 20px;
    font-size: 1.2rem;
}

input[type="text"], select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    margin-top: 5px;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
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

.back-to-home {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0073e6;
    color: #ffffff;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.back-to-home:hover {
    background-color: #005bb5;
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
                
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Ajouter un produit</h1>
    </section>

    <section class="product-form">
        <form method="POST" action="add.php">
            <label for="pre_code">Code du produit</label>
            <input type="text" id="pre_code" name="pre_code" required>

            <label for="prod_design">Désignation</label>
            <input type="text" id="prod_design" name="prod_design" required>

            <label for="prod_prix_A">Prix</label>
            <input type="text" id="prod_prix_A" name="prod_prix_A" required>

            <label for="prod_merge">Marge</label>
            <input type="text" id="marge" name="marge" required>

            <label for="prod_quantite">Quantité en stock</label>
            <input type="text" id="prod_quantite" name="prod_quantite" required>

            <label for="prod_seuil">Seuil</label>
            <input type="text" id="prod_seuil" name="prod_seuil" required>

            <label for="id_fourniseur">Fournisseur</label>
            <select id="id_fourniseur" name="id_fourniseur" required>
            <option value="">Sélectionner un fournisseur</option>
  <?php while ($rowfourniseur = mysqli_fetch_assoc($resultfournisseurs)) { ?>
    <option value="<?php echo $rowfourniseur["id_fourniseur"]; ?>"><?php echo $rowfourniseur["raison_soc"];
     ?></option>
  <?php } ?>
            </select>

            <button type="submit">Ajouter</button>
        </form>
    </section>
    
    <footer>
        <p>&copy; 2024 The Manal's. Tous droits réservés.</p>
    </footer>
</body>
</html>
