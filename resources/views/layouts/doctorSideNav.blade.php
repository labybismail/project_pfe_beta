<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            @include('functions')

            @php
                $user  = App\Models\User::find(session()->get('user')->id);
                
            @endphp
            <a href="#" class="booking-doc-img">
                <img src="{{doctorProfileImage($user->nom,$user->prenom)}}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>Dr. {{$user->nom.' '.$user->prenom}}</h3>

                <div class="patient-details">
                    <h5 class="mb-0">{{$user->doctor->speciality->name}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('doctorDashboard') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('doctorAppointment')}}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('doctor_myPatients')}}">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('doctor.reviews')}}">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('doctor_profileSettings')}}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
