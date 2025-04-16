<?php
include("connexion.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // Supprimer le produit de la base de données
    $sql = "DELETE FROM stock WHERE id_Produit=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produit supprimé avec succès.";
        header("Location: lister.php"); 
        exit();
    } else {
        echo "Erreur lors de la suppression du produit: " . $conn->error;
    }
} else {
    echo "ID du produit non spécifié.";
}

?>