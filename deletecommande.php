<?php 
include ("config.php");

$id=$_GET['id'];
$ref=$_GET['ref'];

$query="DELETE from commande where id='$id' and ref='$ref'";
$data=mysqli_query($conn,$query);
if($data){
    echo "<script>alert('commande a été supprimé avec succes')</script>";
?>
<meta http-equiv="REFRESH" content="0; url=suppressioncommande.php"> 
<?php

}else{
    echo "<script>alert('error de la suppression de commande')</script>";
    ?>
    <meta http-equiv="REFRESH" content="0; url=suppressioncommande.php">
    <?php
}
?>
