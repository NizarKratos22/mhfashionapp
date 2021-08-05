<?php

include ("config.php");
$id=$_GET['rn'];
$query="SELECT id 
       from `client`
       where id='$id';";
$query2="SELECT ref
          from `produit`;";

$query3="SELECT quantite
         from `produit` ; " ;         
$res=mysqli_query($conn,$query);
$res2=mysqli_query($conn,$query2);
$res3=mysqli_query($conn,$query3);

?>




<!DOCTYPE html>
<html>

 <head>
    <meta charset="UTF-8">
    <title>Commande de produit</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
            img{
                position: fixed;
                right:35;
                bottom:35;
                margin:280px 0px 0px 850px;            }
            body{
                margin-left:700px;
                margin-top:270px;   
               }
            </style>
</head>
    

    <body>

     <form method="POST"  action="">

        <!--selection de numéro de tlf-->
        <label for="id">Numéro de telephone :</label>
        <select name="id">
            <?php while($row = mysqli_fetch_array($res)):;?>
            <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
            <?php endwhile ;?>
            </select></br>
        </select></br>

 
                <!--selection de refence de produit-->
                <label for="ref">Réference de Produit :</label>
            <select name="ref">
            <?php while($row2 = mysqli_fetch_array($res2)):;?>
            <option value="<?php echo $row2[0];?>"><?php echo $row2[0];?></option>
            <?php endwhile ;?>
            </select></br>

         

         
            <!--selection de quantite-->

      
      
         <label for="quantite">Quantite :</label> 
           <input type="Nomber" maxlength="2" placeholder="Quantite de produit" name="quantite" required>
                </br>




            <!--saisir de montant totale de produit-->



            
            <label for="prixtotal">PrixTotal</label>
            <input type="numerique" placeholder="saisir de montant" name="prixtotal" required>
        </br>
     



            <!--confirmation Status-->
            <label for="confirmation">Confirmation:</label>
            <select name="confirmation">
            <option value="Enattend">En attend</option>
            <option value="Confirme">Confirmé</option>
            <option value="Occuper">Occuper</option>
            </select>
            </br>


            <input type="submit" name="commande" value="Commander">
 
  

</form>
<?php 
    
            if(isset($_POST['commande'])){
                
               $id=$_POST['id'];
               $ref=$_POST['ref'];
               $quantite=$_POST['quantite'];
               $prixtotal=$_POST['prixtotal'];
               $confirmation=$_POST['confirmation'];
               
            $req=mysqli_query($mysql,"insert into commande values ('$id','$ref','$quantite','$prixtotal','$confirmation')");
            if($req){

                echo "<script>alert('la commande a bien récu')</script>";


            }else
            {
                echo"<script>alert('Echec de la commande')</script>";

            }

            
        }else{
                echo"ECHEC DE LA BASE DE DONNEE ";
            }



           ?>
<a href="http://localhost/mhfashion/suppressionclient.php"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
    </body>
    </html>