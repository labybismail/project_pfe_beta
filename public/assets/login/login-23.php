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
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
function Enabledisabletextbox(checkbox)
{
	if (checkbox.checked?true:false)
	{
		$( "#email" ).hide();
		$( "#phonee" ).show();
	}
	else
	{
		$( "#email" ).show();
		$( "#phonee" ).hide();
	}
}

</script>



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
  background-color: #09e5ab!important;
  border: 1px solid #09e5ab !important;
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
				
					<p>Login into your account</p>
					

					<form  method="POST" >
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
								<input   class="form-control" name="email" id="email" placeholder="Email"  value="<?php echo isset($_SESSION['email'])  ? $_SESSION['email']  : '';  ?>">
							</div>
						</div>
						
						<div class="form-group" id="phonee">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<input class="form-control" type="tel" id="phone"  name="phone" placeholder="Phone Number" style="width: 340px;padding-left: 94px;" >
							</div>
						</div>
						<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		           <script>
                      $( "#phonee" ).hide();
                  </script>
						
						<div class="checkbox" style="margin-bottom: 10px;">
										<input id="checkbox" type="checkbox" onclick="Enabledisabletextbox(this)" >
										<label for="checkbox">Use phone number </label>
									</div>
					
						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-2">
								<input id="password" type="password" class="form-control" name="password" placeholder="********" >
								<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
							</div>
						</div>
						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-3">
								<div class="fxt-checkbox-area">
									<a href="forgot-password-23.php" class="switcher-text">Forgot Password</a>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="fxt-transformY-50 fxt-transition-delay-4">
								<button type="submit" class="fxt-btn-fill" name="submit" style="height: 45px;">Log in</button>
							</div>
						</div>
<div id="log_result">
	




<?php
include_once('config.php');
if (isset($_POST['submit']))
{
$email = stripcslashes(mysqli_real_escape_string($conn,$_POST['email']));
$codearia =$_POST['codearia'];
$phone = $_POST['codearia'].$_POST['phone'];
$password = $_POST ['password'];

if (empty ($email) And empty($_POST ['phone'])){
    echo'<div class = "alert alert-danger"  role = "alert "> Please enter your email or your phone number   </div>  ';
	
                  }

elseif(empty($_POST['password'])){
    echo'<div class = "alert alert-danger"  role = "alert "> Please enter your password </div>  ';
}
else 
{
	$sql = mysqli_query($conn,"select * from `users` where (`email`= '$email' OR `phone`='$phone' ) AND `password`='$password'");
    $sl = mysqli_query($conn,"select * from `users` where (`email`= '$email' OR `phone`='$phone' ) AND `password`='$password'");
	$rw = mysqli_fetch_assoc($sl);
    if (mysqli_num_rows($sql) != 1 )
    {
        echo'<div class = "alert alert-danger"  role = "alert "> the email or password incorrect </div>  ';
		

    }
	elseif (mysqli_num_rows($sql) == 1 and $rw['block'] =="1" )
    {
        echo'<div class = "alert alert-danger"  role = "alert "> you have blocked by admin you can contact him for more information </div>  ';
		

    }
	elseif (mysqli_num_rows($sql) == 1  and $rw['block'] =="0"  )
	{
		$row = mysqli_fetch_assoc($sql);
		$_SESSION['id']=$row["IDusers"];
		$_SESSION['name']=$row["name"];
		$_SESSION['surname']=$row["surname"];
		$_SESSION['cin']=$row["cin"];
		$_SESSION['phone']=$row["phone"];
		$_SESSION['email']=$row["email"];
		$_SESSION['usertype']=$row["usertype"];
		$_SESSION['image']=$row["image"];
		$_SESSION['timestamp']=time();
		if ($row["usertype"]=="user")
		{
		echo '<div class="alert alert-success" role="alert" >
        You have been successfully logged in like user !!
      </div>';

	  ?><meta http-equiv="Refresh" content="2; url=index\index.php"><?php
	    }
		elseif($row["usertype"]=="admin")
		{
			echo '<div class="alert alert-success" role="alert" >
			You have been successfully logged in like admin !!
		  </div>';
		  ?><meta http-equiv="Refresh" content="2; url=index\admin\index.php"><?php
		}
		elseif($row["usertype"]=="doctor")
		{
			echo '<div class="alert alert-success" role="alert" >
			You have been successfully logged in like Doctor !!
		  </div>';
		  ?><meta http-equiv="Refresh" content="2; url=index\index.php"><?php
		}
		
	
		
	}
	


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
						<h3>  follow us </h3>
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
						<p>Don't have an account?<a href="register-23.php" class="switcher-text2 inline-text">Register</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="js/site_js.min.js"></script>
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


</body>



</html>


<?php close_DB(); ?>