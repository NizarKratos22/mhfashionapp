<?php 

$req="SELECT count(*)
       FROM ";



if(isset($_POST['search'])){
    $valuetosearch=$_POST['valuetosearch'];
    $query="SELECT * FROM `client` WHERE concat(`id`, `prenom`, `nom`, `adresse`) like '%".$valuetosearch."%'";
    $search_res=filtertable($query);
}else{
 $query="SELECT * from client";
 $search_res=filtertable($query);


}
function filtertable($query){
    $conn=mysqli_connect("sql11.freemysqlhosting.net","sql11408914","5awz7VpVen","sql11408914"); 
    $filter_res=mysqli_query($conn,$query);
    return $filter_res;

}

?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">

        <link rel="stylesheet" href="style.css">

        <title>Filtrage de Client</title>
        <style>
            img{
                position: fixed;
                right:35;
                bottom:35;
            }
            input{
                margin:0px 0px 0px 800px; 
                }

            </style>
    </head>
    <body>
        <form action="rechercheclient.php" method="POST">
            <input type="text" name="valuetosearch" placeholder="info pour le produit">
            <br/>
            <input type="submit" name="search" value="filter">
            <br/>
            <table class="tableaffi">
            <tr>
            <th>Numéro de télèphone</th>
            <th>Prénom</th>
            <th>Nom	</th>
            <th>Adresse</th>
            <th>Nombre de commande </th>
            </tr>
            <?php while($row=mysqli_fetch_array($search_res)):?>

                <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['prenom'];?></td>
                  <td><?php echo $row['nom'];?></td>
                  <td><?php echo $row['adresse'];?></td>
                </tr>

                <?php endwhile;?>
            </table>
           
        </form>
        <a href="http://localhost/mhfashion/AccueilClient.html"><img src="retour.png" title="Retour vers la menu de produit" width="70px" height="70px" ></a>
    </body>
</html>