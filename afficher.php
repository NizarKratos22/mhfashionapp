<?php 
include ("config.php");
?>
<html>
<head>
<title>Affichage des produit</title>
<link rel="stylesheet" href="style.css">
<style>
img{
                position: fixed;
                right:35;
                bottom:35;
            }
            </style>
</head>
<body>

    <table class="tableaffi">
        <tr>
            <th>Reférence</th>
            <th>Nom du produit</th>
            <th>Coleur</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Taille</th>
            <th>Gatégorie</th>
</tr>
  <?php 
      $sql="SELECT * 
           from produit;";
      $res= mysqli_query($conn,$sql);
      $rescheck=mysqli_num_rows($res);

      if($rescheck>0){
          while ($row=mysqli_fetch_assoc($res)){
              echo "<tr><td>".$row["ref"]."</td><td>".$row["ndp"]."</td><td>".$row["coleur"]."</td><td>".$row["quantite"]."</td><td>".$row["prix"]."</td><td>".$row["taille"]."</td><td>".$row["gategorie"]."</td></tr>";

          }
          echo "</table>";

       }else {
           
           echo "<script>alert('aucun produit')</script>"; 
       }


  ?>
<a href="Accueil.htm"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>

</html>