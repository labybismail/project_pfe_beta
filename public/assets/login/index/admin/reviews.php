<?php
include_once("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
    
<head>
		

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Reviews Page</title>
		
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
							<li> 
								<a href="appointment-list.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
							</li>
							<li> 
								<a href="doctor-list.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
							</li>
							<li> 
								<a href="patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li class="active"> 
								<a href="reviews.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="transactions-list.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="settings.php"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arurow"></span></a>
								<ul style="display: none;">
									<li><a href="invoice-report.html">Invoice Reports</a></li>
								</ul>
							</li> -->

							<li> 
								<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
							
							<!-- <li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arurow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arurow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arurow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li> -->
								</ul>
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
						<div class="urow">
							<div class="col-sm-12">
								<h3 class="page-title">Reviews</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Reviews</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="urow">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0" id ="example">
											<thead>
												<tr>
													<th>Patient Name</th>
													<th>Doctor Name</th>
													<th>Ratings</th>
													<th>Description</th>
													<th>Date</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<?php 
										
											
											
											
												//stars
												$reveiws_star_sl = "SELECT * FROM rating_stars  ";
												$reveiws_star_rs = mysqli_query($conn, $reveiws_star_sl);
										
											?>
											<tbody>
		
												<?php while( $reveiws_stars_row = mysqli_fetch_array($reveiws_star_rs)){
													$id_user = $reveiws_stars_row['iduser_rating'];
													$id_doc = $reveiws_stars_row['id_Doc_rating'];
													
													$reveiws_cmt_sl = " SELECT * FROM comments WHERE  user_id = $id_user and Doc_id = $id_doc ";
													$reveiws_cmt_rs = mysqli_query($conn, $reveiws_cmt_sl);
													$reveiws_cmt_row = mysqli_fetch_array($reveiws_cmt_rs);
													
													
														$reveiws_user_sl = " SELECT * FROM users WHERE usertype = 'user' and  IDusers = $id_user  ";
														$reveiws_user_rs = mysqli_query($conn, $reveiws_user_sl);
														$reveiws_user_row = mysqli_fetch_array($reveiws_user_rs);
						
														$reveiws_doc_sl = " SELECT * FROM users WHERE usertype = 'doctor' and  IDusers = $id_doc  ";
														$reveiws_doc_rs = mysqli_query($conn, $reveiws_doc_sl);
														$reveiws_doc_row = mysqli_fetch_array($reveiws_doc_rs);

													
													?>
													<tr>
													<td>
														<h2 class="table-avatar">
															<a href="../patient-profile.php?id=<?php echo $reveiws_user_id["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo "../".$reveiws_user_row["image"] ?>" alt="User Image"></a>
															<a href="../patient-profile.php?id=<?php echo $reveiws_user_id["IDusers"] ?>"><?php echo $reveiws_user_row['name']." ".$reveiws_user_row['surname']?> </a>
														</h2>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="../doctor-profile.php?id=<?php echo $reveiws_doc_row["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle"  src="<?php echo "../".$reveiws_doc_row["image"] ?>" alt="Doctor Image"></a>
															<a href="../doctor-profile.php?id=<?php echo $reveiws_doc_row["IDusers"] ?>"><?php echo $reveiws_doc_row['name']." ". $reveiws_doc_row['surname'] ?></a>
														</h2>
													</td>
													
													<?php
													//stars avg 
													if($reveiws_stars_row["title_rating"] == 5){
														echo '	<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														</td>';
													}elseif($reveiws_stars_row["title_rating"] == 4){
															echo '<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
														</td>';
													}elseif($reveiws_stars_row["title_rating"] == 3){
															echo '	<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														</td>';
													}elseif($reveiws_stars_row["title_rating"] == 2){
																echo '	<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														</td>';
													}elseif($reveiws_stars_row["title_rating"] == 1){
													echo '	<td>
														<i class="fe fe-star text-warning"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														</td>';
													}elseif($reveiws_stars_row["title_rating"] == 0){
														echo '<td>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														<i class="fe fe-star-o text-secondary"></i>
														</td>';
													}
													?>
													
													<td>
														<?php echo $reveiws_cmt_row['msg'] ?>
													</td>
														<td><?php echo $reveiws_cmt_row['commented_on'] ?><br><small><?php echo $reveiws_cmt_row['created_at'] ?></small></td>
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-danger-light  dl_adm_1" data-toggle="modal" data-id ="<?php echo $reveiws_cmt_row['id'] ?>" data-star ="<?php echo $reveiws_stars_row['id_rating'] ?>" href="#delete_modal">
																<i class="fe fe-trash  "></i> Delete
																
															</a>
														</div>
													</td>
												</tr>

												<?php
												}
												?>
												
											

			<!-- /Page Wrapper -->
			
			<!-- Delete Modal -->
		
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>--><form method="POST"  action="reviews.php" >
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" class="btn btn-primary delete_cmt_btn_adm " name = "delete_cmt_btn_adm"> Save </button>
								<button type="button" class="btn btn-danger iddelete_star_btn_adm"  data-dismiss="modal"   name = "iddelete_star_btn_adm"> Close </button>
							</div></form>
						</div>	
					</div>
				</div>
			</div>

			<?php 
				if(isset($_POST['post_id_cmt_adm'])){
					$id_cmt_selected = $_POST['post_id_cmt_adm'];
					$id_star_selected = $_POST['post_id_star_adm'];
					$dl_cmt_adm_sl = "DELETE FROM comments where id =' $id_cmt_selected' ";
					$dl_cmt_adm_rs = mysqli_query($conn, $dl_cmt_adm_sl);
					$dl_star_adm_sl = "DELETE FROM rating_stars where id_rating =' $id_star_selected' ";
					$dl_star_adm_rs = mysqli_query($conn, $dl_star_adm_sl);

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
			<!-- DATATABLE -->
		<script> 
			$(document).ready(function() {
			$('#example').DataTable({});
            $('#example1').DataTable({});
			});
	
		</script>
	
	<!-- <script src="../assets/js/custom.Js"></script> -->
	<script src="assets/js/custom.Js"></script>

		
    </body>



</html>
