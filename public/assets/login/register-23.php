<?php  

include_once("config.php");
session_start();
?>

<!doctype html>
<html class="no-js" lang="" style="height: 100%;margin-top: -40px;" >


	
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="build/css/intlTelInput.css">
    <link rel="stylesheet" href="build/css/demo.css">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Xmee | Login and Register Form Html Templates</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="font/flaticon.css">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style.css">
	<script src="build/js/intlTelInput.js"></script>
</head>

<body>

	<section  class="fxt-template-animation fxt-template-layout23" data-bg-image="img/figure/bg23-l.jpg">
<!--translate dropdown -->
<style type="text/css">
.translated-ltr{margin-top:-40px;}
.translated-ltr{margin-top:-40px;}
.goog-te-banner-frame {display: none;margin-top:-20px;}

.goog-logo-link {
   display:none !important;
} 

.goog-te-gadget{
   color: transparent !important;
}

.goog-te-combo{
  background-color: rgb(0 225 255)!important;
  border: 1px solid rgb(18 230 247 / 0%) !important;
  padding: 5px!important;
  border-radius: 4px!important;
  font-size: 1rem!important;
  line-height:2rem!important;
  display: inline-block;
  cursor: pointer;
  zoom: 1;
  display:flex;
  flex-direction: column;
  position:relative;
  width:230px;
  height:30px;
  color:#fff;
}
</style>
<section class="fxt-template-animation fxt-template-layout23" data-bg-image="img/figure/bg23-l.jpg">
<center>      
<div id="google_translate_element"></div>
           
  <script type="text/javascript">
    function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
  </script>
  <?php
            setcookie('googtrans', '/fr');
    ?>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</center>
<!-- end translate dropdown -->
		<div class="fxt-bg-overlay" data-bg-image="img/elements/overlay.png">
			<div class="fxt-content">
				<div class="fxt-header">
					<a href="login-23.php" class="fxt-logo"><!--<img src="img/logo-23.png" alt="Logo">--></a>
				</div>
				<div class="fxt-form">
					<p>Register for create account</p>
					<form   method="POST" id="registor" >
						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input type="text" id="name" class="form-control" name="name" placeholder="Name" required="required">
							</div>
						</div>

						
						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input type="text" id="surname" class="form-control" name="surname" placeholder="Surname" required="required">
							</div>
						</div>

						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input type="text" id="cin" class="form-control" name="cin" placeholder="CNIE " required="required">
							</div>
						</div>

						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input type="tel" id="phone" class="form-control" name="phone" placeholder="Phone Number" required="required" style="width: 340px;padding-left: 94px;" >
							</div>
						</div>

						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
							<select id="gender" class="form-control" name="gender" placeholder="gender"  style ="background-color: #000509;" required>
							     <option value="">select Gender</option>
                                 <option value="male">Male</option>
                                 <option value="female">Female</option>
                               </select>
								
							</div>
						</div>

						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input type="text" id="codearia" class="form-control" name="codearia"  >
							</div>
							<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		           <script>
                      $( "#codearia" ).hide();
                  </script>

						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input type="email" id="email" class="form-control" name="email" placeholder="Email" required="required"  >
							</div>
						</div>
						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-2">
								<input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
								<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
							</div>
						</div>

						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-4">
								<button type="submit" name ="submit" class="fxt-btn-fill" style="height:45px;">Register</button>
							</div>
						</div>
<div id ="result"> 
<?php
include_once('config.php');
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

<?php  

include_once("phone.php");

?>

</div>			
					</form>

  
  

				</div>
				<div class="fxt-style-line">
					<div class="fxt-transformY-50 fxt-transition-delay-5">
						<h3>Follow us </h3>
					</div>
				</div>
				
				<ul class="fxt-socials">
					<li class="fxt-google">
						<div class="fxt-transformY-50 fxt-transition-delay-6">
							<a href="#" title="google"><i class="fab fa-google-plus-g"></i><span>Google +</span></a>
						</div>
					</li>
					<li class="fxt-twitter">
						<div class="fxt-transformY-50 fxt-transition-delay-7">
							<a href="#" title="twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
						</div>
					</li>
					<li class="fxt-facebook">
						<div class="fxt-transformY-50 fxt-transition-delay-8">
							<a href="#" title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
						</div>
					</li>
				</ul>
				<div class="fxt-footer">
					<div class="fxt-transformY-50 fxt-transition-delay-9">
						<p>Have an account?<a href="login-23.php" class="switcher-text2 inline-text">Log in</a></p>


					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="js/jquery-3.5.0.min.js"></script>
	<script src="js/site_js.min.js"></script>
	<!-- Popper js -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Imagesloaded js -->
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<!-- Validator js -->
	<script src="js/validator.min.js"></script>
	<!-- Custom Js -->
	<script src="js/main.js"></script>
	

</body>



</html>


<?php close_DB(); ?>