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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Appointments</h2>
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
                        <div class="appointments">
                            @php
                                function ProfileImage($nom, $prenom)
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
                            <!-- Appointment List -->
							@if($appoitments->count()==0)
								<div class="alert alert-success">There is no pending appointments</div>
							@else
								@foreach ($appoitments as $appoitment)
									<div class="appointment-list">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												<img src="{{ ProfileImage($appoitment->patient->user->nom, $appoitment->patient->user->prenom) }}"
													alt="User Image">
											</a>
											<div class="profile-det-info">
												<h3><a href="#">{{ $appoitment->patient->user->nom . ' ' . $appoitment->patient->user->prenom }}</a>
												</h3>
												<div class="patient-details">
													<h5><i class="far fa-clock"></i>
														{{ Carbon\Carbon::parse($appoitment->dateRdv)->format('d M Y') }},
														{{ Carbon\Carbon::parse($appoitment->heureRdv)->format('h:i') }}
													</h5>
													<h5><i
															class="fas fa-map-marker-alt"></i>{{ $appoitment->patient->user->ville->name }},
														Morocco</h5>
													<h5><i
															class="fas fa-envelope"></i>{{ $appoitment->patient->user->email }}
													</h5>
													<h5 class="mb-0"><i
															class="fas fa-phone"></i>{{ $appoitment->patient->user->tel }}
													</h5>
												</div>
											</div>
										</div>

										<div class="appointment-action d-flex justify-content-end">

											<form style="margin-right: 5px"
												action="{{ route('doctorDashboard.update', $appoitment->id) }}"
												id="formAccept{{ $appoitment->id }}" method="post">
												@csrf
												@method('put')
												<input type="hidden" name="statusId"
													value="{{ App\Models\Status::where(strtolower('name'), 'accepted')->first('id')->id }}">
												<a onclick="document.getElementById('formAccept{{ $appoitment->id }}').submit()"
													href="javascript:void(0);" class="btn btn-sm bg-success-light">
													<i class="fas fa-check"></i> Accept</a>
											</form>
											<form action="{{ route('doctorDashboard.update', $appoitment->id) }}"
												id="formReject{{ $appoitment->id }}" method="post">
												@csrf
												@method('put')
												<input type="hidden" name="statusId"
													value="{{ App\Models\Status::where(strtolower('name'), 'rejected')->first('id')->id }}">
												<a onclick="document.getElementById('formReject{{ $appoitment->id }}').submit()"
													href="javascript:void(0);" class="btn btn-sm bg-danger-light">
													<i class="fas fa-times"></i> Reject</a>
											</form>
										</div>

									</div>
								@endforeach
                            <!-- /Appointment List -->
							@endif

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

    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal" id="appt_details">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="info-details">
                        <li>
                            <div class="details-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="title">#APT0001</span>
                                        <span class="text">21 Oct 2019 10:00 AM</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <button type="button" class="btn bg-success-light btn-sm"
                                                id="topup_status">Completed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="title">Status:</span>
                            <span class="text">Completed</span>
                        </li>
                        <li>
                            <span class="title">Confirm Date:</span>
                            <span class="text">29 Jun 2019</span>
                        </li>
                        <li>
                            <span class="title">Paid Amount</span>
                            <span class="text">$450</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->

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

rom doccure-html.dreamguystech.com/template/appointments.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:44 GMT -->

</html>
