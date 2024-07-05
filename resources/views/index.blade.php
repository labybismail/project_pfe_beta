<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from doccure-html.dreamguystech.com/template/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Doccure</title>
	<!-- Favicons -->
	<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
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
		<!-- Home Banner -->
		<section class="section section-search-1">
			<div class="container">
				<!-- Header -->
					@include('layouts.header')
				<!-- /Header -->
				<div class="row">
					<div class="col-md-6">
						<img src="assets/img/dr-slider.png" class="img-fluid dr-img" alt="" >
					</div>
					<div class="col-md-6 search-doctor">
						<div class="search-area">
							<h2 class="text-center">Search Doctor, Make an Appointment</h2>
							<form class="search-input">
								<div class="row">
									<div class="col-12 col-md-12">
										<div class="form-group">
											<label>Location</label>
											<input type="text" class="form-control" value="">
										</div>
									</div>
									<div class="col-12 col-md-12">
										<div class="form-group">
											<label>Gender</label>
											<select class="form-control">
												<option>Male</option>
												<option>Fe Male</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-md-12">
										<div class="form-group">
											<label>Department</label>
											<select class="form-control">
												<option>Surgen</option>
												<option>Cardiologist</option>
												<option>Gynacologist</option>
											</select>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button type="submit" class="btn btn-primary search-btn submit-btn">Search</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Home Banner -->
		<!-- Clinic and Specialities -->
		<section class="section section-specialities">
			<div class="container-fluid">
				<div class="section-header text-center">
					<h2>Clinic and Specialities</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-9">
						<!-- Slider -->
						<div class="specialities-slider slider">
							<!-- Slider Item -->
						@foreach($specialities as $speciality)
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/{{$speciality->name}}.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>{{$speciality->name}}</p>
							</div>
						@endforeach
						</div>
						<!-- /Slider -->
					</div>
				</div>
			</div>
		</section>
		<!-- Clinic and Specialities -->
		<!-- Category Section -->
		<section class="section section-category">
			<div class="container">
				<div class="section-header text-center">
					<h2>Browse by Specialities</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row">
				@foreach($specialities as $speciality)
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/{{$speciality->name}}.png" alt="">
							</div>
							<div class="category-content">
								<h4>{{$speciality->name}}</h4>
								<span>
									@php
										echo \App\Models\Doctor::where('speciality_id',$speciality->id)->count().' Doctors';
									@endphp
								</span>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</section>
		<!-- Category Section -->
		<!-- Popular Section -->
		<section class="section section-doctor">
			<div class="container-fluid">
				<div class="section-header text-center">
					<h2>Book Our Best Doctor</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="doctor-slider slider">
							<!-- Doctor Widget -->
							@foreach($doctors as $doctor)
							<div class="profile-widget">
								<div class="doc-img">
									<a href="doctor-profile.html">
										<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-01.jpg">
									</a>
									<a href="javascript:void(0)" class="fav-btn">	<i class="far fa-bookmark"></i>
									</a>
								</div>
								<div class="pro-content">
									<h3 class="title">
											<a href="doctor-profile.html">{{$doctor->user->nom.' '.$doctor->user->prenom}}</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
									<p class="speciality">{{$doctor->speciality->name}}</p>
									{{-- <div class="rating">	<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<span class="d-inline-block average-rating">(17)</span>
									</div> --}}
									<ul class="available-info">
										<li>	<i class="fas fa-map-marker-alt"></i>{{$doctor->user->address}}</li>
										{{-- <li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li> --}}
										<li>	<i class="far fa-money-bill-alt"></i>{{$doctor->prix}} DH	<!--<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>-->
										</li>
									</ul>
									<div class="row row-sm">
										<div class="col-6">	<a href="{{route('doctorProfile',$doctor->id)}}" class="btn view-btn">View Profile</a>
										</div>
										<div class="col-6">	<a href="booking.html" class="btn book-btn">Book Now</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!-- Doctor Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Popular Section -->
	 

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
	<!-- Slick JS -->
	<script src="assets/js/slick.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
</body>


<!-- Mirrored from doccure-html.dreamguystech.com/template/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:19 GMT -->
</html>