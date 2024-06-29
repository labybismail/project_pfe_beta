<?php

include_once("config.php");
session_start();
?>
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
		<?php
		if ($_SESSION['usertype'] == 'doctor') {
			include_once("headerD.php");
		} elseif (!isset($_SESSION) or $_SESSION['usertype'] != 'doctor' or $_SESSION['usertype']=='' ) {
			session_destroy();
			header("location: ..\login-23.php");
		}
		?>
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
						<div class="profile-sidebar">
							<div class="widget-profile pro-widget-content">
								<div class="profile-info-widget">
									<a href="#" class="booking-doc-img">
										<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
									</a>
									<div class="profile-det-info">
										<h3>Dr. <?php echo $_SESSION['name'] . '&nbsp' . $_SESSION['surname'] ?></h3>

										<div class="patient-details">
											<h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
										</div>
									</div>
								</div>
							</div>
							<div class="dashboard-widget">
								<nav class="dashboard-menu">
									<ul>
										<li >
											<a href="doctor-dashboard.php">
												<i class="fas fa-columns"></i>
												<span>Dashboard</span>
											</a>
										</li>
										<li class="active" >
											<a href="appointments.php">
												<i class="fas fa-calendar-check"></i>
												<span>Appointments</span>
											</a>
										</li>
										<li>
											<a href="my-patients.php">
												<i class="fas fa-user-injured"></i>
												<span>My Patients</span>
											</a>
										</li>



										<li>
											<a href="reviews.php">
												<i class="fas fa-star"></i>
												<span>Reviews</span>
											</a>
										</li>

										<li>
											<a href="doctor-profile-settings.html">
												<i class="fas fa-user-cog"></i>
												<span>Profile Settings</span>
											</a>
										</li>
										<li>
											<a href="social-media.html">
												<i class="fas fa-share-alt"></i>
												<span>Social Media</span>
											</a>
										</li>
										<li>
											<a href="doctor-change-password.php">
												<i class="fas fa-lock"></i>
												<span>Change Password</span>
											</a>
										</li>
										<li>
											<a href="..\logout.php?id=<?php $_SESSION['id'];?>">
												<i class="fas fa-sign-out-alt"></i>
												<span>Logout</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
						<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="appointments">
							
								<!-- Appointment List -->
								<?php
											$idp = $_SESSION['id'];
											$reesult = mysqli_query($conn, "SELECT * FROM appointment where iddoc = '$idp' ORDER BY `date` ASC ,`time` ASC ");
											while ($roow = mysqli_fetch_array($reesult)) {
												$idus = $roow['idus'];
												$sqql = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idus'";
												$result = mysqli_query($conn, $sqql);
												while ($row = mysqli_fetch_array($result)) {
													$code = $roow['code'];
													if ($code == 1) {
											?>
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="patient-profile.php?id=<?php echo $row["IDusers"] ?>" class="booking-doc-img">
											<img src="<?php echo $row["image"] ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="patient-profile.php?id=<?php echo $row["IDusers"] ?>"><?php echo $row["name"] ?> <?php echo $row["surname"] ?></a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> <?php echo $roow["date"] ?> , <?php echo $roow["time"] ?> AM</h5>
												<h5><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
												<h5><i class="fas fa-envelope"></i> <a href="https://doccure-html.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="37455e545f56455377524f565a475b521954585a">[email&#160;protected]</a></h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> +1 923 782 4575</h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<a href="#" class="btn btn-sm bg-info-light fa-view " data-date="<?php echo $roow["date"] ?>" data-time="<?php echo $roow["time"] ?>" data-datem="<?php echo $roow["datec"] ?>" data-name="<?php echo $row["name"] ?> <?php echo $row["surname"] ?>" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a>
									</div>
								</div>
								<?php

													}
												}
											}	
											?>
								<!-- /Appointment List -->
							
								
								
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
		<footer class="footer">
			<?php include_once("footer.php"); ?>
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
											<span class="text" style="font-weight: bold; color:black; text-transform: capitalize;" id ="name" ></span><br>
											<span class="title" >Appointment Date</span>
											<span class="text" id ="date" ></span>
											<span class="text" id ="time" > </span>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
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
								<span class="text" id ="datem"></span>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /Appointment Details Modal -->
	  
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
		
	 <script>
$(document).on('click','.fa-view',function(e) {
		var id=$(this).attr("data-date");
		var time=$(this).attr("data-time");
		var relation =$(this).attr("data-datem");
		var name =$(this).attr("data-name");
		
		
		$('#date').text(id);
		$('#time').text(time);
		$('#datem').text(relation);
		$('#name').text(name);
		
		
	});
	</script>
	</body>

</html>