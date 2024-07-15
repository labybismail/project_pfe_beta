<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/my-patients.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:44 GMT -->

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('layouts.header')

        <!-- /Header -->

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Patients</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">My Patients</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                        <!-- Profile Sidebar -->
                        @include('layouts.doctorSideNav')

                        <!-- /Profile Sidebar -->
                        @php
                            use Carbon\Carbon;
                            function get_age_int1($dateNaissance)
                            {
                                $dateNaissance = Carbon::parse($dateNaissance);
                                $formattedDate = $dateNaissance->format('j F Y');
                                return (int) $dateNaissance->diffInYears(Carbon::now());
                            }
                        @endphp
                    </div>
                    @include('functions')
                    @foreach ($appoitments as $appoitment)
                        <div class="col-md-7 col-lg-8 col-xl-9">

                            <div class="row row-grid">
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card widget-profile pat-widget-profile">
                                        <div class="card-body">
                                            <div class="pro-widget-content">
                                                <div class="profile-info-widget">
                                                    <a href="#" class="booking-doc-img">
                                                        <img src="{{ patientProfileImage($appoitment->patient->user->nom, $appoitment->patient->user->prenom) }}"
                                                            alt="User Image">
                                                    </a>
                                                    <div class="profile-det-info">
                                                        <h3><a
                                                                href="#">{{ $appoitment->patient->user->nom . ' ' . $appoitment->patient->user->prenom }}</a>
                                                        </h3>

                                                        <div class="patient-details">
                                                            <h5><b>Patient ID :</b> {{ $appoitment->patient->id }}</h5>
                                                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>
                                                                {{ $appoitment->patient->user->ville->name }}, Morocco
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="patient-info">
                                                <ul>
                                                    <li>Phone <span>{{ $appoitment->patient->user->tel }}</span></li>
                                                    <li>Age <span>{{ get_age_int1($appoitment->patient->user->dateNaissance) }}
                                                            Years,
                                                            {{ $appoitment->patient->user->Sexe == 'M' ? 'Male' : 'Female' }}</span>
                                                    </li>
                                                    <li>Blood Group <span>{{ $appoitment->patient->blood_type }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>
        <!-- /Page Content -->

        <!-- Footer -->
        @include('layouts.footer')

        <!-- /Footer -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/my-patients.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:44 GMT -->

</html>
