<?php  
include_once("config.php");

?>
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
						<a href="index.html" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="has-submenu">
								<a href="#">Home <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="index.html">Home</a></li>
									<li><a href="index-1.html">Home 1</a></li>
									<li><a href="index-2.html">Home 2</a></li>
									<li><a href="index-3.html">Home 3</a></li>
									<li><a href="index-4.html">Home 4</a></li>
									<li><a href="index-5.html">Home 5</a></li>
									<li><a href="index-6.html">Home 6</a></li>
									<li><a href="index-7.html">Home 7</a></li>
									<li><a href="index-8.html">Home 8</a></li>
								</ul>
							</li>
							<li class="has-submenu" id="doctor">
								<a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									<li><a href="appointments.html">Appointments</a></li>
									<li><a href="schedule-timings.html">Schedule Timing</a></li>
									<li><a href="my-patients.html">Patients List</a></li>
									<li><a href="patient-profile.html">Patients Profile</a></li>
									<li><a href="chat-doctor.html">Chat</a></li>
									<li><a href="invoices.html">Invoices</a></li>
									<li><a href="doctor-profile-settings.html">Profile Settings</a></li>
									<li><a href="reviews.html">Reviews</a></li>
									<li><a href="doctor-register.html">Doctor Register</a></li>
								</ul>
							</li>	
							<li class="has-submenu active" id ="user">
								<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu">
										<a href="#">Doctors</a>
										<ul class="submenu">
											<li><a href="map-grid.html">Map Grid</a></li>
											<li><a href="map-list.html">Map List</a></li>
										</ul>
									</li>
									<li><a href="search.html">Search Doctor</a></li>
									<li><a href="doctor-profile.html">Doctor Profile</a></li>
									<li><a href="booking.html">Booking</a></li>
									<li><a href="checkout.html">Checkout</a></li>
									<li><a href="booking-success.html">Booking Success</a></li>
									<li class="active"><a href="patient-dashboard.html">Patient Dashboard</a></li>
									<li><a href="favourites.html">Favourites</a></li>
									<li><a href="chat.html">Chat</a></li>
									<li><a href="profile-settings.html">Profile Settings</a></li>
									<li><a href="change-password.html">Change Password</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="#">Pharmacy <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="pharmacy-index.html">Pharmacy</a></li>
									<li><a href="pharmacy-details.html">Pharmacy Details</a></li>
									<li><a href="pharmacy-search.html">Pharmacy Search</a></li>
									<li><a href="product-all.html">Product</a></li>
									<li><a href="product-description.html">Product Description</a></li>
									<li><a href="cart.html">Cart</a></li>
									<li><a href="product-checkout.html">Product Checkout</a></li>
									<li><a href="payment-success.html">Payment Success</a></li>
                                    <li><a href="pharmacy-register.html">Pharmacy Register</a></li>
								</ul>
							</li>	
							
							
							<li>
								<a href="admin/index.html" target="_blank" id ="admin">Admin</a>
							</li>
							<li class="login-link">
								<a href="login.html">Login / Signup</a>
							</li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6><?php echo $_SESSION['name'].'&nbsp'.$_SESSION['surname']?></h6>
										
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="patient-dashboard.html">Dashboard</a>
								<a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
								<a class="dropdown-item" href="..\logout.php?id=<?php $_SESSION['id'];?>" >Logout</a>
								
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
				<!-- /Header -->

				