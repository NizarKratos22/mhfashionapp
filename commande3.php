<?php 
include ("config.php");
$id=$_GET['rn'];
$req="SELECT ref 
    from produit ;";
  
$res=mysqli_query($conn,$req);
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
                right:0;
                bottom:0;
                margin-right:15px;
               margin-bottom:35px;     
              }
            body{
                margin-left:450px;
                margin-top:210px;   
               }
            </style>
</head>
<body id="body1">
  
    <form action="commande2.php" method="POST">
   <div>
       
   <label for="id">Numéro de tlf :</label><input type="text" name="id" maxlength="8" placeholder="Numéro de tlf" value="<?php echo"$id" ?>" required><br/>
   <label for="ref">Réference de Produit :</label>
            <select name="ref">
            <?php while($row = mysqli_fetch_array($res)):;?>
            <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
            <?php endwhile ;?>
            </select></br>
 <label for="quantite">quantite :</label><input type="numerique" name="quantite" maxlength="2"  placeholder="quantite de commande" required><br/>



   <label for="prixtotal">Prix total :</label><input type="numerique" name="prixtotal" placeholder="prix totale" required><br/>
   <label for="confirmation">Confirmation:</label>
            <select name="confirmation">
            <option value="Enattend">En attend</option>
            <option value="Confirme">Confirmé</option>
            <option value="Occuper">Occuper</option>
            </select>
            </br>
   <input type="submit" name="submit" value="Ajouter">
   <input type="submit" name="autre" value="Commander une autre ?">

   
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
              

                 if ($res){
                  echo "<script>alert('commande validé')</script>";
                  ?>
                  <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressioncommande.php">
                  <?php
               }else{
                  echo "<script>alert('Echec de la commande')</script>"; ; 
                  ?>
                  <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressionclient.php"> 
                  <?php
               }


             }else {
                
                echo "error de la base de donnée"; }
      
           
                 ?>
             <?php 
                    if(isset($_POST['submit'])){

                     $id=$_POST['id'];
                     $ref=$_POST['ref'];
                     $quantite=$_POST['quantite'];
                     $prixtotal=$_POST['prixtotal'];
                     $confirmation=$_POST['confirmation'];
                     $conn=mysqli_connect("localhost","root","","mhfashion");
                     $res =mysqli_query($conn,"insert into commande values('$id','$ref','$quantite','$prixtotal','$confirmation')");
                  
    
                     if ($res){
                      echo "<script>alert('commande validé')</script>";
                      ?>
                      <a href='commande3.php?rn=$row2[id]' onclick='return checkdelete()'><button type='button' id='deletebtn'>Supprimer</button>
                      <?php
                   }else{
                      echo "<script>alert('Echec de la commande')</script>"; ; 
                      ?>
                      <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressionclient.php"> 
                      <?php
                   }
    
    
                 }else {
                    
                    echo "error de la base de donnée"; }
          
               
                     ?>
             ?>       
                 
               

<a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>



</html>