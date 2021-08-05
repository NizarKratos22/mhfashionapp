<?php 
 include ("config.php");
 ?>
<html>
<head>
<title>Affichage des Commandes</title>
<link rel="stylesheet" href="style.css">
<style>
img{
                position: fixed;
                right:35;
                bottom:35;
            }
            #deletebtn{
            background-color: red;
              color: white;
              width: 120px;
              font-size: 18px;
              height: 35px;
              float: center;
          }
          #editbtn {
              background-color: green;
              color: white;
              width: 120px;
              font-size: 18px;
              height: 35px;
         
          }  
            </style>
</head>
<body>
    <form method="POST" action="deletecommande.php">

    <table class="tableaffi">
        <tr>
            <th>Numéro de telephone</th>
            <th>Prénom</th>
            <th>Réference de produit</th>
            <th>Quantite</th>
            <th>PrixTotal</th>
            <th>Confirmation</th>

            <th colspan="3">Opération</th>
</tr>
</form>
  <?php 
      $sql="SELECT *,prenom from commande,client;";
      $res= mysqli_query($conn,$sql);
      $rescheck=mysqli_num_rows($res);

      if($rescheck>0){
          while ($row=mysqli_fetch_assoc($res)){
              echo "<tr><td>".$row["id"]."</td><td>".$row["prenom"]."</td><td>".$row["ref"]."</td><td>".$row["quantite"]."</td><td>".$row["prixtotal"]."</td><td>".$row["confirmation"]."</td>
                      <td><a href='invoice.php?ref=$row[id]'><button type='button' id='facturebtn'> Facture pdf</button></a></td>
                      <td><a href='deletecommande.php?id=$row[id]&ref=$row[ref]' onclick='deletebtn()'><button type='button' id='deletebtn'>Supprimer</button></a></td>
                      <td><a href='updatecommande.php?id=$row[id]&ref=$row[ref]&quantite=$row[quantite]&prixtotal=$row[prixtotal]&confirmation=$row[confirmation]'><button type='button' id='editbtn'>Modifier</button></a></tr>";

          }
          echo "</table>";

       }else {
           echo "<script>alert('Aucun commande ')</script>"; 
       }


  ?>

  <script>
       function deletebtn(){
           return confirm("voulez vous supprimé ces données ?!!!");
       }
  </script>
<a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>

</body>

</html>