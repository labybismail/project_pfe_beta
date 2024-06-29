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
						<a href="admin\index.php" class="navbar-brand logo">
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

                        <li class="has-submenu">
								<a href="admin/index.php">Home </a>
								<ul class="submenu"></ul>
						</li>
						<!--Admin prifile-->
						<li class="has-submenu">
								<a href="admin/reviews.html"  id ="admin">Reviews </a>
                                <ul class="submenu"></ul>
							</li>
							<!-- add -->
							<li class="has-submenu">
                                <a href="admin/appointment-list.php" id= "doctor"> Appointments </a>
                                <ul class="submenu"> </ul>
                            </li>

                        
                            <li class="has-submenu">
                                <a href="admin/doctor-list.php" id= "doctor"> Doctor </a>
                                <ul class="submenu"> </ul>
                            </li> 

                            <li class="has-submenu">
                                <a href="admin/patient-list.php" id="patient">Patients </a>
                                <ul class="submenu"> </ul>
                               
                            </li>

                                <li class="has-submenu" >
                                    <a href="add-specialitat.php" id="clinic" >Clinic</a>
                                    <ul class="submenu"> </ul>
                                </li>


						

						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="admin/<?php  echo $_SESSION['image']?>" width="31" alt="<?php echo $_SESSION['name'].'&nbsp'.$_SESSION['surname']?>">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="admin/<?php  echo $_SESSION['image']?>" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6><?php echo $_SESSION['name'].'&nbsp'.$_SESSION['surname']?></h6>
										
										<p class="text-muted mb-0"><?php  echo $_SESSION['usertype']?> </p>									
									</div>
								</div>
								<a class="dropdown-item" href="admin/index.php">Dashboard</a>
								<a class="dropdown-item" href="admin/profile.php">Profile Settings</a>
								<a class="dropdown-item" href="..\logout.php?id=<?php $_SESSION['id'];?>" >Logout</a>
								
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
				<!-- /Header -->

				