<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/reviews.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:49 GMT -->
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
									<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Reviews</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">My Reviews</h2>
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
							@include('layouts.patientSideNav')

							<!-- /Profile Sidebar -->
							
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="doc-review review-listing">
							@include('functions')
							
								<!-- Review Listing -->
								<ul class="comments-list">
									@foreach($reviews as $review)
									<!-- Comment List -->
									<li>
										<div class="comment">
											<img class="avatar rounded-circle" alt="doctor Image" src="{{doctorProfileImage($review->doctor->user->nom,$review->doctor->user->prenom)}}">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author">Dr. {{$review->doctor->user->nom.' '.$review->doctor->user->prenom}}</span>
													@php
													$diffDays=  (int)Carbon\Carbon::parse($review->created_at)->diffInDays(Carbon\Carbon::today());
												 @endphp
												 <span class="comment-date">Reviewed {{ $diffDays==0 ?' Today': $diffDays.' Days ago' }} </span>
													<div class="review-count rating">
														<i class="fas fa-star  @if($review->rating>=1) filled @endif"></i>
														<i class="fas fa-star  @if($review->rating>=2) filled @endif"></i>
														<i class="fas fa-star  @if($review->rating>=3) filled @endif"></i>
														<i class="fas fa-star  @if($review->rating>=4) filled @endif"></i>
														<i class="fas fa-star @if($review->rating>=5) filled @endif"></i>
													</div>
												</div>
												<p class="@if($review->recomended==true) text-success @else text-danger @endif">
													@if($review->recomended==true)
														<i class="far fa-thumbs-up"></i> I recommend the doctor
													@elseif($review->recomended==false)
														<i class="far fa-thumbs-down"></i> I don't recommend the doctor
													@endif
												</p>
												<p class="comment-content">
													{{$review->comment}}
												</p>
												 
											</div>
										</div>
										
										<!-- Comment Reply -->
										 
										<!-- /Comment Reply -->
										
									</li>
									<!-- /Comment List --> 
									@endforeach
								</ul>
								<!-- /Comment List -->
								
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
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/reviews.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:16:49 GMT -->
</html>