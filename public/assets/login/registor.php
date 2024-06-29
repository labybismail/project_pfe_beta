<?php
include_once("config.php");
if(isset($_POST['submit']))
{
    $name =$_POST['name'];
    $surname =$_POST['surname'];
    $cin =$_POST['cin'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $codearia =$_POST['codearia'];
	$phone = $_POST['codearia'].$_POST['phone'];
	$gender=$_POST['gender'];
	$nowD = date('j F Y'); 
	$nowT = date('H:i:s'); 

$sql_email=mysqli_query($conn, "select * from `users` where `email`='$email' or `cin`='$cin' or `phone`='$phone' ");
$roow = mysqli_fetch_assoc($sql_email);
if ($roow['email']==$email )
{
 echo'<div class="alert alert-danger" role="alert">
 the email has been used before!
</div>';

}
elseif ($roow['phone']==$phone )
{
 echo'<div class="alert alert-danger" role="alert">
 the phone number has been used before!
</div>';

}
elseif ($roow['cin']==$cin )
{
 echo'<div class="alert alert-danger" role="alert">
the cin has been used before!
</div>';
   
}
elseif (mysqli_num_rows($sql_email) == 0 )
{
$insert = "insert into `users` (`name`,`surname`,`cin`,`phone`,`email`,`password`,`usertype`,`gender`,`date`,`time`) values('$name','$surname','$cin','$phone','$email','$password','user','$gender','$nowD','$nowT')";
$insert_sql =mysqli_query($conn,$insert);
$user_info=mysqli_query($conn, "select * from `users` where `email`='$email'");
$user= mysqli_fetch_assoc($user_info);
$_SESSION['id']=$user["IDusers"];
$_SESSION['name']=$user["name"];
$_SESSION['surname']=$user["surname"];
$_SESSION['cin']=$user["cin"];
$_SESSION['phone']=$user["phone"];
$_SESSION['email']=$user["email"];
$_SESSION['usertype']=$user["usertype"];
$_SESSION['gender']=$user["gender"];


   echo '<div class="alert alert-success" role="alert" >
    You have been successfully registered !!
  </div>';
  $pictureF = "patientF.jpg";
  $pictureM = "patientH.jpg";
  $idus=$_SESSION['id'];
  if($_SESSION['gender']=="female")
  {
  $chemain = "assets/img/patients/".$pictureF;	
  }	
  elseif($_SESSION['gender']=="male")
  {
	  $chemain = "assets/img/patients/".$pictureM;	
  }
  $db = mysqli_connect("localhost", "root", "", "login");



	  // Get all the submitted data from the form
	  $sql = "UPDATE users SET image = '$chemain' WHERE IDusers='$idus'";

	  // Execute query
	  mysqli_query($db, $sql);
?><meta http-equiv="Refresh" content="3; url=login-23.php"><?php
}
 
}

?>