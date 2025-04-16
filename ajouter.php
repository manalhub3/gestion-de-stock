<?php
include ("connexion.php");
$sqlfournisseurs = "SELECT id_fourniseur, raison_soc FROM fournisseur";
$resultfournisseurs = mysqli_query($conn, $sqlfournisseurs);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   
$code =$_POST['code'];
$designation =$_POST['designation'];
$prix =$_POST['prix'];
$marge =$_POST['marge'];
$quantite =$_POST['quantite'];
$seuil =$_POST['seuil'];
$id_fourniseur =$_POST['id_fournisseur'];
$sql ="INSERT INTO stock (pre_code, prod_design, prod_prix_A, Prod_merge, Prod_quantire, Prod_Seul, id_fournisseur) 
VALUES('$code', '$designation', '$prix', '$marge', '$quantite', '$seuil', '$id_fourniseur')";
echo $sql. "<br>";
$result = mysqli_query($conn, $sql);
if(!$result)
die("insertion failed".mysqli_connect_error());
header("location:lister.php?=$message");



}


?>
<!DOCTYPE html>
<html>
<style>
  form {
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

input[type=""]{
  
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

button[type="submit"]:hover {
  background-color: #444;
}
  </style>
<body>

<form method="POST" action="">

   <!-- id_Produit : <input type="" name="id_Produit"><br><br>-->

   <label for="code">Code: </label>
   <br>
     <input type="" name="code"><br><br>
     <label for=" Désignation:"> Désignation: </label>
   
   <br><input type="" name="designation"> <br><br>
   <label for="Prix: ">Prix:  </label>
  
   <br><input type="" name="prix"><br><br>
   <label for="  Marge: ">  Marge:  </label>
    
  
   <br><input type="" name="marge"><br><br>
   <label for=" Quantité en Stock : "> Quantité en Stock :  </label>
  
   <br><input type="" name="quantite"><br><br>
   <label for="   Seuil : ">   Seuil :  </label>
   <br><input type="" name="seuil"><br><br>
   <label for="Fournisseur :"> Fournisseur : </label>
   <br><select name="id_fournisseur" required>
  <option value="">Sélectionner un fournisseur</option>
  <?php while ($rowfournisseur = mysqli_fetch_assoc($resultFournisseur)) { ?>
    <option value="<?php echo $rowfournisseur["id_fournisseur"]; ?>"><?php echo $rowfournisseur["raison_soc"]; ?></option>
  <?php } ?>
</select>
<button type="submit">Submit</button>



</form>

</body>

</html>