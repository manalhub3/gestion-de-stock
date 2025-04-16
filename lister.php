<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height : 2;
            color : green;
            margin: 4;
            padding: 2;
        }

        header {
            background-color: purple; /* couleur palegoldenrod */
            color: palegoldenrod; 
            font-size: x-large;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px; /* ajout d'une marge top pour éviter le chevauchement avec l'en-tête fixe */
        }

        th, td {
            border: 1px solid #000; /* ajout d'une bordure */
            padding: 8px; /* ajout de marge interne */
            text-align: center; /* centrage du contenu */
        }

        th {
            background-color: paleturquoise; 
        }

        a {
            text-decoration: none;
        }

        button {
            padding: 5px 10px; 
            margin: 0 5px; 
            border: none; 
            border-radius: 3px;
            cursor: pointer; 
            background-color: #f0f8ff; 
        }

        button:hover {
            background-color: #add8e6; 
        }
    </style>
</head>
<body>
    <header>La liste des produits</header>
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
    <br>
    <br>
    <p style="text-align: center;">
        <a href="ajouter.php">
            <img src="image/add.jpeg" width="15%" alt="Ajouter un produit">
        </a>
    </p>
</body>
</html>
