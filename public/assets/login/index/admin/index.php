<?php

include_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		
		
    </head>
    <body>
    <style>
	        #example_filter , #example1_filter{
				margin-right: 10px;
                margin-top: 20px;
			}
			#example_length , #example1_length{
				margin-left: 10px;
                margin-top: 20px;
			}
			#example_info , #example_info {
				margin-bottom: 20px;
				margin-left: 10px;
			}
			#example_paginate , #example1_paginate
			{
				margin-right: 10px;
			}

		</style>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<!-- Header -->
			<?php

           if ($_SESSION['usertype']=='admin')
           {
              include_once("headerAd.php"); 
           } 
           else
           {
               session_destroy();
               header("location: ..\..\login-23.php");
           } 
               ?>
			<!-- /Header -->
			
				<!-- Sidebar -->
                <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="active"> 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li > 
								<a href="appointment-list.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
							</li>
							<li > 
								<a href="doctor-list.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
							</li>
							<li> 
								<a href="patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li> 
								<a href="reviews.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li>
								<a href="pharmacy-list.html"><i class="fe fe-vector"></i> <span>Clinic List</span></a></li>
							<li> 
								<a href="profile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>

							
							
						
						</ul>
					</div>
                </div>
            </div>
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
                    <?php
											
                                            $sl = "SELECT count(*) as cont FROM users where usertype = 'doctor' ";
                                            $resul = mysqli_query($conn, $sl);
                                            $f=mysqli_fetch_array($resul);
                                            $sqq = "SELECT count(*) as cont FROM users where usertype = 'user' ";
                                            $resut = mysqli_query($conn, $sqq);
                                            $fe=mysqli_fetch_array($resut);
                                            $sql = "SELECT count(*) as cont FROM appointment where code = '3' ";
                                            $reslt = mysqli_query($conn, $sql);
                                            $fee3=mysqli_fetch_array($reslt);
											$sql2 = "SELECT count(*) as cont FROM appointment where code = '2' ";
                                            $reslt2 = mysqli_query($conn, $sql2);
                                            $fee2=mysqli_fetch_array($reslt2);
											$sql1 = "SELECT count(*) as cont FROM appointment where code = '1' ";
                                            $reslt1 = mysqli_query($conn, $sql1);
                                            $fee1=mysqli_fetch_array($reslt1);
											$sql0 = "SELECT count(*) as cont FROM appointment where code = '0' ";
                                            $reslt0 = mysqli_query($conn, $sql0);
                                            $fee0=mysqli_fetch_array($reslt0);
                                            
                                            
                                          
                     ?>
					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-doc border-doc">
										<img src="assets/img/doctor.png" alt="User Image" class="avatar-img rounded-circle">
										</span>
										<div class="dash-count">
											<h3><?php echo $f["cont"] ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Doctors</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-doc w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-pat">
										<img src="assets/img/examination.png" alt="User Image" class="avatar-img rounded-circle">
										</span>
										<div class="dash-count">
											<h3><?php echo $fe["cont"] ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Patients</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-pat w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
										<img src="assets/img/appointment.png" alt="User Image" class="avatar-img rounded-circle">
										</span>
										<div class="dash-count">
											<h3><?php echo $fee0["cont"] ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment Pending</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success border-success	">
										<img src="assets/img/appointment.png" alt="User Image" class="avatar-img rounded-circle">
										</span>
										<div class="dash-count">
											<h3><?php echo $fee1["cont"] ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment Confirmed </h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-primary">
										<img src="assets/img/appointment.png" alt="User Image" class="avatar-img rounded-circle">
										</span>
										<div class="dash-count">
											<h3><?php echo $fee3["cont"] ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment Done</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
										<img src="assets/img/appointment.png" alt="User Image" class="avatar-img rounded-circle">
										</span>
										<div class="dash-count">
											<h3><?php echo $fee2["cont"] ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment Cancelled</h6>
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
										<table class="table table-hover table-center mb-0" id ="example">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Registration date</th>
													<th>Reviews</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
											
                                            $sqql = "SELECT * FROM users where usertype = 'doctor' ";
                                            $result = mysqli_query($conn, $sqql);
                                            
                                            while ($row = mysqli_fetch_array($result)) {  
                                              ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="../doctor-profile.php?id=<?php echo $row["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo "../" .$row["image"] ?>" alt="User Image"></a>
															<a href="../doctor-profile.php?id=<?php echo $row["IDusers"] ?>">Dr. <?php echo $row["name"] ?> <?php echo $row["surname"] ?></a>
														</h2>
													</td>
													<td>Dental</td>
													<td><?php echo $row["date"] ?></td>
													<?php
													//stars avg 
										if($row["thisDoc_avg"] == 5){
											echo '	<td>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											</td>';
										}elseif($row["thisDoc_avg"] == 4){
												echo '<td>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star-o text-secondary"></i>
											</td>';
										}elseif($row["thisDoc_avg"] == 3){
												echo '	<td>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											</td>';
										}elseif($row["thisDoc_avg"] == 2){
													echo '	<td>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											</td>';
										}elseif($row["thisDoc_avg"] == 1){
										echo '	<td>
											<i class="fe fe-star text-warning"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											</td>';
										}else{
											echo '<td>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											<i class="fe fe-star-o text-secondary"></i>
											</td>';
										}
										?>
												</tr>
												<?php
                                                }
                                                ?>
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
										<table class="table table-hover table-center mb-0" id ="example1" >
											<thead>
												<tr>													
													<th>Patient Name</th>
													<th>Phone</th>
													<th>Registration date</th>
													<th>CIN</th>													
												</tr>
											</thead>
											<tbody>
                                            <?php
																						
                                            $sqql = "SELECT * FROM users where usertype = 'user' ";
                                            $result = mysqli_query($conn, $sqql);                                           
                                            while ($row = mysqli_fetch_array($result)) {   
                                              ?>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="../patient-profile.php?id=<?php echo $row["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo "../".$row["image"] ?> " alt="User Image"></a>
															<a href="../patient-profile.php?id=<?php echo $row["IDusers"] ?>"><?php echo $row["name"] ?> <?php echo $row["surname"] ?> </a>
														</h2>
													</td>
													<td><?php echo $row["phone"] ?></td>
													<td><?php echo $row["date"] ?> </td>
													<td class="text-right"><?php echo $row["cin"] ?> </td>
												</tr>
												
                                                <?php
                                                }
                                                ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
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
		
		<script src="assets/plugins/raphael/raphael.min.js"></script>    
		<script src="assets/plugins/morris/morris.min.js"></script>  
		<script src="assets/js/chart.morris.js"></script>
		
		<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({});
            $('#example1').DataTable({});
		});
	</script>
		
    </body>


</html>