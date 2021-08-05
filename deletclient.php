<?php 
include ("config.php");

$rn=$_GET['rn'];
$query="DELETE from client where id='$rn'";
$data=mysqli_query($conn,$query);
if($data){
    echo "<script>alert('Client a supprimé avec succes')</script>";
?>
<meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressionclient.php"> 
<?php

}else{
    echo "<script>alert('error de la suppression de client')</script>";
    ?>
    <meta http-equiv="REFRESH" content="0; url=http://localhost/mhfashion/suppressionclient.php">
    <?php
}
?>
