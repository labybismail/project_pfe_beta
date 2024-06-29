<?php
include_once("config.php");
$page = isset ($_GET['p'])? $_GET['p'] : '';    
if($page =='del'){
   $myid = $_POST ['id'];  
    $id= str_replace(' ',',', $myid); 
   $r2esult = mysqli_query($conn,"DELETE FROM `appointment` WHERE idapp in($id) ");
   
    
}
if($page =='del1'){
    $myid = $_POST ['id'];  
     $id= str_replace(' ',',', $myid); 
    $r2esult = mysqli_query($conn,"DELETE FROM `appointment` WHERE idapp in($id) ");
    
     
 }
 if($page =='del2'){
    $myid = $_POST ['id'];  
     $id= str_replace(' ',',', $myid); 
    $r2esult = mysqli_query($conn,"DELETE FROM `appointment` WHERE idapp in($id) ");
    
     
 }
 if($page =='del3'){
    $myid = $_POST ['id'];  
     $id= str_replace(' ',',', $myid); 
    $r2esult = mysqli_query($conn,"DELETE FROM `appointment` WHERE idapp in($id) ");
    
     
 }


?>