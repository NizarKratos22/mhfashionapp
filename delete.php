<?php 
include ("config.php");
$rn=$_GET['rn'];
$query="DELETE from produit where ref='$rn'";
$data=mysqli_query($conn,$query);
if($data){
    echo "<script>alert('produit a supprimé avec succes')</script>";
?>
<meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppression.php"> 
<?php

}else{
    echo "<script>alert('error de la suppression')</script>";
    ?>
    <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppression.php">
    <?php
}






?>
