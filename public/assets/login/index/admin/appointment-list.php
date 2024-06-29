<?php

include_once("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
            #example3_filter{
				margin-right: 10px;
                margin-top: 20px;
			}
			#example3_length{
				margin-left: 10px;
                margin-top: 20px;
			}
			#example3_info{
				margin-bottom: 20px;
				margin-left: 10px;
			}
			#example3_paginate
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
							<li> 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li class="active"> 
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
								<a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
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
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Confirmed</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Cancelled</a>
											</li>
											
                                            <li class="nav-item">
												<a class="nav-link" href="#pat_prescription" data-toggle="tab">Pending</a>
											</li>
											
                                            <li class="nav-item">
												<a class="nav-link" href="#pat_prescriptio" data-toggle="tab">Done</a>
											</li>
											
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										
										<div id="pat_appointments" class="tab-pane fade active show">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id='example'>
															<thead>
																<tr>
																<th>Doctor Name</th>
												              	<th>Speciality</th>
												              	<th>Patient Name</th>
												              	<th>Apointment Time</th>
												              	<th>Status</th>
												              	<th>Delete</th>
																<th>
																<div class="actions">
													            <input id="checkall" type="checkbox"    >
													            </div>
																</th>
												              	</tr>
															</thead>
															<tbody>
                                                            <?php 
                          
                           $reesult = mysqli_query($conn,"SELECT * FROM appointment where code = '1' ");
                          while(  $row = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$row['iddoc'];
                              $sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($roow = mysqli_fetch_array($result))  
                          { 
                            $idsus=$row['idus'];
                            $sl = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idsus'";
                            $rsult = mysqli_query($conn, $sl); 
                        while($rooow = mysqli_fetch_array($rsult))  
                        {
                               ?>
															
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $roow["image"] ?>" alt="User Image"></a>
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>">Dr. <?php echo $roow["name"] ?> <?php echo $roow["surname"] ?></a>
														</h2>
													</td>
													<td>Dental</td>
													<td>
														<h2 class="table-avatar">
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $rooow["image"] ?>" alt="User Image"></a>
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>"><?php echo $rooow["name"] ?> <?php echo $rooow["surname"] ?> </a>
														</h2>
													</td>
													<td><?php echo $row["date"] ?> <span class="text-primary d-block"><?php echo $row["time"] ?></span></td>
													<td><span class="badge badge-pill bg-success-light">Confirm</span></td>
													<td >
														<div class="actions">
                                                        <a  class="btn btn-sm bg-danger-light callbtmodel "  data-idm="<?php echo $row["idapp"] ?>"  data-toggle="modal" href="#delete_modal">
																<i class="fe fe-trash"></i> Delete
															</a>
															
														</div>
													</td>
													<td>
													<div class="actions">
													<input type="checkbox" class="checkitem" value="<?php echo $row["idapp"] ?>" id="checkitem"  >
													</div>
													</td>
												</tr>
                                                <?php
                                              }
                                        }
                          }
                          ?>		
															</tbody>
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
														<table class="table table-hover table-center mb-0" id='example1'>
                                                        <thead>
																<tr>
                                                                <th>Doctor Name</th>
												              	<th>Speciality</th>
												              	<th>Patient Name</th>
												              	<th>Apointment Time</th>
												              	<th>Status</th>
												              	<th>Delete</th>
																  <th>
																<div class="actions">
													            <input id="checkall1" type="checkbox"    >
													            </div>
																</th>
												              	</tr>
															</thead>
															<tbody>
                                                            <?php 
                          
                           $reesult = mysqli_query($conn,"SELECT * FROM appointment where code = '2' ");
                          while(  $row = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$row['iddoc'];
                              $sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($roow = mysqli_fetch_array($result))  
                          { 
                            $idsus=$row['idus'];
                            $sl = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idsus'";
                            $rsult = mysqli_query($conn, $sl); 
                        while($rooow = mysqli_fetch_array($rsult))  
                        {
                               ?>
															
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $roow["image"] ?>" alt="User Image"></a>
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>">Dr. <?php echo $roow["name"] ?> <?php echo $roow["surname"] ?></a>
														</h2>
													</td>
													<td>Dental</td>
													<td>
														<h2 class="table-avatar">
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $rooow["image"] ?>" alt="User Image"></a>
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>"><?php echo $rooow["name"] ?> <?php echo $rooow["surname"] ?> </a>
														</h2>
													</td>
													<td><?php echo $row["date"] ?> <span class="text-primary d-block"><?php echo $row["time"] ?></span></td>
													<td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
													<td >
														<div class="actions">
															<a  class="btn btn-sm bg-danger-light callbtmodel "  data-idm="<?php echo $row["idapp"] ?>"  data-toggle="modal" href="#delete_modal">
																<i class="fe fe-trash"></i> Delete
															</a>
															
														</div>
													</td>
													<td>
													<div class="actions">
													<input type="checkbox" class="checkitem1" value="<?php echo $row["idapp"] ?>" id="checkitem1"  >
													</div>
													</td>
												</tr>
                                                <?php
                                              }
                                        }
                          }
                          ?>		
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->
                                        
										<!-- Medical Records Tab -->
										<div class="tab-pane fade" id="pat_prescription">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id='example2' >
                                                        <thead>
																<tr>
                                                                <th>Doctor Name</th>
												              	<th>Speciality</th>
												              	<th>Patient Name</th>
												              	<th>Apointment Time</th>
												              	<th>Status</th>
												              	<th>Delete</th>
																  <th>
																<div class="actions">
													            <input id="checkall2" type="checkbox"    >
													            </div>
																</th>
												              	</tr>
															</thead>
															<tbody>
                                                            <?php 
                          
                           $reesult = mysqli_query($conn,"SELECT * FROM appointment where code = '0' ");
                          while(  $row = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$row['iddoc'];
                              $sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($roow = mysqli_fetch_array($result))  
                          { 
                            $idsus=$row['idus'];
                            $sl = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idsus'";
                            $rsult = mysqli_query($conn, $sl); 
                        while($rooow = mysqli_fetch_array($rsult))  
                        {
                               ?>
															
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $roow["image"] ?>" alt="User Image"></a>
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>">Dr. <?php echo $roow["name"] ?> <?php echo $roow["surname"] ?></a>
														</h2>
													</td>
													<td>Dental</td>
													<td>
														<h2 class="table-avatar">
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $rooow["image"] ?>" alt="User Image"></a>
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>"><?php echo $rooow["name"] ?> <?php echo $rooow["surname"] ?> </a>
														</h2>
													</td>
													<td><?php echo $row["date"] ?> <span class="text-primary d-block"><?php echo $row["time"] ?></span></td>
													<td><span class="badge badge-pill bg-warning-light">Pending</span></td>
													<td >
														<div class="actions">
                                                        <a  class="btn btn-sm bg-danger-light callbtmodel "  data-idm="<?php echo $row["idapp"] ?>"  data-toggle="modal" href="#delete_modal">
																<i class="fe fe-trash"></i> Delete
															</a>
															
														</div>
													</td>
													<td>
													<div class="actions">
													<input type="checkbox" class="checkitem2" value="<?php echo $row["idapp"] ?>" id="checkitem2"  >
													</div>
													</td>
												</tr>
                                                <?php
                                              }
                                        }
                          }
                          ?>		
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Medical Records Tab -->
                                        
										<!-- Billing Tab -->
										<div class="tab-pane fade" id="pat_prescriptio">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id='example3'>
                                                        <thead>
																<tr>
                                                                <th>Doctor Name</th>
												              	<th>Speciality</th>
												              	<th>Patient Name</th>
												              	<th>Apointment Time</th>
												              	<th>Status</th>
												              	<th>Delete</th>
																  <th>
																<div class="actions">
													            <input id="checkall3" type="checkbox"    >
													            </div>
																</th>
												              	</tr>
															</thead>
															<tbody>
                                                            <?php 
                          
                           $reesult = mysqli_query($conn,"SELECT * FROM appointment where code = '3' ");
                          while(  $row = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$row['iddoc'];
                              $sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($roow = mysqli_fetch_array($result))  
                          { 
                            $idsus=$row['idus'];
                            $sl = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idsus'";
                            $rsult = mysqli_query($conn, $sl); 
                        while($rooow = mysqli_fetch_array($rsult))  
                        {
                               ?>
															
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $roow["image"] ?>" alt="User Image"></a>
															<a href="../doctor-profile.php?id=<?php echo $roow["IDusers"] ?>">Dr. <?php echo $roow["name"] ?> <?php echo $roow["surname"] ?></a>
														</h2>
													</td>
													<td>Dental</td>
													<td>
														<h2 class="table-avatar">
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $rooow["image"] ?>" alt="User Image"></a>
															<a href="../patient-profile.php?id=<?php echo $rooow["IDusers"] ?>"><?php echo $rooow["name"] ?> <?php echo $rooow["surname"] ?> </a>
														</h2>
													</td>
													<td><?php echo $row["date"] ?> <span class="text-primary d-block"><?php echo $row["time"] ?></span></td>
													<td><span class="badge badge-pill bg-success-light" style="background-color: rgb(0 178 255 / 12%) !important; color: #0066ffcf !important;">Done</span></td>
													<td >
														<div class="actions">
                                                        <a  class="btn btn-sm bg-danger-light callbtmodel "  data-idm="<?php echo $row["idapp"] ?>"  data-toggle="modal" href="#delete_modal">
																<i class="fe fe-trash"></i> Delete
															</a>
															
														</div>
													</td>
													<td>
													<div class="actions">
													<input type="checkbox" class="checkitem3" value="<?php echo $row["idapp"] ?>" id="checkitem3"  >
													</div>
													</td>
												</tr>
                                                <?php
                                              }
                                        }
                          }
                          ?>		
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Billing Tab -->
										
										  
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
            <!-- Delete Modal --> 
            <form  method="POST" >
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
           
				<div class="modal-dialog modal-dialog-centered" role="document" >
                
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
                                <input type= "hidden" name="test" id="test" >
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="submit" class="btn btn-primary" name="submit">Save </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
               
      
			</div>
        </form >
        <?php 
	  if(isset($_POST['submit'])){
		$iduss=$_POST['test'];								
		// Select database																    
		$trSQL = "DELETE FROM `appointment` WHERE  `idapp`= '$iduss' " ;
		$qrd = mysqli_query($conn, $trSQL);
		?><meta http-equiv="Refresh" content="0; url=appointment-list.php"><?php
	  }
	  ?>
			<!-- /Delete Modal -->
		
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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
	    <script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({});
		});
        $(document).ready(function() {
			$('#example1').DataTable({});
		});
        $(document).ready(function() {
			$('#example2').DataTable({});
		});
        $(document).ready(function() {
			$('#example3').DataTable({});
		});
	
	   </script>
		  <script>
