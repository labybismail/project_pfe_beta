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
							<a href="#" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="has-submenu" id="home">
								<a href="index.php">Home </a>
								<ul class="submenu">
									<!--li><a href="doctor-dashboard.php">Doctor Dashboard</a></li
									<li><a href="appointments.php">Appointments</a></li>
									<li><a href="schedule-timings.php">Schedule Timing</a></li>
									<li><a href="my-patients.php">Patients List</a></li>
									<li><a href="patient-profile.php">Patients Profile</a></li>
									<li><a href="chat-doctor.php">Chat</a></li>
									<li><a href="invoices.php">Invoices</a></li>
									<li><a href="doctor-profile-settings.php">Profile Settings</a></li>
									<li><a href="reviews.php">Reviews</a></li>-->		
								</ul>
							</li>

                            <li class="has-submenu" id="ProfileD">
								<a href="doctor-dashboard.php" > Profile</a>
								<ul class="submenu">
									
								</ul>
                            </li>
							    <li class ="has-submenu" id="appointment">  
								 <a href="appointments.php"  id="appointment"> Appointment </a>
								 <ul class="submenu"></ul>
                                </li>	
								<li class ="has-submenu" id="mypateints">  
								 <a href="my-patients.php"  id="mypateints"> My Patients </a>
								 <ul class="submenu"></ul>
                                </li>
								
							  <li class="has-submenu">
								<a href="contact.php" > Contact us</a>
                                <ul class="submenu"></ul>
							  </li>
							  <li class="has-submenu" style="border-bottom: none;">
								<!--translate dropdown -->
