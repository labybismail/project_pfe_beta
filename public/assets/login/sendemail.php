<?php
use PHPMailer\PHPMailer\PHPMailer;
include_once("config.php");
session_start();
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  
  $email = $_POST['email'];
  $sql_mail=mysqli_query($conn, "select * from `users` where `email`='$email'  ");
  if(mysqli_num_rows($sql_mail) > 0 )

       {
  try{

$key = rand(0,100000);
    mysqli_query($conn,
"UPDATE `users` SET `key`='$key' WHERE email='$email'");









    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "mouad.riadi1998@gmail.com"; // Gmail address which you want to use as SMTP server
    $mail->Password = "Mouad.00"; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587' ;
 
    

    $mail->setFrom('mouad.riadi1998@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>your verification code is : $key </h3>";

    $mail->send();
    $user_info=mysqli_query($conn, "select * from `users` where `email`='$email' ");
	  $user= mysqli_fetch_assoc($user_info);
    $alert = '<div class="alert alert-success">
                 <span>Message Sent! check your inbox please.</span>
                </div>';
                $_SESSION['email'] = $user['email'];
                header('refresh:2; url= forgot-password-1.php');  
  } catch (Exception $e){
    $alert = '<div class="alert alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
       }
       elseif (mysqli_num_rows($sql_mail) == 0 )
       {
        $alert = '<div class="alert alert-danger">
        <span>The email address you entered isnt connected to an account.</span>
       </div>';

       }
}
?>
