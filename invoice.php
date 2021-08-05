<?php 
require('./fpdf.php');
$conn=mysqli_connect("localhost","root","","mhfashion");
error_reporting(0);
$req="SELECT * from client  ;";

$res=mysqli_query($conn,$req);
if($data){

      echo "WORKING";
}
?>  



 

