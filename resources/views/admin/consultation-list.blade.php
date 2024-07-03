<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/appointment-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:17:37 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Medicine Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
		    <!-- Header -->
        <!-- Header -->
        @include('admin.layouts.adminNav')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('admin.layouts.adminSideNav')

			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Appointments</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Appointments</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													{{-- <th>Status</th>
													<th class="text-right">Amount</th> --}}
												</tr>
											</thead>
											<tbody>
												@foreach($consultations as $consultation)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image"></a>
															Dr. {{$consultation->doctor->user->nom.' '.$consultation->doctor->user->prenom}}
														</h2>
													</td>
													<td>{{$consultation->doctor->speciality->name}}</td>
													<td>
														<h2 class="table-avatar">
															<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/patients/patient1.jpg" alt="User Image"></a>
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
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/appointment-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:17:40 GMT -->
</html>