<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:59 GMT -->
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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
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
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
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

						<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									@php
									$user=App\Models\User::find(session()->get('user')->id);
									 
								@endphp
									<!-- Profile Settings Form -->
									<form action="{{ route('patient.updateInfos', $user->patient->id) }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('put')
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="{{doctorProfileImage($user->nom,$user->prenom)}}" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="photo_profile">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
															@error('photo_profile')
																<span class="text-danger">{{ $message }}</span>
															@enderror
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" name="prenom" value="{{ old('prenom', $user->prenom) }}">
													@error('prenom')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" name="nom" value="{{ old('nom', $user->nom) }}">
													@error('nom')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="text" class="form-control datetimepicker" name="dateNaissance" value="{{ old('dateNaissance', \Carbon\Carbon::parse($user->dateNaissance)->format('d/m/Y')) }}">
													</div>
													@error('dateNaissance')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<select class="form-control select" name="blood_group">
														<option value="A-" @if(old('blood_group', $user->patient->blood_group) == 'A-') selected @endif>A-</option>
														<option value="A+" @if(old('blood_group', $user->patient->blood_group) == 'A+') selected @endif>A+</option>
														<option value="B-" @if(old('blood_group', $user->patient->blood_group) == 'B-') selected @endif>B-</option>
														<option value="B+" @if(old('blood_group', $user->patient->blood_group) == 'B+') selected @endif>B+</option>
														<option value="AB-" @if(old('blood_group', $user->patient->blood_group) == 'AB-') selected @endif>AB-</option>
														<option value="AB+" @if(old('blood_group', $user->patient->blood_group) == 'AB+') selected @endif>AB+</option>
														<option value="O-" @if(old('blood_group', $user->patient->blood_group) == 'O-') selected @endif>O-</option>
														<option value="O+" @if(old('blood_group', $user->patient->blood_group) == 'O+') selected @endif>O+</option>
													</select>
													@error('blood_group')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
													@error('email')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" name="tel" value="{{ old('tel', $user->tel) }}" class="form-control">
													@error('tel')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}">
													@error('address')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<select name="ville" class="form-control">
														@foreach($villes as $ville)
															<option value="{{ $ville->id }}" @if(old('ville', $user->ville_id) == $ville->id) selected @endif>{{ $ville->name }}</option>
														@endforeach
													</select>
													@error('ville')
														<span class="text-danger">{{ $message }}</span>
													@enderror
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" value="Morocco" disabled>
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									
									<!-- /Profile Settings Form -->
									
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
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/profile-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:59 GMT -->
</html>