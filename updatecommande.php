<?php 
include ("config.php");
$id=$_GET['id'];
$ref=$_GET['ref'];
$quantite=$_GET['quantite'];
$prixtotal=$_GET['prixtotal'];
$confirmation=$_GET['confirmation'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Modification de la commande</title>
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
       
   <label for="id">Numéro de tlf :</label><input type="text" value="<?php echo "$id" ?>" name="id" maxlength="8"  required><br/>
   <label for="ref">Réference de Produit :</label><input type="text" value="<?php echo "$ref" ?>" name="ref" maxlength="4"  required><br/>
   <label for="quantite">Quantite</label><input type="numerique" name="quantite" value="<?php echo "$quantite" ?>" maxlength="15"  required><br/>
   <label for="prixototal">PrixTotale :</label><input type="text" value="<?php echo "$prixtotal" ?>" name="prixtotal"  required><br/>
   <label for="confirmation">Confirmation:</label>
            <select name="confirmation">
                <option value="<?php echo "$confirmation"?>"><?php echo "$confirmation"?></option>
            <option value="Enattend">En attend</option>
            <option value="Confirme">Confirmé</option>
            <option value="Occuper">Occuper</option>
            </select>
            </br>
  
   <input type="submit" name="modifier" value="Modifier">
   
</div>
   
</form>

<?php 

if ($_GET['modifier']){
  
        
        $id=$_GET['id'];
        $ref=$_GET['ref'];
        $quantite=$_GET['quantite'];
        $prixtotal=$_GET['prixtotal'];
        $confirmation=$_GET['confirmation'];

        
        $query="UPDATE commande  
                set id='$id',ref='$ref',quantite='$quantite',prixtotal='$prixtotal',confirmation='$confirmation'
                where id='$id' and ref='$ref' ;";
       
       $data=mysqli_query($conn,$query);

        if ($data){
            $req = "SELECT count(*)  
                                FROm commande 
                                where 
                                id='$id'
                                and ref='$ref' and
                                confirmation='confirme';  ";

                        $req3="SELECT count (quantite) 
                               from  produit 
                               where ref='$ref';";        
                        $res=mysqli_query($conn,$req);
                        $res3=mysqli_query($conn,$req3);

                        if($res>$res3){
                            $req2="UPDATE produit 
                                   set quantite=quantite-'$quantite'
                                   where ref='$ref' ;" ;
                         $res2=mysqli_query($conn,$req2);
                            if($res2){
                                echo"<script>alert('mise a jour terminer de produit')</script>";
                            }else{
                                echo"<script>alert('echec de mise a jour ')</script>";
                            }
                        
                        }else{
                            echo"<script>alert('Repture de stock de produit  ')</script>";
                        }       

                    ?>
                    <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressioncommande.php">
                    <?php
                 }else{
                    echo "<script>alert('Echec de la confirmation de commande')</script>"; ; 
                    ?>
                    <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressioncommande.php"> 
                    <?php
                 }


               }else {
                  
                  echo "error de la base de donnée"; }
        
             



            ?>


<a href="http://localhost/mhfashion/suppressioncommande.php"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>



</html>