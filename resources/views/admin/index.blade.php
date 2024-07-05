<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Dashboard</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css') }}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    
    <!--[if lt IE 9]>
        <script src="{{ asset('admin/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			@include('admin.layouts.adminNav')
			<!-- /Header -->
			
			<!-- Sidebar -->
			@include('admin.layouts.adminSideNav')
            
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-4 col-sm-4 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<h3>{{$doctorsCount}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Doctors</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-4 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3>{{$patientsCount}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Patients</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-sm-4 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3>{{$consultationsCount}}</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					 
					</div>
					 
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Doctors List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Reviews</th>
												</tr>
											</thead>
											<tbody>
												@foreach($doctors as $doctor)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
															Dr. {{$doctor->user->nom.' '.$doctor->user->prenom}}
														</h2>
													</td>
													<td> {{$doctor->speciality->name}}</td>
													<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card  card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Patients List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>													
													<th>Patient Name</th>
													<th>Phone</th>
													<th>Member since</th>
												</tr>
											</thead>
											<tbody>
												@foreach($patients as $patient)
													<tr>
														<td>
															<h2 class="table-avatar">
																<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient1.jpg')}}" alt="User Image"></a>
																{{$patient->user->nom .' '.$patient->user->prenom}}
															</h2>
														</td>
														<td>{{$patient->user->tel}}</td>
														<td>{{$patient->user->created_at ? Carbon\Carbon::parse($patient->user->created_at)->format('d F Y') : ''}}</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Appointment List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
												</tr>
											</thead>
											<tbody>
												@foreach($consultations as $consultation)
													<tr>
														<td>
															<h2 class="table-avatar">
																<a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
																Dr. {{$consultation->doctor->user->nom.' '.$consultation->doctor->user->prenom}}
															</h2>
														</td>
														<td>{{$consultation->doctor->speciality->name}}</td>
														<td>
															<h2 class="table-avatar">
																<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets/img/patients/patient1.jpg')}}" alt="User Image"></a>
																{{$consultation->patient->user->nom.' '.$consultation->patient->user->prenom}}
															</h2>
														</td>
														<td>{{$consultation->dateRdv ? Carbon\Carbon::parse($consultation->dateRdv)->format('d F Y') : ''}}
															<span class="text-primary d-block">{{-- Assuming $consultation->heureRdv contains the decimal time value --}}
																@php
																	$heureRdv = strval($consultation->heureRdv); // Convert to string
																	$hours = substr($heureRdv, 0, 2); // Extract hours
																	$minutes = substr($heureRdv, 2, 2); // Extract minutes
																@endphp
																
																{{$hours}}:{{$minutes}}
																	</span></td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('/admin/assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('/admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('/admin/assets/plugins/raphael/raphael.min.js') }}"></script>    
<script src="{{ asset('/admin/assets/plugins/morris/morris.min.js') }}"></script>  
<script src="{{ asset('/admin/assets/js/chart.morris.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('/admin/assets/js/script.js') }}"></script>

		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:17:20 GMT -->
</html>