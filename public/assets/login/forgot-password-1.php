<?php  
include_once("config.php");

session_start();
?>
<?php
// Turn off all error reporting
error_reporting(0);
?>

<!doctype html>
<html class="no-js" lang="">



<head>
	<meta charset="utf-8">
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
</head>

<body>
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

		<div class="fxt-bg-overlay" data-bg-image="img/elements/overlay.png">
			<div class="fxt-content">
				<div class="fxt-header">
				<a href="login-23.php" class="fxt-logo"><!--<img src="img/logo-23.png" alt="Logo">--></a>
				</div>
				<div class="fxt-form">
					<p>Recover your password</p>
					<form method="POST">
                
                    <div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input type="text" id="code" class="form-control" name="code" placeholder="code" required="required">
							</div>
						</div>
						</div>
                        
						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-4">
                            <button type="submit" class="fxt-btn-fill" name="submit" >login</button>
							</div>
						</div>
                        <?php
        

 
      
        if(isset($_POST['submit']))
        {$code=$_POST['code'];
          $email=$_SESSION['email'];
          $usr_info=mysqli_query($conn, "select * from `users` where `email`='$email' ");
          $usr= mysqli_fetch_assoc($usr_info);
		  try
		  {
                             if($usr['key']==0)
							 {
								echo '<div class="alert alert-danger">
								<span> the verification code is expired you should resend a new one  !!</span>
								<a href="forgot-password-23.php">click here to recover password</a>
							   </div>';
							
							 }
							 elseif($usr['key']==$code)
                             {
                              echo '<div class="alert alert-success">
                              <span>verification code is correct .</span>
                             </div>';
                             mysqli_query($conn,"UPDATE `users` SET `key`='0' WHERE email='$email'");
							 
                             header('refresh:2; url= forgot-password-2.php');
                             }
                             elseif($usr['key']!=$code)
                             {
                              echo '<div class="alert alert-danger">
                              <span>verification code incorrect .</span>
                             </div>'; 
  
                             }
							 

					}
							 catch(Expextion $e)
			{
				echo '<div class="alert alert-danger">
                              <span> the verification code is expired you should resend a new one  !!</span>
							  <a href="forgot-password-23.php">click here to recover password</a>
                             </div>';
							 
			}	
  
        }
                         ?>
                        <div class="fxt-footer">
					<div class="fxt-transformY-50 fxt-transition-delay-9">
						<p>Don't have an account?<a href="register-23.php" class="switcher-text2 inline-text">Register</a></p>
					</div>
				    </div>
					</form>
				</div>
				
			</div>
		</div>

        


	</section>
	<!-- jquery-->
	<script src="js/jquery-3.5.0.min.js"></script>
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

	<script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/forgot-password-23.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 10:45:53 GMT -->
</html>