<header class="header">
    <nav class="navbar navbar-expand-lg header-nav nav-transparent">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ route('home') }}" class="navbar-brand logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ route('home') }}" class="menu-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav white-font">
                <li class="has-submenu active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                @if (session()->has('user') && \App\Models\Doctor::where('user_id', session()->get('user')->id)->exists())
                    <li>
                        <a href="appointments.php">Appointments</a>
                    </li>
                    <li>
                        <a href="my-patients.php">Patients List</a>
                    </li>
                    <li>
                        <a href="doctor-profile-settings.php">Profile Settings</a>
                    </li>
                    <li>
                        <a href="reviews.php">Reviews</a>
                    </li>
                @elseif(session()->has('user') && \App\Models\Patient::where('user_id', session()->get('user')->id)->exists())
                    <li>
                        <a href="search.php">Search Doctors</a>
                    </li>
                    <li>
                        <a href="calendar.php">Calendar</a>
                    </li>
                    <li>
                        <a href="booking.php">Booking</a>
                    </li>
                    <li>
                        <a href="profile-settings.php">Profile</a>
                    </li>
                @elseif (session()->has('user') && \App\Models\Admin::where('user_id', session()->get('user')->id)->exists())
                    <li>
                        <a href="{{ route('admin.index') }}" target="_blank">Admin</a>
                    </li>
                @else
                    <li>
                        <a href="search.php">Search Doctors</a>
                    </li>
                @endif

            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            @if (!session()->has('isLogged'))
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('login') }}">Login / Signup</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <button class="btn btn-outline-danger">Logout</button>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>
