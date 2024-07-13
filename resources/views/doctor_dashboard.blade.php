<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:15:37 GMT -->

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
                                <li class="breadcrumb-item"><a href="{{route('doctorDashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Dashboard</h2>
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

                    </div>

                    <div class="col-md-7 col-lg-8 col-xl-9">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card dash-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget dct-border-rht">
                                                    <div class="circle-bar circle-bar1">
                                                        <div class="circle-graph1" data-percent="75">
                                                            <img src="assets/img/icon-01.png" class="img-fluid"
                                                                alt="patient">
                                                        </div>
                                                    </div>
                                                    <div class="dash-widget-info">
                                                        <h6>Total Patient</h6>
                                                        <h3>{{ $totalPatients }}</h3>
                                                        <p class="text-muted">Till Today</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget dct-border-rht">
                                                    <div class="circle-bar circle-bar2">
                                                        <div class="circle-graph2" data-percent="65">
                                                            <img src="assets/img/icon-02.png" class="img-fluid"
                                                                alt="Patient">
                                                        </div>
                                                    </div>
                                                    <div class="dash-widget-info">
                                                        <h6>Today Patient</h6>
                                                        <h3>{{ $todaysPatients }}</h3>
                                                        <p class="text-muted">
                                                            {{ Carbon\Carbon::now()->format('d ,M Y') }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget">
                                                    <div class="circle-bar circle-bar3">
                                                        <div class="circle-graph3" data-percent="50">
                                                            <img src="assets/img/icon-03.png" class="img-fluid"
                                                                alt="Patient">
                                                        </div>
                                                    </div>
                                                    <div class="dash-widget-info">
                                                        <h6>Appoinments</h6>
                                                        <h3>{{ $appoitements->count() }}</h3>
                                                        {{-- <p class="text-muted">06, Apr 2019</p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-4">Patient Appoinment</h4>
                                <div class="appointment-tab">

                                    <!-- Appointment Tab -->
                                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#upcoming-appointments"
                                                data-toggle="tab">Upcoming</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" href="#today-appointments"
                                                data-toggle="tab">Today</a>
                                        </li> --}}
                                    </ul>
                                    <!-- /Appointment Tab -->

                                    <div class="tab-content">

                                        <!-- Upcoming Appointment Tab -->
                                        <div class="tab-pane show active" id="upcoming-appointments">
                                            <div class="card card-table mb-0">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Patient Name</th>
                                                                    <th>Appt Date</th>
                                                                    <th>Purpose</th>
                                                                    <th>Type</th>
                                                                    <th></th>
                                                                </tr>
                                                                @php

                                                                    function patientProfileImage($nom, $prenom)
                                                                    {
                                                                        $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                                        foreach ($extensions as $ext) {
                                                                            $filename = public_path(
                                                                                "storage/patients/{$nom}_{$prenom}.{$ext}",
                                                                            );
                                                                            if (file_exists($filename)) {
                                                                                return asset(
                                                                                    "storage/patients/{$nom}_{$prenom}.{$ext}",
                                                                                );
                                                                            }
                                                                        }
                                                                        return asset('storage/doctors/default.jpg');
                                                                    }
                                                                @endphp
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($appoitements->where('statusId', 4)->get() as $upcommings)
                                                                    <tr>
                                                                        <td>
                                                                            <h2 class="table-avatar">
                                                                                <a href="patient-profile.html"
                                                                                    class="avatar avatar-sm mr-2"><img
                                                                                        class="avatar-img rounded-circle"
                                                                                        src="{{patientProfileImage($upcommings->patient->user->nom,$upcommings->patient->user->prenom)}}"
                                                                                        alt="User Image"></a>
                                                                                <a href="patient-profile.html">
																					{{$upcommings->patient->user->nom.' '.$upcommings->patient->user->prenom}} <span>{{$upcommings->patient->user->cin}}</span></a>
                                                                            </h2>
                                                                        </td>
                                                                        <td>{{Carbon\Carbon::parse($upcommings->dateRdv)->format('d M Y')}} <span
                                                                                class="d-block text-info">{{Carbon\Carbon::parse($upcommings->heureRdv)->format('h:i')}}</span></td>
                                                                        <td>General</td>
                                                                        <td>
																			@if(App\Models\Consultation::where('patientId',$upcommings->patientId)->count()==1)
																				new patient 
																			@else 
																				old patient
																			@endif
																		</td>
                                                                        <td class="text-right">
                                                                            <div class="table-action d-flex justify-content-end">
                                                 
                                                                                <form style="margin-right: 5px" action="{{route('doctorDashboard.update',$upcommings->id)}}" id="formAccept{{$upcommings->id}}" method="post">
																					@csrf 
																					@method('put')
																					<input type="hidden" name="statusId" value="{{App\Models\Status::where(strtolower('name'),'accepted')->first('id')->id}}">
																					<a onclick="document.getElementById('formAccept{{$upcommings->id}}').submit()" href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                                    <i class="fas fa-check"></i> Accept</a>
																				</form>
																				<form action="{{route('doctorDashboard.update',$upcommings->id)}}" id="formReject{{$upcommings->id}}" method="post">
																					@csrf 
																					@method('put')
																					<input type="hidden" name="statusId" value="{{App\Models\Status::where(strtolower('name'),'rejected')->first('id')->id}}">
																					<a  onclick="document.getElementById('formReject{{$upcommings->id}}').submit()" href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                    <i class="fas fa-times"></i> Reject</a>
																				</form>
                                                                                 
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Upcoming Appointment Tab -->

                                        
                                        <!-- /Today Appointment Tab -->

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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

    <!-- Circle Progress JS -->
    <script src="assets/js/circle-progress.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:15:58 GMT -->

</html>
