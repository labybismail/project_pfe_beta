<?php
use PHPMailer\PHPMailer\PHPMailer;
include_once("config.php");
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
session_start();
$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "mouad.riadi1998@gmail.com"; // Gmail address which you want to use as SMTP server
    $mail->Password = "Mouad.00"; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587' ;
 
    

    $mail->setFrom('mouad.riadi1998@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('mouad.riadi1998@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Us page)';
    $mail->Body = "<h3>Name : $name <br>Surname: $surname <br>Email : $email<br>Phone: $phone <br>subject: $subject <br>Message: $message <br></h3>";

    $mail->send();
    $alert = '<div class="alert alert-success" role="alert" >
    Message Sent! Thank you for contacting us.
</div>';
                
  } catch (Exception $e){
    $alert = '<div class="alert alert-danger" role="alert">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
