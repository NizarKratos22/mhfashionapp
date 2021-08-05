<?php 
include ("config.php");
$ref=$_GET['ref'];
$ndp=$_GET['ndp'];
$coleur=$_GET['coleur'];
$quantite=$_GET['quantite'];
$prix=$_GET['prix'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Modification de Produit</title>
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
  
    <form action="" method="GET">
   <div class="container">
       
   <label for="ref">Reférence :</label><input type="text" value="<?php echo "$ref" ?>"  name="ref" maxlength="4"  required><br/>
   <label for="ndp">Nom du produit :</label><input type="text" value="<?php echo "$ndp" ?>" name="ndp"  required><br/>
   <label for="coleur">Coleur :</label><input type="text" value="<?php echo "$coleur" ?>" name="coleur" maxlength="15"  ><br/>
   <label for="quantite">Quantite :</label><input type="numerique" value="<?php echo "$quantite" ?>"  name="quantite" required><br/>
   <label for="prix"> Prix (Dt):</label><input type="numerique" value="<?php echo "$prix" ?>"  name="prix"  required><br/>
   <input type="submit" name="modifier" value="Modifier">

   
</div>

    </form>
    <a href="suppression.php"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
            </body>
</html>

<?php 
if ($_GET['modifier']){

        $ref=$_GET['ref'];
        $ndp=$_GET['ndp'];
        $coleur=$_GET['coleur'];
        $quantite=$_GET['quantite'];
        $prix=$_GET['prix'];

        $query="UPDATE produit 
                set ref='$ref',ndp='$ndp',coleur='$coleur',quantite='$quantite',prix='$prix'
                where ref='$ref'; ";

        $data=mysqli_query($conn,$query);
        if ($data){
            echo "<script>alert('modification activé')</script>";
           ?>
           <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppression.php">
           <?php
        }else{
            echo "<script>alert('modification ERROR!!')</script>";

        }

    

}


?>