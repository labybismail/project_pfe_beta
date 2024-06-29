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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		
		
		
	
	
	</head>
	<body>
		<style>
			#example2_filter{
				margin-right: 10px;
                margin-top: 20px;
			}
			#example2_length{
				margin-left: 10px;
                margin-top: 20px;
			}
			#example2_info{
				margin-bottom: 20px;
				margin-left: 10px;
			}
			#example2_paginate
			{
				margin-right: 10px;
			}
			#example1_filter{
				margin-right: 10px;
                margin-top: 20px;
			}
			#example1_length{
				margin-left: 10px;
                margin-top: 20px;
			}
			#example1_info{
				margin-bottom: 20px;
				margin-left: 10px;
			}
			#example1_paginate
			{
				margin-right: 10px;
			}
			#example_filter{
				margin-right: 10px;
                margin-top: 20px;
			}
			#example_length{
				margin-left: 10px;
                margin-top: 20px;
			}
			#example_info{
				margin-bottom: 20px;
				margin-left: 10px;
			}
			#example_paginate
			{
				margin-right: 10px;
			}

		</style>
		

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			 <!-- Header -->
			 <?php
           if ($_SESSION['usertype']=='user')
           {
              include_once("headerU.php"); 
           } 
           
           
           elseif (!isset($_SESSION) or $_SESSION['usertype']!='user' or $_SESSION['usertype']=='')
           {
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
											
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
							
							<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 30px;"><div class="profile-sidebar">
									<div class="widget-profile pro-widget-content">
										<div class="profile-info-widget" >
											<a href="Profile_Sidebar.php" class="booking-doc-img">
											  <img src="<?php echo $_SESSION['image']?>" />
											</a>
	
											<div class="profile-det-info">
												<h3><?php echo $_SESSION['name']?> <?php echo $_SESSION['surname']?></h3>
												<div class="patient-details">
													<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
												</div>
											</div>
										</div>
									</div>
									<div class="dashboard-widget">
										<nav class="dashboard-menu">
											<ul>
												<li class="active">
													<a href="patient-dashboard.php">
														<i class="fas fa-columns"></i>
														<span>Dashboard</span>
													</a>
												</li>
												<li>
													<a href="favourites.php">
														<i class="fas fa-bookmark"></i>
														<span>Favourites</span>
													</a>
												</li>
												<li>
													<a href="dependent.php">
														<i class="fas fa-users"></i>
														<span>Dependent</span>
													</a>
												</li>												
												<li>
													<a href="medical-records.php">
														<i class="fas fa-clipboard"></i>
														<span>Add Medical Records</span>
													</a>
												</li>
												
												<li >
													<a href="profile-settings.php">
														<i class="fas fa-user-cog"></i>
														<span>Profile Settings</span>
													</a>
												</li>
												<li>
													<a href="change-password.php">
														<i class="fas fa-lock"></i>
														<span>Change Password</span>
													</a>
												</li>
												<li>
													<a  href="..\logout.php?id=<?php $_SESSION['id'];?>">
														<i class="fas fa-sign-out-alt"></i>
														<span>Logout</span>
													</a>
												</li>
											</ul>
										</nav>
									</div>
	
								</div><div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 385px; height: 1316px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></div>

						  <!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">

						<?php 
                          $d=date("Y-m-d");
						  $t =date("h:i");
                        $rlt = mysqli_query($conn,"UPDATE `appointment` SET `code`='3' WHERE `date`<'$d' and `code`='1'");
						$rl = mysqli_query($conn,"UPDATE `appointment` SET `code`='2' WHERE `date`<'$d' and `code`='0'");
						   ?>

							

							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Medical Records</span></a>
											</li>
											
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<?php
									$idp=$_SESSION['id'];
									$sql = "SELECT * FROM appointment where idus = '$idp' ";
									
									$result = mysqli_query($conn,"SELECT * FROM appointment where idus = '$idp' ");
									?>
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id='example1'>
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Message</th>
																	<th>Status</th>
																	
																</tr>
																</thead>  
                          <?php 
                          $idp=$_SESSION['id'];
                           $reesult = mysqli_query($conn,"SELECT * FROM appointment where idus = '$idp' ");
                          while(  $roow = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$roow['iddoc'];
                              $sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($row = mysqli_fetch_array($result))  
                          {  
							$code=$roow['code'];
							if($code==2)
							{
								 
								 echo'
								 <tr>
									   <td>
										   <h2 class="table-avatar">
											   <a href="doctor-profile.php?id='.$row["IDusers"].'" class="avatar avatar-sm mr-2">
												   <img class="avatar-img rounded-circle" src="'.$row["image"].'" alt="User Image">
											   </a>
											   <a href="doctor-profile.php?id='.$row["IDusers"].'">Dr. '.$row["name"].' '.$row["surname"].'<span>Dental</span></a>
										   </h2>
									   </td>
									   <td>'.$roow["date"].'<span class="d-block text-info">'.$roow["time"].'</span></td>
									   <td>'.$roow["dateM"].'</td>
									   <td>'.$roow["message"].'</td>
									   <td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
									   </tr>
									   '; 
							}
							elseif($code==1)
							{
								
								 echo'
								 <tr>
									   <td>
										   <h2 class="table-avatar">
											   <a href="doctor-profile.php?id='.$row["IDusers"].'" class="avatar avatar-sm mr-2">
												   <img class="avatar-img rounded-circle" src="'.$row["image"].'" alt="User Image">
											   </a>
											   <a href="doctor-profile.php?id='.$row["IDusers"].'">Dr. '.$row["name"].' '.$row["surname"].'<span>Dental</span></a>
										   </h2>
									   </td>
									   <td>'.$roow["date"].'<span class="d-block text-info">'.$roow["time"].'</span></td>
									   <td>'.$roow["dateM"].'</td>
									   <td>'.$roow["message"].'</td>
									   <td><span class="badge badge-pill bg-success-light">Confirm</span></td>
									   </tr>
									   '; 
							}
							elseif($code==3)
							{
								
								 echo'
								 <tr>
									   <td>
										   <h2 class="table-avatar">
											   <a href="doctor-profile.php?id='.$row["IDusers"].'" class="avatar avatar-sm mr-2">
												   <img class="avatar-img rounded-circle" src="'.$row["image"].'" alt="User Image">
											   </a>
											   <a href="doctor-profile.php?id='.$row["IDusers"].'">Dr. '.$row["name"].' '.$row["surname"].'<span>Dental</span></a>
										   </h2>
									   </td>
									   <td>'.$roow["date"].'<span class="d-block text-info">'.$roow["time"].'</span></td>
									   <td>'.$roow["dateM"].'</td>
									   <td>'.$roow["message"].'</td>
									   <td><span class="badge badge-pill bg-success-light" style="background-color: rgb(0 178 255 / 12%) !important;
									   color: #0066ffcf !important;">Done</span></td>
									   </tr>
									   '; 
							}
							else
							{
							  
								echo'
								<tr>
									  <td>
										  <h2 class="table-avatar">
											  <a href="doctor-profile.php?id='.$row["IDusers"].'" class="avatar avatar-sm mr-2">
												  <img class="avatar-img rounded-circle" src="'.$row["image"].'" alt="User Image">
											  </a>
											  <a href="doctor-profile.php?id='.$row["IDusers"].'">Dr. '.$row["name"].' '.$row["surname"].'<span>Dental</span></a>
										  </h2>
									  </td>
									  <td>'.$roow["date"].'<span class="d-block text-info">'.$roow["time"].'</span></td>
									  <td>'.$roow["dateM"].'</td>
									  <td>'.$roow["message"].'</td>
									  <td><span class="badge badge-pill bg-warning-light">Pending</span></td>
									  </tr>
									  ';
									  
							}
                          } 
                         } 
                          ?>  
                     
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="pat_prescriptions">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id='example' >
															<thead>
																<tr>
																	<th>Created by </th>
																	<th>Date </th>
																	<th></th>
																</tr>     
															</thead>
															<?php 
                          $idp=$_SESSION['id'];
                           $reesult = mysqli_query($conn,"SELECT * FROM prescriptions where idus = '$idp' ");
                          while(  $roow = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$roow['iddoc'];
                              $sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($row = mysqli_fetch_array($result))  
                          {  
							
								
								 echo'
                                 <tr>
								 <td>
                                     <h2 class="table-avatar">
                                         <a href="doctor-profile.php?id='.$row["IDusers"].'" class="avatar avatar-sm mr-2">
                                             <img class="avatar-img rounded-circle" src="'.$row["image"].'" alt="User Image">
                                         </a>
                                         <a href="doctor-profile.php?id='.$row["IDusers"].'">Dr. '.$row["name"].' '.$row["surname"].'<span>Dental</span></a>
                                     </h2>
                                 </td>
                                 <td>'.$roow["date"].'</td>
                                 
                                 
                                 <td class="text-right">
                                     <div class="table-action">
                                         <a download= "'.$roow["file"].'" href="'.$roow["file"].'" class="btn btn-sm bg-primary-light">
                                             <i class="fas fa-print"></i> Download
                                         </a>
                                         
										
                                     </div>
                                 </td>
                             </tr>
									   '; 
							
                          } 
                         } 
                          ?>  
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->
											
										<!-- Medical Records Tab -->
										<div id="pat_medical_records" class="tab-pane fade">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id='example2'>
															<thead>
															<tr>
																	
																	<th>Created by </th>
																	<th>Title </th>
																	<th>Description</th>
																	<th>symptoms</th>
																	<th>Date</th>
																	<th></th>
																</tr>     
															</thead>
															
															<?php 
                          $id=$_SESSION['id'];
                           $reeslt = mysqli_query($conn,"SELECT * FROM medicalr where idu = '$id' ");
                          while(  $roooow = mysqli_fetch_array($reeslt) ) 
                          {
                              $ids=$roooow['iddoc'];
                              $sl = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$ids'";
                              $reslt = mysqli_query($conn, $sl); 
                          while($rooow = mysqli_fetch_array($reslt))  
                          {  
							
								
								 echo'
                                 <tr>
									
									<td>
										<h2 class="table-avatar">
											<a href="doctor-profile.php?id='.$rooow["IDusers"].'" class="avatar avatar-sm mr-2">
												<img class="avatar-img rounded-circle" src="'.$rooow["image"].'" alt="User Image">
											</a>
											<a href="doctor-profile.php?id='.$rooow["IDusers"].'">Dr.'.$rooow["name"].' '.$rooow["surname"].' <span>Dental</span></a>
										</h2>
									</td>
									<td>'.$roooow["name"].'</td>
									<td>'.$roooow["description"].'</td>
									<td>'.$roooow["symptoms"].'</td>
									<td>'.$roooow["date"].'</td>
									<td class="text-right">
										<div class="table-action">
										
											<a  download= "'.$roooow["file"].'" href="'.$roooow["file"].'"> <i class="fa fa-download"></i></a>
										</div>
									</td>
								</tr>
									   '; 
							
                          } 
                         } 
                          ?> 
																
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Medical Records Tab -->
										
										
										  
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
		<footer class="footer">
			<!-- Footer Top -->
			<?php  include_once("footer.php"); ?>
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
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
		
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
		
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	
    $(document).ready(function() {
        $('#example').DataTable({});
    } );
	$(document).ready(function() {
        $('#example1').DataTable({});
    } );
	$(document).ready(function() {
        $('#example2').DataTable({});
    } );
 </script> 
 <script>
$(Document).on('click','.callbtmodel',function(e){
	var id= $(this).attr("data-idm");
	$('#test').val(id);

});
</script>
		
	</body>


</html>