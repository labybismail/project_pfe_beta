<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    @php
                        $user = $user=App\Models\User::find(session()->get('user')->id);;
                        function doctorProfileImage($nom, $prenom)
                        {
                            $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                            foreach ($extensions as $ext) {
                                $filename = public_path("storage/patients/{$nom}_{$prenom}.{$ext}");
                                if (file_exists($filename)) {
                                    return asset("storage/patients/{$nom}_{$prenom}.{$ext}");
                                }
                            }
                            return asset('storage/doctors/default.jpg');
                        }
                    @endphp
                    <img src="{{ doctorProfileImage($user->nom, $user->prenom) }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ $user->nom . ' ' . $user->prenom }}</h3>
                    <div class="patient-details">
                        @php
                            use Carbon\Carbon;

                            $user = $user;
                            $dateNaissance = Carbon::parse($user->dateNaissance);
                            $formattedDate = $dateNaissance->format('j F Y'); // 1 July 2002
                            $age = $dateNaissance->diffInYears(Carbon::now());
                        @endphp


                        <h5><i class="fas fa-birthday-cake"></i>
                            {{ $formattedDate . ', ' . Illuminate\Support\Str::substr($age, 0, 2) }} years</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $user->ville->name }}, Morocco</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('patient.profileSetting') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="change-password.html">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li> --}}
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
</div>