<style type="text/css">
@media only screen and (max-width: 1191px) {
	.main-nav {
		padding: 0;
		-ms-flex-direction: column;
		flex-direction: column;
		padding-left: 0;
		margin-bottom: 0;
		list-style: none;
	}
	.main-nav ul {
		background-color: #3474ac;
		display: none;
		list-style: none;
		margin: 0;
		padding-left: 0;
	}
	.main-nav > li {
		border-bottom: 1px solid #000000;
		margin-left: 0;
	}
	.main-nav li + li {
		margin-left: 0;
	}
	.main-nav > li > a {
		line-height: 1.5;
		padding: 15px 20px !important;
		color: #000000;
		font-size: 14px;
		font-weight: 500;
	}
	.main-nav > li > a > i {
		float: right;
		margin-top: 5px;
	}
	.main-nav > li .submenu li a {
		border-top: 0;
		color: #000;
		padding: 10px 15px 10px 35px;
	}
	.main-nav > li .submenu ul li a {
		padding: 10px 15px 10px 45px;
	}
	.main-nav > li .submenu > li.has-submenu > a::after {
		content: "\f078";
	}
	.main-nav .has-submenu.active > a {
		color: #09dca4;
	}
	.main-nav .has-submenu.active .submenu li.active > a {
		color: #09dca4;
	}
	.login-left {
		display: none;
	}
	.main-menu-wrapper {
		order: 3;
		width: 260px;
		position: fixed;
		top: 0;
		bottom: 0;
		left: 0;
		overflow-x: hidden;
		overflow-y: auto;
		z-index: 1060;
		transform: translateX(-260px);
		transition: all 0.4s;
		background-color: #1bb0bb;
	}
	.menu-header {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
	}
	.navbar-header {
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		display: -webkit-inline-box;
		display: -ms-inline-flexbox;
		display: inline-flex;
	}
	#mobile_btn {
		display: inline-block;
	}
	.section-search {
		min-height: 330px;
	}
	.section-specialities {
		padding: 50px 0;
	}
	.footer-widget {
		margin-bottom: 30px;
	}
	.chat-cont-left, .chat-cont-right {
		-ms-flex: 0 0 100%;
		flex: 0 0 100%;
		max-width: 100%;
		transition: left 0.3s ease-in-out 0s, right 0.3s ease-in-out 0s;
		width: 100%;
	}
	.chat-cont-left {
		border-right: 0;
	}
	.chat-cont-right {
		position: absolute;
		right: -100%;
		top: 0;
		opacity: 0;
		visibility: hidden;
	}
	.chat-cont-right .chat-header {
		justify-content: start;
		-webkit-justify-content: start;
		-ms-flex-pack: start;
	}
	.chat-cont-right .chat-header .back-user-list {
		display: block;
	}
	.chat-cont-right .chat-header .chat-options {
		margin-left: auto;
	}
	.chat-window.chat-slide .chat-cont-left {
		left: -100%;
	}
	.chat-window.chat-slide .chat-cont-right {
		right: 0;
		opacity: 1;
		visibility: visible;
	}
	.day-slot li.left-arrow {
		left: -10px;
	}
	.container {
		max-width: 100%;
	}
	.appointments .appointment-action {
		margin-top: 10px;
	}
	.appointments .appointment-list {
		display: block;
	}
	.banner-wrapper {
		max-width: 720px;
	}
	.search-box .search-info {
		-ms-flex: 0 0 180px;
		flex: 0 0 180px;
		width: 180px;
	}
	.banner-wrapper .banner-header h1 {
		font-size: 2.125rem;
	}
	.dct-border-rht {
		border-bottom: 1px solid #f0f0f0;
		border-right: 0;
		margin-bottom: 20px;
		padding-bottom: 15px;
	}
	.dr-img {
		display: none;
	}	
	.doctor-search {
		padding: 30px 0;
	}
	.doctor-search-section {
		padding-top: 85px;
	}
	.shapes {
		display: none;
	}
	.search-box-3 {
		position: relative;
	} 
	.header-top {
		display: none;
	}
	.search-box {
		max-width: 535px;
		margin: 0 auto;
	}
	.card-label > label {
		font-size: 12px;
	}
	.footer .footer-top {
		padding-bottom: 10px;
	}
	.time-slot li .timing.selected::before {
		display: none;
	}
	.review-listing .recommend-btn {
		float: none;
	}
	.dash-widget {
		flex-direction: unset;
		text-align: left;
	}
	.circle-bar {
		margin: 0 15px 0 0;
	}
	.call-wrapper {
		height: calc(100vh - 140px);
	}
	.sidebar-overlay.opened {
		display: block;
	}
	.about-content {
		margin-bottom: 30px;
	}
	.slide-image{
		padding-left: 0;
		padding-right: 0;
	}
	.custom-short-by > div{
		margin-right: 0;
	}
	.product-description .doctor-img1{
		width: 100%;
		margin-right: 0;
		margin-bottom: 30px;
	}
	.product-description .doc-info-cont{
		width: 100%;
	}
	.product-description .doc-info-left{
		flex-wrap: wrap;
		-webkit-flex-wrap: wrap;
	}
	.clinics-section {
		padding: 40px 0 25px;
	}
	.specialities-section {
		padding: 60px 0 35px;
	}
	.our-doctors-section {
		padding: 40px 0;
	}
	.clinic-features-section {
		padding: 40px 0;
	}
	.our-blog-section {
		padding: 40px 0;
	}
	.section-search-3 .banner-info {
		padding: 60px 0 130px;
	}	
	.section-search-3 .doctor-search-form .banner-btn {
		padding: 18px 30px;
	}
	.pop-box .body-section h3 {
		font-size: 20px;
	}
	.section-header-three h2 {
		font-size: 28px;
	}
	.doc-background, .pat-background {
		min-height: 250px;
	}
	.doctor-divison h3 {
		font-size: 20px;
	}
	.doctor-divison p {
		font-size: 12px;
	}
	.doctors-body .inner-section > span {
		font-size: 12px;
	}
	.book-best-doctors .doctors-body .average-ratings {
		padding: 1px 8px;
		font-size: 10px;
		margin-left: 7px;
	}
	.book-best-doctors .doctors-body h4 {
		font-size: 18px;
	}
	.book-best-doctors .amt-txt {
		font-size: 16px;
	}
	.latest-blog .blog-wrap .blog-wrap-body h3 {
		font-size: 18px;
	}
	.header-four .nav-item a.header-login {
		margin: 15px 20px;
	}
	.header-four .nav-item a.header-login i {
		float: unset;
	}
	.doc-form {
		position: absolute;
		top: 85px;
		left: 20px;
    	padding: 37px 0;		
		width: 600px;
	}
	.dot-slider .slick-slide {
		height: 375px;
	}
	.dot-slider .profile-widget {
		margin-bottom: 0;
	}
	.app-form h2 {
		font-size: 30px;
	}
	.app-form .doctor-search-form input {
		min-height: 50px;
	}
	.app-form .banner-btn {
		padding: 10px 30px;
		min-height: 50px;
		justify-content: center;
		align-items: center;
		display: flex;
	}
	.category-sec {
		padding: 50px 0;
		margin-top: 0;
	}
	.set-category {
		padding: 10px;
	}
	.set-category .info-holder h3 {
		font-size: 20px;
	}
	.set-category .info-holder p {
		font-size: 11px;
	}
	.set-category .img-holder {
		margin-right: 10px;
	}
	.set-category .img-holder a {
		width: 50px;
		height: 50px;
	}
	.set-category .img-holder a img {
		width: 20px;
	}
	.select-box {
		padding: 20px;
	}
	.select-box p {
		font-size: 14px;
		margin-bottom: 20px;
	}
	.select-box .book-now {
		padding: 8px 20px;
	}
	.select-box .image-holder {
		margin-right: 15px;
	}
	.aval-features .custom-contain {
		width: 100%;
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
	}
	.aval-features .feature {
		align-items: center;
		justify-content: center;
		display: flex;
		padding: 40px;
	}
	.aval-features .feature .info-box {
		padding: 20px;
	}
	.aval-features .feature .info-box h2 {
		font-size: 30px;
	}
	.footer.footer-four .footer-top {
		padding: 30px 0 0;
	}
	.aval-features .custom-contain {
		max-width: 100%;
	}
	.header-trans.header-five .main-menu-wrapper {
		margin-left: auto;
	}
	.home-search-section .banner-header h2 {
		font-size: 34px;
	}
	.facility-section .operat-img {
		width: 100%;
	}
	.facility-section .visit-doctor {
		padding: 15px;
		margin-bottom: 20px;
	}
	.facility-section .visit-doctor .inner-details img {
		bottom: -13px;
	}
	.visit-doctor .inner-details .info h1 {
		font-size: 20px;
	}
	.visit-doctor .inner-details .info p {
		font-size: 12px;
		max-width: 100%;
	}
	.visit-doctor .inner-details .count h1 {
		width: 55px;
		height: 55px;
		font-size: 20px;
	}
	.clinic-wrap {
		height: 200px;
	}
	.heading-wrapper h1 {
		font-size: 30px;
		max-width: 100%;
	}
	.clinic-wrap .wrapper-overlay img {
		margin-bottom: 20px;
	}
	.slick-next::before {
		content: "→";
	}
	.doc-booking .book-slider .slick-prev, .doc-booking .book-slider .slick-next {
		top: -100px;
	}
	.blog-wrapper .wrap-content .date-cart {
		font-size: 26px;
	}
	.home-search-section .doctor-search {
		padding: 40px 0;
	}
	.facility-section {
		padding: 40px 0 20px;
	}
	.clinic-speciality {
		padding: 40px 0 10px;
	}
	.browse-section.brower-category {
		padding: 40px 0 20px;
	}
	.doctor-divison.provider-select .doc-background, .doctor-divison.provider-select .pat-background {
		padding: 40px 30px;
	}
	.doc-booking {
		padding: 40px 0;
	}
	.blogs-section.blog-container {
		padding: 40px 0 10px;
	}
	.footer.footer-five .footer-top {
		padding: 40px 0 10px;
	}
	.heading-wrapper .nav-arrow {
		display: none;
	}
	.heading-wrapper {
		margin-bottom: 30px;
		text-align: center;
	}
	.blog-wrapper .wrap-content:before {
		border-left: 178px solid transparent;
		border-right: 170px solid transparent;
	}	
	.divider .carousel-inner {
		height: 430px;
	}
}
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

	@media only screen and (max-width: 1302px) {
	.goog-te-combo{
		width: 140px;
		
	}
}
	@media only screen and (max-width: 1088px) {
	.goog-te-combo{
		width: 200px;
		
	}

}
@media only screen and (max-width: 1211px)
{
.header-nav {
    padding-left: 20px;
    padding-right: 20px;
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
									<img class="rounded-circle" src="<?php echo $_SESSION['image']?>" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="<?php echo $_SESSION['image']?>" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6><?php echo $_SESSION['name'].'&nbsp'.$_SESSION['surname']?></h6>
										
										<p class="text-muted mb-0"><?php  echo $_SESSION['usertype']?> </p>
									</div>
								</div>
								<a class="dropdown-item" href="doctor-dashboard.php">Dashboard</a>
								<a class="dropdown-item" href="doctor-profile-settings.php">Profile Settings</a>
								<a class="dropdown-item" href="..\logout.php?id=<?php $_SESSION['id'];?>" >Logout</a>
								
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
				<!-- /Header -->

    