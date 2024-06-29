<header class="header">
    <nav class="navbar navbar-expand-lg header-nav nav-transparent ">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">	<span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
                </span>
            </a>
            <a href="index.php" class="navbar-brand logo">
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index.php" class="menu-logo">
                    <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">	<i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav white-font">
                <li class="has-submenu active">	<a href="{{route('home')}}">Home</i></a>
            
                </li>
                <li class="has-submenu">	<a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="doctor-dashboard.php">Doctor Dashboard</a>
                        </li>
                        <li><a href="appointments.php">Appointments</a>
                        </li>
                        <li><a href="schedule-timings.php">Schedule Timing</a>
                        </li>
                        <li><a href="my-patients.php">Patients List</a>
                        </li>
                        <li><a href="patient-profile.php">Patients Profile</a>
                        </li>  
                        <li><a href="doctor-profile-settings.php">Profile Settings</a>
                        </li>
                        <li><a href="reviews.php">Reviews</a>
                        </li> 
                    </ul>
                </li>
                <li class="has-submenu">	<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li class=""><a href="map-grid.php">Doctors</a></li>
                        <li><a href="search.php">Search Doctor</a>
                        </li> 
                        <li><a href="booking.php">Booking</a>
                        </li> 
                        <li><a href="booking-success.php">Booking Success</a>
                        </li>
                        <li><a href="patient-dashboard.php">Patient Dashboard</a>
                        </li> 
                        <li><a href="profile-settings.php">Profile</a>
                        </li> 
                    </ul>
                </li>
                <li class="has-submenu">	<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                         
                        <li><a href="search.php">Search Doctors</a>
                        </li>
                        <li><a href="calendar.php">Calendar</a>
                        </li> 
                        <li><a href="login.php">Login</a>
                        </li>
                        <li><a href="register.php">Register</a>
                        </li>
                        <li><a href="forgot-password.php">Forgot Password</a>
                        </li>
                    </ul>
                </li>
                
                <li>	<a href="{{route('admin.index')}}" target="_blank">Admin</a>
                </li>
                <li class="login-link">	<a href="login.php">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">	<i class="far fa-hospital"></i>	
                </div>
                <div class="header-contact-detail text-white">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header white-font">+1 315 369 5943</p>
                </div>
            </li>
            <li class="nav-item">	<a class="nav-link header-login" href="login.php">login / Signup </a>
            </li>
        </ul>
    </nav>
</header>