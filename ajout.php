<?php 
include ("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ajout dun produit</title>
    <style>
            img{
                position: fixed;
                right:35;
                bottom:35;
                margin:280px 0px 0px 950px;            }
            body{
                margin-left:700px;
                margin-top:270px;   
               }
            </style>
</head>
<body id="body1">
  
    <form action="" method="POST">
   <div class="container">
       
   <label for="ref">Reférence :</label><input type="text" name="ref" maxlength="4" placeholder="Réference" required><br/>
   <label for="ndp">Nom du produit :</label><input type="text" name="ndp" placeholder="Nom du produit" required><br/>
   <label for="coleur">Coleur :</label><input type="text" name="coleur" maxlength="15" placeholder="Coleur" required><br/>
   <label for="quantite">Quantite :</label><input type="numerique" name="quantite" placeholder="Quantité" required><br/>
   <label for="prix"> Prix (Dt):</label><input type="numerique" name="prix" placeholder="Prix en DT" required><br/>
   <label for="taille">Taille :</label><input type="text" maxlength="12" name="taille"><br/>
   <label for="gategorie">Gategorie:</label><input type="text" maxlength="50" name="gategorie"><br/>
   <input type="submit" name="submit" value="Ajouter">
   
</div>
   
</form>

            <?php 
               if(isset($_POST['submit'])){
                 $ref=$_POST['ref'];
                 $ndp=$_POST['ndp'];
                 $coleur=$_POST['coleur'];
                 $quantite=$_POST['quantite'];
                 $prix=$_POST['prix'];
                 $taille=$_POST['taille'];
                 $gategorie=$_POST['gategorie'];

                 $res =mysqli_query($conn,"insert into produit values('$ref','$ndp','$coleur','$quantite','$prix','$taille','$gategorie')");
                 if ($res){

                     echo "<script>alert('ajout avec succes check affichage de produit')</script>";
                  ?>
                 <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/ajout.php"> 
                 <?php 
                 }else{
                     echo "<script>alert('echec de lajout de produit')</script>" ; 
                     ?>
                     <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/ajout.php"> 
                     <?php
                 }


               }else {
                  
                  echo "error de la base de donnée"; }
        
             



            ?>


<a href="Accueil.htm"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>



</html>