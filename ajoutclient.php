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
       
   <label for="id">Numéro de tlf :</label><input type="text" name="id" maxlength="8" placeholder="Numéro de tlf" required><br/>
   <label for="prenom">Prénom :</label><input type="text" name="prenom" placeholder="Prénom" required><br/>
   <label for="nom">Nom :</label><input type="text" name="nom" maxlength="15" placeholder="Nom" required><br/>
   <label for="adresse">Adresse :</label><input type="text" name="adresse" placeholder="Adresse" required><br/>
   <input type="submit" name="submit" value="Ajouter">
   
</div>
   
</form>

            <?php 
               if(isset($_POST['submit'])){
                 $id=$_POST['id'];
                 $prenom=$_POST['prenom'];
                 $nom=$_POST['nom'];
                 $adresse=$_POST['adresse'];
                $res =mysqli_query($conn,"insert into client values('$id','$prenom','$nom','$adresse')");
                 if ($res){
                    echo "<script>alert('ajout avec succes check affichage de Client')</script>";
                    ?>
                    <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/ajoutclient.php">
                    <?php
                 }else{
                    echo "<script>alert('Echec de lajout de Client')</script>"; ; 
                    ?>
                    <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/ajout.php"> 
                    <?php
                 }


               }else {
                  
                  echo "error de la base de donnée"; }
        
             



            ?>


<a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>



</html>