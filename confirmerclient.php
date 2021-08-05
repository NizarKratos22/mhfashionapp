
<html>
<head>
<title>Affichage des Client</title>
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
            <th>Numéro de telephone</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>RefProduit</th>
            <th>Quantite</th>
            <th>PrixUnitaire</th>
</tr>
  <?php 
      $sql="select * from client;";
      $conn=mysqli_connect("localhost","root","","mhfashion");
      $res= mysqli_query($conn,$sql);
      $rescheck=mysqli_num_rows($res);

      if($rescheck>0){
          while ($row=mysqli_fetch_assoc($res)){
              echo "<tr><td>".$row["id"]."</td><td>".$row["prenom"]."</td><td>".$row["nom"]."</td><td>".$row["adresse"]."</td><td>".$row["ref"]."</td><td>".$row["quantite"]."</td><td>".$row["PrixUnitaire"]."</td></tr>";

          }
          echo "</table>";

       }else {
           echo "aucun client"; 
       }


  ?>
<a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
</body>

</html>