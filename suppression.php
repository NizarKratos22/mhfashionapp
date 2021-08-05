<?php
include ("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Suppression des produit</title>
<link rel="stylesheet" href="style.css">
<style>
    img{
                position: fixed;
                right:35;
                bottom:35;
                margin:710px 0px 0px 1800px; 
            }
          #editbtn {
              background-color: green;
              color: white;
              width: 120px;
              margin:auto;
              font-size: 18px;
              height: 35px;
         
          }  
          #deletebtn{
            background-color: red;
              color: white;
              width: 120px;
              font-size: 18px;
              height: 35px;
              float: center;
          }
            </style>
</head>
<body>
    <form action="delete.php" method="POST">

    <table class="tableaffi">
        <tr>
            <th>Reférence</th>
            <th>Nom du produit</th>
            <th>Coleur</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Taille</th>
            <th>Gatégorie</th>
            <th colspan="2">Opération</th>
</tr>
</form>
<a href="Accueil.htm"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
  <?php 
      $sql="select * from produit;";
      $res= mysqli_query($conn,$sql);
      $rescheck=mysqli_num_rows($res);

      if($rescheck>0){
          while ($row=mysqli_fetch_assoc($res)){
              echo "<tr><td>".$row["ref"]."</td><td>".$row["ndp"]."</td><td>".$row["coleur"]."</td><td>".$row["quantite"]."</td><td>".$row["prix"]."</td><td>".$row["taille"]."</td><td>".$row["gategorie"]."</td>
              <td><a href='update.php?ref=$row[ref]&ndp=$row[ndp]&coleur=$row[coleur]&quantite=$row[quantite]&prix=$row[prix]'><button type='button'  id='editbtn'>Edit/Modifier</button></a></td>
              <td><a href='delete.php?rn=$row[ref]' onclick='return checkdelete()'><button type='button' id='deletebtn'>Supprimer</button></a></td></tr>";

          }
          echo "</table>";

       }else {

           echo "<script>alert('aucun produit')</script>"; 
       }


  ?>

<script>
    function checkdelete(){
        return confirm("voulez vous supprimer ces données !?");
    }
</script>
</body>

</html>