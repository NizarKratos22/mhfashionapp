<?php 
include ("config.php");
if(isset($_POST['search'])){
    $valuetosearch=$_POST['valuetosearch'];
    $query="SELECT * FROM `produit` WHERE concat(`ref`, `ndp`, `coleur`, `quantite`, `prix`, `taille`, `gategorie`) like '%".$valuetosearch."%'";
    $search_res=filtertable($query);
}else{
 $query="SELECT * from produit";
 $search_res=filtertable($query);


}
function filtertable($query){
    $filter_res=mysqli_query($conn,$query);
    return $filter_res;

}

?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">

        <link rel="stylesheet" href="style.css">

        <title>Filtrage de produit</title>
        <style>
            img{
                position: fixed;
                right:0;
                bottom:0;
                margin-bottom: 10px;
                margin-right:10px;
            }
            input{
                margin:0px 0px 0px 800px; 
                }

            </style>
    </head>
    <body>
        <form action="recherche.php" method="POST">
            <input type="text" name="valuetosearch" placeholder="info pour le produit">
            <br/>
            <input type="submit" name="search" value="filter">
            <br/>
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
            <?php while($row=mysqli_fetch_array($search_res)):?>
                <tr>
                  <td><?php echo $row['ref'];?></td>
                  <td><?php echo $row['ndp'];?></td>
                  <td><?php echo $row['coleur'];?></td>
                  <td><?php echo $row['quantite'];?></td>
                  <td><?php echo $row['prix'];?></td>
                  <td><?php echo $row['taille'];?></td>
                  <td><?php echo $row['gategorie'];?></td>
                </tr>

                <?php endwhile;?>
            </table>
           
        </form>
        <a href="Accueil.htm"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
    </body>
</html>