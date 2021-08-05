<?php 
include ("config.php");
?>
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
    <form method="POST" action="invoice.php">

    <table class="tableaffi">
        <tr>
            <th>Numéro de telephone</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Opération</th>
</tr>
</form>
  <?php 
      $sql="SELECT * from client;";
      $res= mysqli_query($conn,$sql);
      $rescheck=mysqli_num_rows($res);

      if($rescheck>0){
          while ($row=mysqli_fetch_assoc($res)){
              echo "<tr><td>".$row["id"]."</td><td>".$row["prenom"]."</td><td>".$row["nom"]."</td><td>".$row["adresse"]."</td>
                      <td><a href='invoice.php?ref=$row[id]'><button type='button' id='facturebtn'> Facture pdf</button></a></td></tr>";

          }
          echo "</table>";

       }else {
           echo "<script>alert('Aucun client Confirmé une commande')</script>"; 
       }


  ?>
<a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>

</body>

</html>