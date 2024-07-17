<!DOCTYPE html>
<html lang="en">


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

    <!-- Apex Css -->
    <link rel="stylesheet" href="assets/plugins/apex/apexcharts.css">

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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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

                    <!-- Profile Sidebar -->
                    @include('layouts.patientSidenav')
                    <!-- / Profile Sidebar -->

                    <div class="col-md-7 col-lg-8 col-xl-9">

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 col-xl-4 patient-dashboard-top">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <img src="assets/img/specialities/pt-dashboard-01.png" alt=""
                                                width="55">
                                        </div>
                                        <h5>Appointments</h5>
                                        <h6>{{$consultations->count()}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-4 patient-dashboard-top">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <img src="assets/img/specialities/pt-dashboard-02.png" alt=""
                                                width="55">
                                        </div>
                                        <h5>Blood type</h5>
                                        <h6>{{App\Models\Patient::find(session()->get('user')->patient->id)->first('blood_type')->blood_type}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-4 patient-dashboard-top">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <img src="assets/img/specialities/pt-dashboard-03.png" alt=""
                                                width="55">
                                        </div>
                                        <h5>Reviews</h5>
                                        <h6>{{App\Models\Review::where('patientId',session()->get('user')->patient->id)->count()}}</h6>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-3 patient-dashboard-top">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <img src="assets/img/specialities/pt-dashboard-04.png" alt=""
                                                width="55">
                                        </div>
                                        <h5>Blood Pressure</h5>
                                        <h6>202/90 <sub>mg/dl</sub></h6>
                                    </div>
                                </div>
                            </div> --}}
                        </div>



                        <div class="card">
                            <div class="card-body pt-0">

                                <!-- Tab Menu -->
                                <nav class="user-tabs mb-4">
                                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_appointments"
                                                data-toggle="tab">Appointments</a>
                                        </li>
                                        {{-- <li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
											</li> --}}
                                        {{-- <li class="nav-item">
												<a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Medical Records</span></a>
											</li> --}}
                                        {{-- <li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-toggle="tab">Billing</a>
											</li> --}}
                                    </ul>
                                </nav>
                                <!-- /Tab Menu -->

                                <!-- Tab Content -->
                                <div class="tab-content pt-0">

                                    <!-- Appointment Tab -->
                                    <div id="pat_appointments" class="tab-pane fade show active">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Doctor</th>
                                                                <th>Appt Date</th>
                                                                <th>Booking Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($consultations as $consultation)
                                                                <tr>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a class="avatar avatar-sm mr-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="{{ doctorProfileImage($consultation->doctor->user->nom,$consultation->doctor->user->prenom) }}"
                                                                                    alt="User Image"></a>
                                                                            Dr.
                                                                            {{ $consultation->doctor->user->nom . ' ' . $consultation->doctor->user->prenom }}
                                                                        </h2>
                                                                    </td>
                                                                    <td>{{ $consultation->dateRdv . ' ' . Carbon\Carbon::parse($consultation->heureRdv)->format('h:i') }}
                                                                    </td>
                                                                    <td>{{ $consultation->created_at }}</td>
                                                                    <td>{{ $consultation->doctor->prix . 'DH' }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-pill 
                                                                        @switch(strtolower($consultation->status->name))
                                                                            @case('pending')
                                                                                bg-warning-light
                                                                                @break
                                                                            @case('canceled')
                                                                                bg-danger-light
                                                                                @break
                                                                            @case('accepted')
                                                                                bg-success-light
                                                                                @break
                                                                             @case('rejected')
                                                                                bg-danger-light
                                                                                @break
                                                                        @endswitch
                                                                     ">{{ $consultation->status->name }}</span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- Tab Content -->

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

    <!-- Graph One-->
    <div class="modal fade custom-modal show" id="graph1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">BMI Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="bmi-status"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Graph One-->

    <!-- Graph Two-->
    <div class="modal fade custom-modal show" id="graph2">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Heart Rate Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="heartrate-status"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Graph Two-->

    <!-- Graph Two-->
    <div class="modal fade custom-modal show" id="graph3">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">FBC Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="fbc-status"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Graph Two-->

    <!-- Graph Two-->
    <div class="modal fade custom-modal show" id="graph4">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Weight Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="weight-status"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Graph Two-->

    <!-- jQuery -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <!-- Apex JS -->
    <script src="assets/plugins/apex/apexcharts.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>


</html>
