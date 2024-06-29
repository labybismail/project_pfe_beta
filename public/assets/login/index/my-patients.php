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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

		
		
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		<!-- Header -->
		<?php
		if ($_SESSION['usertype'] == 'doctor') {
			include_once("headerD.php");
		} elseif (!isset($_SESSION) or $_SESSION['usertype'] != 'doctor' or  $_SESSION['usertype']=='') {
			session_destroy();
			header("location: ..\login-23.php");
		}
		?>
		<!-- /Header -->
		<style>
			#example_filter {
				margin-right: 10px;
				margin-top: 20px;
			}

			#example_length {
				margin-left: 10px;
				margin-top: 20px;
			}

			#example_info {
				margin-bottom: 20px;
				margin-left: 10px;
			}

			#example_paginate {
				margin-right: 10px;
			}

			#pat_appointments {
				margin-top: 10px;
			}
		</style>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
										<li  >
											<a href="appointments.php">
												<i class="fas fa-calendar-check"></i>
												<span>Appointments</span>
											</a>
										</li>
										<li class="active">
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



<div class="row">
	<div class="col-md-12">
		<h4 class="mb-4"> My Patients </h4>
		<div class="appointment-tab">
		<div class="tab-content">

   <!-- Upcoming Appointment Tab -->
<div class="tab-pane show active" id="upcoming-appointments">
<div class="card card-table mb-0">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-center mb-0" id='example'>
				<thead>
					<tr>
						<th>Patient Name</th>
						<th>Phone</th>
						<th>Last Booking Date</th>
						<th></th>
					</tr>
				</thead>
				<form method="post" action="">

					<?php
					$idp = $_SESSION['id'];
					$reesult = mysqli_query($conn, "SELECT MAX(date) as `date` , `iddoc`,`dateM`,`time`,`idus`,`code` FROM `appointment` WHERE `code`= '3' and  `iddoc` = '$idp' ");
					while ($roow = mysqli_fetch_array($reesult)) {
						$idus = $roow['idus'];
						$sqql = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idus'";
						$result = mysqli_query($conn, $sqql);
						while ($row = mysqli_fetch_array($result)) {
							
					?>

								<tr>
									<td>
										<h2 class="table-avatar">
											<a href="patient-profile.php?id=<?php echo $row["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $row["image"] ?>" alt="User Image"></a>
											<a href="patient-profile.php?id=<?php echo $row["IDusers"] ?>"><?php echo $row["name"] ?> <?php echo $row["surname"] ?> <span>Patient</span></a>
										</h2>
									</td>
									<td><?php echo $row["phone"] ?></td>
									<td><?php echo $roow["date"] ?> <span class="d-block text-info"><?php echo $roow["time"] ?></span></td>
									<td class="text-right">
										<div class="table-action">
										<a href="patient-profile.php?id=<?php echo $row["IDusers"] ?>" class="btn btn-sm bg-info-light fa-view " >
											<i class="far fa-eye"></i> View Profile
										</a>
										</div>
									</td>
								</tr>

						<?php

							
						}
					}	
					?>

				</form>
			</table>
		</div>
	</div>
</div>
</div>
 <!-- /Upcoming Appointment Tab -->



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
		<footer class="footer">
			<?php include_once("footer.php"); ?>
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
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({});
		});
	</script>
		
	</body>


</html>