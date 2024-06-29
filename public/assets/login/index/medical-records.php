<?php  
include_once("config.php");
session_start();
$id=$_SESSION['id'];
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

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>

		<![endif]-->
	
        
		<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
        </script>	



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
									<li class="breadcrumb-item active" aria-current="page">Medical Records</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Medical Records</h2>
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
												<li class="active">
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
	
								</div>  <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 385px; height: 1316px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></div>

						  <!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-sm-12">
									<div class="card">
                                        <div class="card-body pt-0">
                                        
                                            <!-- Tab Menu -->
                                            <nav class="user-tabs mb-4">
                                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#pat_medicalrecords" data-toggle="tab">Medical Records</a>
                                                    </li>
                                                  
                                                </ul>
                                            </nav>
                                            <!-- /Tab Menu -->
                                            
                                            <!-- Tab Content -->
                                            <div class="tab-content pt-0">
                                                
                                                <!-- Medical Records Tab -->
                                                <div id="pat_medicalrecords" class="tab-pane fade show active">
                                                    <div class="text-right">		
                                                        <a href="#" class="add-new-btn" data-toggle="modal" data-target="#add_medical_records_modal">Add Medical Records</a>
                                                    </div>
                                                    <div class="card card-table mb-0">
                                                        <div class="card-body">
                                                            <div class="table-responsive">

                                                                <table class="table table-hover table-center mb-0"  id='example1'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Date</th>
                                                                            <th>Description</th>
                                                                            <th>Orderd By</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
																	<!-- creating storing variabel -->
																	<?php 	
																	$iduss=$_SESSION['id'];								
																	 // Select database																    
																     $strSQL = "SELECT * FROM medicald where `idus`='$iduss ' " ;														  
																    // Execute the query (the recordset $rs contains the result)
																    $rs = mysqli_query($conn,$strSQL);																	
																	?>

																	<!-- /creating storing variabel -->										
																		<?php
																		
																	     while($strvar = mysqli_fetch_array($rs)){
																		?>
                                                                        <tr>
                                                                            <td><?php echo $strvar['idMd']; ?></td>
                                                                            <td> <?php echo $strvar['name'];?> </td>
                                                                            <td><?php echo  $strvar['dateM'];?> <span class="d-block text-info"><?php echo  $strvar['timed'];?> </span></td>
                                                                            <td><?php echo $strvar['symptoms']; ?></td>
                                                                            <td>Your Self</td>
                                                                            <td>
																			<div class="table-action">
																			<a download= "<?php echo $strvar["file"] ?>"  href="<?php echo $strvar["file"] ?>" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Download
																			</a>
																			
																			
                                                                       <a  class="btn btn-sm bg-danger-light callbtmodel "  data-idm="<?php echo $strvar['idMd']; ?>" id= "deletebt"   data-toggle="modal" href="#delete_modal_medical">
															        	<i class="fe fe-trash"></i> Delete
															           </a>
															
														
																		</div>																				
                                                                            </td>
																			
                                                                        </tr>
																<?php         															
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

				</div>

			</div>		

			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="assets/img/footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.html">Search for Doctors</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="booking.html">Booking</a></li>
										<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.html">Appointments</a></li>
										<li><a href="chat.html">Chat</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="doctor-register.html">Register</a></li>
										<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											<a href="#" class="__cf_email__" data-cfemail="7e1a111d1d0b0c1b3e1b061f130e121b501d1113">[email&#160;protected]</a>
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->

		<!-- Medical Records Modal -->
        <div class="modal fade custom-modal custom-medicalrecord-modal" id="add_medical_records_modal" style="display: none;" data-select2-id="add_medical_records_modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Medical Records</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                    </div>
                    <form id="medical_records_form" method="POST" action="" enctype="multipart/form-data">          
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-md-6" id="textMyself">

                                    <div class="form-group">
                                        <label>Title Name</label>
										<input type="text" name="description" value="<?php echo $_SESSION['name']?> <?php echo $_SESSION['surname']?>" class="form-control" placeholder="Enter Title Name"  readonly="readonly" required >
	                         
                                    </div>
									
                                </div>
								<div class="col-12 col-md-6" id="textMyself2" >
                                    <div class="form-group">
                                        <label>Title Name</label>
                                        <select class="select"   name="description1"  >	
											<?php
										$ids=$_SESSION['id'];
										$strSQ = "SELECT * FROM `dependent` where `idu`='$ids ' " ;														  
										 $rs = mysqli_query($conn,$strSQ);	
										 while(  $roow = mysqli_fetch_array($rs) ) 
                                          {
											?>
											<option value="<?php echo $roow['idd']?>"><?php echo $roow['name']?></option>
                                            
											<?php }?>                                       
										 </select>  
	                         
                                    </div>
									
                                </div>

								<script type="text/javascript">
								
                              function changetextbox()
                              {
                                  if (document.getElementById("viewSelector").value === "Myself") {
									$( "#textMyself" ).show();
									$( "#textMyself2" ).hide();
                                  } else if (document.getElementById("viewSelector").value === "Dependent")
								  {
									$( "#textMyself" ).hide();
									$( "#textMyself2" ).show();
                                  }
                              }
                              </script>
								<!--Patient-->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Patient</label>
                                        <select class="select"  id="viewSelector"    name="viewSelector" onChange="changetextbox();"required >	
											<option value="Myself">Myself</option>
                                            <option value="Dependent">Dependent</option>  
                                        </select>    
                                    </div>
                                </div>
							</div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
										<!-- Hospiotal input -->
                                        <label>Title</label>
                                        <input type="text" name="Title" class="form-control" placeholder="Enter your subject" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Upload</label>
                                        <div class="upload-medical-records">
                                            <input class="form-control" type="file" name="user_file" id="user_files_mr" required>
                                            <div class="upload-content dropzone">
                                                <div class="text-center">
                                                    <div class="upload-icon mb-2"><img src="assets/img/upload-icon.png" alt=""></div>
                                                    <h5>Drag &amp; Drop</h5>
                                                    <h6>or <span class="text-danger">Browse</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
										<!-- Symptoms input -->
                                        <label>Symptoms</label>
                                        <input type="text" data-role="tagsinput" class="input-tags form-control"  name="symptoms" required>
                                    </div> 
                                </div>
                            </div>
							<!-- row date -->
							<!-- /row date -->
                            <div class="text-center mt-4">
								<!-- button -->
                                <div class="submit-section text-center">
                                    <button type="submit" id="medical_btn"  name="submit" 
									class="btn btn-primary submit-btn" value="FETCH DATA">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

				<!-- add files -->
				<?php
					if(isset($_POST['submit']))
					{    $idt=$_SESSION["id"];
                         $nameM = $_SESSION["name"]." ".$_SESSION["surname"];
                         $nameM1 = $_POST['description1'];
						 $qrd11 = mysqli_query($conn, "SELECT * FROM `users` WHERE  `IDusers`= '$idt' ");
		                 $user=mysqli_fetch_assoc($qrd11);
						 $nameM2 = $user['name']." ".$user['surname'];
						 $req = mysqli_query($conn,"SELECT * FROM `dependent` where `idd`='$nameM1' ");	
						 $row = mysqli_fetch_array($req);
						 $namede=$row['name'];
                         $opionM = $_POST['viewSelector'];
                         $titleM = $_POST['Title'];
                         $user_fileM = $_FILES['user_file'];
                         $SymptomsM = $_POST['symptoms'];
						 $nowD = date('j F Y');
						 $nowT = date('H:i:s'); 
                        //  $dateM = $_POST['tratment_date'];

						if($_FILES["user_file"]["error"] == 0)
	                    {
							//  added from frofile siting
							 $user_fileM = $_FILES['user_file'];							
							 $fileName = $_FILES['user_file']['name'];
							 $filetmpName = $_FILES['user_file']['tmp_name'];
							 $fileError = $_FILES['user_file']['error'];
							 $filetype = $_FILES['user_file']['type'];
							
							 //to store only the Extention in our variable
							 //and put the extention in lower case
							 $fileExt = explode('.', $fileName);
							 $fileActualExt = strtolower(end($fileExt));
							
							 $allowed = array('pdf');
							
								if(in_array($fileActualExt, $allowed)){
									if($fileError === 0){
										
										if($fileSize < 1000000){
											 $fileNewName = uniqid('',false).".".$fileActualExt;
											 //var to stor new upload space
											 $fileDestination = 'assets/Medicald/'.$fileNewName;
											 move_uploaded_file($filetmpName, $fileDestination);

												// add to database
												
                        	                    if($opionM=='Myself'){					
    	                	                        $sql = "INSERT INTO medicald(idus, name, typename, title, file, symptoms, dateM, timed)
                        	                         VALUES('$id','$nameM2','$opionM',' $titleM','$fileDestination',' $SymptomsM','$nowD', '$nowT')";
                        	                         mysqli_query($conn, $sql);
													 ?><meta http-equiv="Refresh" content="0; url=medical-records.php"><?php
					    	                    	  }elseif($opionM=='Dependent'){
					    	                    	 	$sql = "INSERT INTO medicald(idus, name, typename, title, file, symptoms, dateM, timed )
					    	                    	 	VALUES('$id','$namede','$opionM',' $titleM','$fileDestination',' $SymptomsM','$nowD','$nowT')";
					    	                    	 	mysqli_query($conn, $sql);
														 ?><meta http-equiv="Refresh" content="0; url=medical-records.php"><?php
	
											    }										 
										}else {echo "size much bigger"; }
									}else {echo "file Error"; }
								}else {echo "Error whill aploading file"; }
							
                        	 
						    }else {echo "Error2"; }
						
																	   
					    }
						
						
    	            	?>
	
	    <!-- /add files-->
		<!-- /Medical Records Modal -->
		<!-- Delete Modal medical record --> 
		<form  method="POST" >
			<div class="modal fade" id="delete_modal_medical" aria-hidden="true" role="dialog">
           
				<div class="modal-dialog modal-dialog-centered" role="document" >
                
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<input type= "hidden" name="hiddenbt" id="hiddenbt">
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="submit" class="btn btn-primary" name="Deletebt">delete </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
               
      
			</div>
        </form >
		<?php 
	  if(isset($_POST['Deletebt'])){
		$iduss=$_POST['hiddenbt'];								
		// Select database		
		$qrd1 = mysqli_query($conn, "Select * FROM `medicald` WHERE  `idMd`= '$iduss' ");
		$delete=mysqli_fetch_assoc($qrd1);	
		unlink($delete['file']);														    
		$trSQL = "DELETE FROM `medicald` where `idMd`= '$iduss' " ;
		$qrd = mysqli_query($conn, $trSQL);
		?><meta http-equiv="Refresh" content="0; url=medical-records.php"><?php
	  }
	  ?>
			<!-- Delete Modal medical record --> 
	        
		<!-- jQuery -->
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

        <!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

        <!-- Custom JS -->
		<script src="assets/js/script.js"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
		// hidden textbox
        	$( "#textMyself2" ).hide();
			///hiden
    $(document).ready(function() {
        $('#example').DataTable({});
    } );
	$(document).ready(function() {
        $('#example1').DataTable({});
    } );
	$(document).ready(function() {
        $('#example2').DataTable({});
    } );
    $(document).ready(function() {
        $('#example3').DataTable({});
    } );

 </script> 

 <!-- on click delete function -->
   <script>
$(Document).on('click','.callbtmodel',function(e){
	var id= $(this).attr("data-idm");
	$('#hiddenbt').val(id);

});
                                                                
    </script>
<!-- /on click delete function -->
		
	</body>

</html>