$( "#checkall" ).change(function() {
	$('.checkitem').prop('checked',$(this).prop("checked"));
});
$(document).ready(function() {
	$('#example_filter').append( '<div class="actions"><a class="btn btn-sm bg-danger-light callbtmodel" name="btn_deletea" id ="btn_deletea"><i class="fe fe-trash"></i> Delete Selected </a></div>' );
		});
		$(document).ready(function() {
$( "#btn_deletea" ).click(function() {
	swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
	$('.checkitem').prop('checked',$(this).prop("checked"));
	var id = $('.checkitem:checked').map(function(){
		return $(this).val()
	}).get().join(' ')
	$.post('data.php?p=del',{id: id }, function(data){
		location.reload();
	})
}
    })

	
	
});
});


$( "#checkall1" ).change(function() {
	$('.checkitem1').prop('checked',$(this).prop("checked"));
});
$(document).ready(function() {
	$('#example1_filter').append( '<div class="actions"><a class="btn btn-sm bg-danger-light callbtmodel" name="btn_deletea1" id ="btn_deletea1"><i class="fe fe-trash"></i> Delete Selected </a></div>' );
		});
		$(document).ready(function() {
$( "#btn_deletea1" ).click(function() {
	
	
	swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
	$('.checkitem1').prop('checked',$(this).prop("checked"));
	var id = $('.checkitem1:checked').map(function(){
		return $(this).val()
	}).get().join(' ')
	$.post('data.php?p=del1',{id: id }, function(data){
		location.reload();
	})
}
    })
});
});


