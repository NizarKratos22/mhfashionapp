<?php 
include ("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ajout dun commande</title>
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
  
    <form action="commande2.php" method="POST">
   <div class="container">
       
   <label for="id">Numéro de tlf :</label><input type="text" name="id" maxlength="8" placeholder="Numéro de tlf" required><br/>
   <label for="ref">réference de produit</label><input type="text" name="ref" maxlength="4" placeholder="ref" required><br/>
   <label for="quantite">quantite</label><input type="numerique" name="quantite" maxlength="2" placeholder="quantite de commande" required><br/>
   <label for="prixtotal">prix total</label><input type="numerique" name="prixtotal" placeholder="prix totale" required><br/>
   <label for="confirmation">Confirmation:</label>
            <select name="confirmation">
            <option value="Enattend">En attend</option>
            <option value="Confirme">Confirmé</option>
            <option value="Occuper">Occuper</option>
            </select>
            </br>
   <input type="submit" name="submit" value="Ajouter">
   
</div>
   
</form>

            <?php 
               if(isset($_POST['submit'])){

                 $id=$_POST['id'];
                 $ref=$_POST['ref'];
                 $quantite=$_POST['quantite'];
                 $prixtotal=$_POST['prixtotal'];
                 $confirmation=$_POST['confirmation'];
                 $conn=mysqli_connect("localhost","root","","mhfashion");
                 $res =mysqli_query($conn,"insert into commande values('$id','$ref','$quantite','$prixtotal','$confirmation')");
                 $req1 = "SELECT quantite  
                 FROm commande 
                 where ref='$ref' and id='$id'; ";


                 $req2="SELECT quantite 
                 from  produit 
                 where ref='$ref';";        

                 $res1=mysqli_query($conn,$req1);

                 $res2=mysqli_query($conn,$req2);

                 if($res && ($res2<$res1 || $res2==$res1)){
                      
      
                        echo"<script>alert('commande validé')</script>";
                       
                          ?>
                    <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressioncommande.php">
                  <?php 
                     }else{
                         echo"<script>alert('repture de stock de produit ou error de reference')</script>";
                         ?>
                       <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressionclient.php"> 
                       <?php
            }
                 ?>
                 <?php 
               }else {
                 echo "ERROR DE LA BD ";
               }  ?>
                 

                 
               

<a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>



</html>