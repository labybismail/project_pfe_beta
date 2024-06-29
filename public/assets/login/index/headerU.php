<?php  
include_once("config.php");

?>
       <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Apex Css -->
		<link rel="stylesheet" href="assets/plugins/apex/apexcharts.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
<!-- Header -->
<header class="header">

				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index.php" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="has-submenu">
								<!--home modified from drop down to simple button-->
								<a href="index.php">Home </i></a>
								<ul class=submenu>    </ul>
							</li>
							<!--new  profil-->
							<li class="has-submenu">
							   <a href="patient-dashboard.php"> Profile </a> 
							   <ul class="submenu"></ul>

                            </li>
                            <!--Favorite-->
							<li class="has-submenu" id="Favourites">
								<a href="favourites.php">Favourites</a>
								<ul class="submenu"></ul>	
							</li>	
							<!--Clinic with two option-->
							<li class="has-submenu">
								<a href="#">Clinic</a>

								<ul class="submenu">
									<li><a href="clinic-priver.php">Clinic 1</a></li>
									<li><a href="clinic-etatique.php">Clinic 2</a></li>
								</ul>
							</li>	

							<!--doctor with two option-->
							<li class="has-submenu">
								<a href="search.php">Search Doctors </a>
								<ul class="submenu"></ul>
							</li>	
							<li class="has-submenu">
								<a href="contact.php">Contact Us </a>
								<ul class="submenu"></ul>
							</li>

							<li class="has-submenu" style="border-bottom: none;">
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

	@media only screen and (max-width: 1265px) {
	.goog-te-combo{
		width: 140px;
		
	}
}
	@media only screen and (max-width: 1088px) {
	.goog-te-combo{
		width: 200px;
		
	}

}
</style>
<section class="fxt-template-animation fxt-template-layout23" data-bg-image="img/figure/bg23-l.jpg">
   
<div id="google_translate_element" style="margin-top: 28px; margin-left: 18px;"></div>
   
  <script type="text/javascript">
    function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
  </script>
 

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<!-- end translate dropdown -->
							</li>
							
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="<?php  echo $_SESSION['image']?>" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="<?php  echo $_SESSION['image']?>" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6><?php echo $_SESSION['name'].'&nbsp'.$_SESSION['surname']?></h6>
										
										<p class="text-muted mb-0"><?php  echo $_SESSION['usertype']?> </p>
									</div>
								</div>
								<a class="dropdown-item" href="patient-dashboard.php">Dashboard</a>
								<a class="dropdown-item" href="profile-settings.php">Profile Settings</a>
								<a class="dropdown-item" href="..\logout.php?id=<?php $_SESSION['id'];?>" >Logout</a>
								
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
				<!-- /Header -->






				