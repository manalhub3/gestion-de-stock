<?php
include("connexion.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM stock WHERE id_Produit=$id";
    $result = mysqli_query($conn, $sql);
    $produit = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nouveauCode = $_POST["nouveau_code"];
        $nouvelleDesignation = $_POST["nouvelle_designation"];
        $nouveauPrix = $_POST["nouveau_prix"];
        $nouvelleMarge = $_POST["nouvelle_marge"];
        $nouvelleQuantite = $_POST["nouvelle_quantite"];
        $nouveauSeuil = $_POST["nouveau_seuil"];

        $sql = "UPDATE stock SET 
                pre_code='$nouveauCode', 
                prod_design='$nouvelleDesignation', 
                prod_prix_A=$nouveauPrix, 
                prod_merge=$nouvelleMarge, 
                prod_quantite=$nouvelleQuantite, 
                prod_seuil=$nouveauSeuil 
                WHERE id_Produit=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Produit mis à jour avec succès.";
            header("Location: display.php"); 
            exit();
        } else {
            echo "Erreur lors de la mise à jour du produit: " . $conn->error;
        }
    }
} else {
    echo "ID du produit non spécifié.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
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

form {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-top: 10px;
    text-align: left;
}

input[type="text"], input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    margin-top: 20px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    margin-top: 20px;
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
        <h2>Modifier Produit</h2>
        <form method="post" action="">
            Code Produit: <input type="text" name="nouveau_code" value="<?php echo $produit['pre_code']; ?>"><br><br>
            Désignation: <input type="text" name="nouvelle_designation" value="<?php echo $produit['prod_design']; ?>"><br><br>
            Prix: <input type="text" name="nouveau_prix" value="<?php echo $produit['prod_prix_A']; ?>"><br><br>
            Marge: <input type="text" name="nouvelle_marge" value="<?php echo $produit['prod_merge']; ?>"><br><br>
            Quantité: <input type="text" name="nouvelle_quantite" value="<?php echo $produit['prod_quantite']; ?>"><br><br>
            Seuil: <input type="text" name="nouveau_seuil" value="<?php echo $produit['prod_seuil']; ?>"><br><br>
            <input type="submit" value="Mettre à Jour">
        </form>
        <a href="display.php" class="btn">Retour à la liste des produits</a>
        <a href="imenu4.html" class="btn">Retour à la page d'accueil</a>
    </div>
</section>

<footer>
    <p>&copy; 2024 The Manal's . Tous droits réservés.</p>
</footer>

</body>
</html>
