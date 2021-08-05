<?php 
include ("config.php");
$id=$_GET['id'];
$prenom=$_GET['prenom'];
$nom=$_GET['nom'];
$adresse=$_GET['adresse'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Modification de Client</title>
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
  
    <form action="updateclient.php" method="GET">
   <div class="container">
       
   <label for="id">Numéro de tlf :</label><input type="text" value="<?php echo "$id" ?>" name="id" maxlength="8"  required><br/>
   <label for="prenom">Prénom :</label><input type="text" value="<?php echo "$prenom" ?>" name="prenom"  required><br/>
   <label for="nom">Nom :</label><input type="text" name="nom" value="<?php echo "$nom" ?>" maxlength="15"  required><br/>
   <label for="adresse">Adresse :</label><input type="text" value="<?php echo "$adresse" ?>" name="adresse"  required><br/>
   

   <input type="submit" name="modifier" value="Modifier">
   
</div>
   
</form>

<?php 

if ($_GET['modifier']){
  
        
        $id=$_GET['id'];
        $prenom=$_GET['prenom'];
        $nom=$_GET['nom'];
        $adresse=$_GET['adresse'];

        
        $query="UPDATE client 
                set id='$id',prenom='$prenom',nom='$nom',adresse='$adresse'
                where id='$id';";

        $data=mysqli_query($conn,$query);
        if ($data){
            echo "<script>alert('modification terminer')</script>";
           ?>
           <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressionclient.php">
           <?php
        }else{
            echo "<script>alert('modification ERROR!!')</script>";

        }

    

}


?>

<a href="http://localhost/mhfashion/suppressionclient.php"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>



</html>