$( "#checkall2" ).change(function() {
	$('.checkitem2').prop('checked',$(this).prop("checked"));
});
$(document).ready(function() {
	$('#example2_filter').append( '<div class="actions"><a class="btn btn-sm bg-danger-light callbtmodel" name="btn_deletea2" id ="btn_deletea2"><i class="fe fe-trash"></i> Delete Selected </a></div>' );
		});
		$(document).ready(function() {
$( "#btn_deletea2" ).click(function() {
	
	swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
	$('.checkitem2').prop('checked',$(this).prop("checked"));
	var id = $('.checkitem2:checked').map(function(){
		return $(this).val()
	}).get().join(' ')
	$.post('data.php?p=del2',{id: id }, function(data){
		location.reload();
	})
}
    })
	
	
});
});



$( "#checkall3" ).change(function() {
	$('.checkitem3').prop('checked',$(this).prop("checked"));
});
$(document).ready(function() {
	$('#example3_filter').append( '<div class="actions"><a class="btn btn-sm bg-danger-light callbtmodel" name="btn_deletea3" id ="btn_deletea3"><i class="fe fe-trash"></i> Delete Selected </a></div>' );
		});
		$(document).ready(function() {
$( "#btn_deletea3" ).click(function() {
	swal("Are you sure you want to do this?", {
  buttons: ["cancel", "Yes"],
});
swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
	$('.checkitem3').prop('checked',$(this).prop("checked"));
	var id = $('.checkitem3:checked').map(function(){
		return $(this).val()
	}).get().join(' ')
	$.post('data.php?p=del3',{id: id }, function(data){
		location.reload();
	})
}
    })

	
});
});
         </script>
	
    </body>


</html>