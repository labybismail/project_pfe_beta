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

		<!-- Jquery UI-->
		<link rel="stylesheet" href="assets/plugins/jquery-ui/jquery-ui.min.css">

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
									<li class="breadcrumb-item active" aria-current="page">Medical Details</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Medical Details</h2>
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
												<li>
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
												<li class="active">
													<a href="medical-details.php">
														<i class="fas fa-file-medical-alt"></i>
														<span>Medical Details</span>
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
	
								</div>  <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 385px; height: 1316px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></div>

						  <!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-sm-12">
									<div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title float-left">Medical details</h4>
                                            <a href="#modal_medical_form" class="btn btn-primary float-right" data-toggle="modal">Add Details</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="card card-table mb-0">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>BMI</th>
                                                                    <th class="text-center">Heart Rate</th>
                                                                    <th class="text-center">FBC Status</th>
                                                                    <th>Weight</th>
                                                                    <th>Order date</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Richard Wilson</td>
                                                                    <td>23.7</td>
                                                                    <td class="text-center">89</td>
                                                                    <td class="text-center">140</td>
                                                                    <td>74Kg</td>
                                                                    <td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                                    <td>
                                                                        <div class="table-action">
                                                                            <a href="#edit_medical_form" class="btn btn-sm bg-info-light" data-toggle="modal">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Champagne</td>
                                                                    <td>25.2</td>
                                                                    <td class="text-center">92</td>
                                                                    <td class="text-center">135</td>
                                                                    <td>73Kg</td>
                                                                    <td>3 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                                    <td>
                                                                        <div class="table-action">
                                                                            <a href="#edit_medical_form" class="btn btn-sm bg-info-light" data-toggle="modal">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Vena</td>
                                                                    <td>24.5</td>
                                                                    <td class="text-center">90</td>
                                                                    <td class="text-center">125</td>
                                                                    <td>73.5Kg</td>
                                                                    <td>1 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
                                                                    <td>
                                                                        <div class="table-action">
                                                                            <a href="#edit_medical_form" class="btn btn-sm bg-info-light" data-toggle="modal">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Tressie</td>
                                                                    <td>24.2</td>
                                                                    <td class="text-center">95</td>
                                                                    <td class="text-center">128</td>
                                                                    <td>10.2Kg</td>
                                                                    <td>30 Oct 2019 <span class="d-block text-info">9.00 AM</span></td>
                                                                    <td>
                                                                        <div class="table-action">
                                                                            <a href="#edit_medical_form" class="btn btn-sm bg-info-light" data-toggle="modal">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Christopher</td>
                                                                    <td>24.7</td>
                                                                    <td class="text-center">99</td>
                                                                    <td class="text-center">122</td>
                                                                    <td>12.8Kg</td>
                                                                    <td>28 Oct 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                                    <td>
                                                                        <div class="table-action">
                                                                            <a href="#edit_medical_form" class="btn btn-sm bg-info-light" data-toggle="modal">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                <i class="fas fa-trash-alt"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
			<!-- Footer Top -->
			<?php  include_once("footer.php"); ?>
		<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->

        <!-- Add Medical Detail -->
        <div id="modal_medical_form" class="modal fade custom-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="#" enctype="multipart/form-data" autocomplete="off" method="post"> 
                        <div class="modal-header">
                            <h5 class="modal-title">Add new data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" name="id"> 
                            <input type="hidden" value="insert" name="method">
                            <div class="form-group">
                                <label class="control-label mb-10"> BMI <span class="text-danger">*</span></label>
                                <input type="text" name="bmi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Heart rate </label>
                                <input type="text" name="hr" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Weight</label>
                                <input type="text" name="Weight" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Fbc</label>
                                <input type="text" id="Fbc" name="Fbc" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Created Date </label>
                                <input type="text" name="dob" id="dob" value="" readonly="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-outline btn-success ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Add Medical Detail -->

		<!-- Edit Medical Detail -->
        <div id="edit_medical_form" class="modal fade custom-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="#" enctype="multipart/form-data" autocomplete="off" method="post"> 
                        <div class="modal-header">
                            <h5 class="modal-title">Add new data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" name="id"> 
                            <input type="hidden" value="insert" name="method">
                            <div class="form-group">
                                <label class="control-label mb-10"> BMI <span class="text-danger">*</span></label>
                                <input type="text" name="bmi" class="form-control" value="23.7">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Heart rate </label>
                                <input type="text" name="hr" class="form-control" value="89">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Weight</label>
                                <input type="text" name="Weight" class="form-control" value="74">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Fbc</label>
                                <input type="text" name="Fbc" class="form-control" value="140">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Created Date </label>
                                <input type="text" name="dob" id="editdob" value="11/11/2019" readonly="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-outline btn-success ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Edit Medical Detail -->

		<!-- jQuery -->
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
		<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/medical-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 13:17:32 GMT -->
</html>