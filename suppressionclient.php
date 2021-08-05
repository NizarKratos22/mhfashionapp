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
                right:0;
                bottom:0;
               
            }
          #editbtn {
              background-color: green;
              color: white;
              width: 120px;
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
          #commandebtn{
            background-color: lightblue;
              color: white;
              width: 120px;
              font-size: 18px;
              height: 35px;
              float: center; 
          }
            </style>
</head>
<body>
    <form action="deletclient.php" method="GET">

    <table class="tableaffi">
        <tr>
            <th>Numéro  de télèphone</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th colspan="4">Opération</th>
</tr>
</form>
<a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
  <?php 
      $sql="select * from client ;";
      
      $res= mysqli_query($conn,$sql);
      $rescheck=mysqli_num_rows($res);
      if($rescheck>0){
          while ($row2=mysqli_fetch_assoc($res)){

            
    
              echo "<tr><td>".$row2["id"]."</td>
                        <td>".$row2["prenom"]."</td>
                        <td>".$row2["nom"]."</td>
                        <td>".$row2["adresse"]."</td>
           <td><a href='commande3.php?rn=$row2[id]'><button type='button' id='commandebtn'>Commander</button></a></td>   
           <td><a href='updateclient.php?id=$row2[id]&prenom=$row2[prenom]&nom=$row2[nom]&adresse=$row2[adresse]'><button type='button'  id='editbtn'>Edit/Modifier</button></a></td>
           <td><a href='deletclient.php?rn=$row2[id]' onclick='return checkdelete()'><button type='button' id='deletebtn'>Supprimer</button></a></td>
           </tr>";
             
          }
          echo "</table>";

       }else {
           echo "<script>alert('aucun Client')</script>"; 
       }


  ?>

<script>
    function checkdelete(){
        return confirm("voulez vous supprimer ces données !?");
    }
    function checkconfirm(){
        return confirm("Voulez vous confirmer ces données !?");

    }
</script>
</body>

</html>