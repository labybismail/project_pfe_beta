<?php

include_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Profile</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
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

       
		  $idad=$_SESSION['id']	;						
           $sl = "SELECT *  FROM users where usertype = 'admin' and IDusers= '$idad' ";
           $resul = mysqli_query($conn, $sl);
           $admin=mysqli_fetch_array($resul);
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
							<li > 
								<a href="appointment-list.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
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
							<li class="active"> 
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
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img id="blah" class="rounded-circle" alt="User Image" src="<?php echo $admin['image']?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo $admin['name'].'&nbsp'.$admin['surname']?></h4>
										
										<div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
										<div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
									</div>
									<div class="col-auto profile-btn">
										<form action="profile.php" method="post" enctype="multipart/form-data">
                                        <button name="photo" class="btn btn-primary" type="submit" >Save Changes</button>
										
                                        <input id="imgInp" type="file" name="filee" class="btn file" id="imgInp">
                                   
                                    <?php 
                                    
                                    if(isset($_POST['photo'])){
                                       
                                        // we created a file variable 
                                        // to store the value of file in the in it with help of $_FILES 
                                        if($_FILES["filee"]["error"] == 0)
                                        {
                                        $file = $_FILES['filee'];
                                    
                                        $fileName = $_FILES['filee']['name'];
                                        $filetmpName = $_FILES['filee']['tmp_name'];
                                        $fileError = $_FILES['filee']['error'];
                                        $filetype = $_FILES['filee']['type'];
                                     $fileSize=$_FILES['filee']['size'];
                                        //to store only the Extention in our variable
                                        //and put the extention in lower case
                                        $fileExt = explode('.', $fileName);
                                        $fileActualExt = strtolower(end($fileExt));
                                     
                                        $allowed = array('jpg','jpeg','png');
                                    
                                            if(in_array($fileActualExt, $allowed)){
                                                if($fileError === 0){
                                                   
                                                    if($fileSize < 5000000){
                                                        $fileNewName = uniqid('',false).".".$fileActualExt;
                                    
                                                        //var to stor new upload space
                                                        $fileDestination = 'assets/img/admins/'.$fileNewName;
                                                        move_uploaded_file($filetmpName, $fileDestination);
                                                        $insert="UPDATE `users` SET `image`='$fileDestination' where `IDusers`='$idad'";
                                                        mysqli_query($conn,$insert);
                                                        
                                                        $insrt=mysqli_query($conn,"select * from`users`where `IDusers`='$idad' ");
                                                        $roow = mysqli_fetch_assoc($insrt);
                                                        $_SESSION['image']=$roow['image'];
                                                        
                                                        
                                    
                                                        echo '<div class="alert alert-success" role="alert" >
                                                        your picture have been changed successfully!! ...
                                                            </div>';
                                                        
                                    ?><meta http-equiv="Refresh" content="2; url=profile.php"><?php
                                                        
                                                            
                                                    }else {
														echo'<div class="alert alert-danger" role="alert">
														your file is too big! reduce the Size please!
												</div>';
                                                        
                                                        
                                                    }
                                                
                                                }else{
                                                    echo'<div class="alert alert-danger" role="alert">
                                                    an Error in uploading fill!
                                            </div>';
                                                   
                                                }
                                            
                                            }else{
                                                echo'<div class="alert alert-danger" role="alert">
                                                ERROR type!
                                            </div>';
                                                     
                                            }
                                        }
                                    }
                                    ?> 
                                    </form>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10"><?php echo $admin['name'].'&nbsp'.$admin['surname']?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">24 Jul 1983</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10"><?php echo $admin['email']?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10"><?php echo $admin['phone']?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-10 mb-0">4663  Agriculture Lane,<br>
														Miami,<br>
														Florida - 33165,<br>
														United States.</p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form method="post" action="">
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text" name="name" class="form-control" value="<?php echo $admin['name']?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text" name="surname"  class="form-control" value="<?php echo $admin['surname']?>">
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																			<label>Date of Birth</label>
																			<div class="cal-icon">
																				<input type="text" class="form-control" value="24-07-1983">
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" name="email" class="form-control" value="<?php echo $admin['email']?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input name="phone" type="text" value="<?php echo $admin['phone']?>" class="form-control">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" class="form-control" value="4663 Agriculture Lane">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>City</label>
																			<input type="text" class="form-control" value="Miami">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>State</label>
																			<input type="text" class="form-control" value="Florida">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Zip Code</label>
																			<input type="text" class="form-control" value="22434">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Country</label>
																			<input type="text" class="form-control" value="United States">
																		</div>
																	</div>
																</div>
																<button name="save" type="submit" class="btn btn-primary btn-block" style="margin-bottom: 10px;">Save Changes</button>
															</form>
                                                            <?php
                                                            if(isset($_POST["save"]))
                                                            {
                                                                $ida=$_SESSION['id'];
                                                                $name=$_POST["name"];
                                                                $surname=$_POST["surname"];
                                                                $email=$_POST["email"];
                                                                $phone=$_POST["phone"];
                                                                $sqql = "UPDATE `users` SET `name`='$name', `surname`='$surname' ,`phone`='$phone' , `email`='$email' where `IDusers`='$ida' ";
                                                                $result = mysqli_query($conn, $sqql);
                                                                echo '<div class="alert alert-success">
                                                                     <span>your information has been changed succesfuly.</span>
                                                                      </div>';
                                                                      ?><meta http-equiv="Refresh" content="0; url=profile.php"><?php
                                                            }
                                                            
                                                            ?>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="" method="POST">
														<div class="form-group">
															<label>Old Password</label>
															<input name="oldpassword" type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input name="newpassword" type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input name="confpassword"  type="password" class="form-control">
														</div>
														<button name="change" class="btn btn-primary" type="submit" style="margin-bottom: 20px;">Save Changes</button>
													</form>
                                                    <?php
                                                    if(isset($_POST['change']))
                                                    {
                                                        $oldpass=$_POST['oldpassword'];
                                                        $newpass=$_POST['newpassword'];
                                                        $confpass=$_POST['confpassword'];
                                                        if($oldpass!=$admin['password'])
                                                    {
                                                        echo'<div class = "alert alert-danger"  role = "alert ">  Password incorrect </div>  ';
                                                    }
                                                    elseif($confpass!=$newpass)
                                                    {
                                                        echo'<div class = "alert alert-danger"  role = "alert "> Confirm password Not Match </div>  ';
                                                    }
                                                    elseif($confpass==$newpass and  $oldpass==$admin['password'])
                                                    {
                                                        $sqql = mysqli_query($conn,"UPDATE `users` SET `password`='$newpass' where  `IDusers`='$idad' ");
                                                        $update_sql =mysqli_query($conn,$sqql);
                                                        echo '<div class="alert alert-success" role="alert" >
                                                        Password changed successfully !!
                                                      </div>';
                                                      
                                                      ?><meta http-equiv="Refresh" content="0; url=profile-settings.php"><?php
                                                    }
                                                    }
                                                    ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
        <script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
	</script>
		
    </body>


</html>