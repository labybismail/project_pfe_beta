<?php  
include_once("config.php");
session_start();

error_reporting(0);
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
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
		
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
           
           
           elseif (!isset($_SESSION) or $_SESSION['usertype']!='user')
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
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			<?php
			$idUS =$_SESSION['id'];
			$rlt = mysqli_query($conn,"select * FROM `users` WHERE `IDusers`='$idUS' and `usertype`='user'");
			$row = mysqli_fetch_array($rlt)
			
			?>
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
											  <img src="<?php echo $row['image']?>" >
											</a>
	
											<div class="profile-det-info">
												<h3><?php echo $row['name']?> <?php echo $row['surname']?></h3>
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
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
								    <form action="profile-settings.php" method="POST" enctype="multipart/form-data" runat="server" >
									 <div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
													<div class="profile-img">
															<img id="blah" src="<?php echo $row['image']?>" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i  class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" name="file" class="upload" id="imgInp">
															</div>
															
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" name="name"  value="<?php echo $row['name']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" name="surname"  value="<?php echo $row['surname']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div >
									        	<input class="form-control " type="date" value="<?php echo $row['dateBirth']?>" name="date3"  id="date3"  required >
													</div>
												</div>
											</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input name="email" type="email" class="form-control" value="<?php echo $row['email']?>" 	>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input name="phone" type="text" value="<?php echo $row['phone']?>" class="form-control">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input name="zipcode" type="text" class="form-control" value="<?php echo $row['zipcode']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input name="city" type="text" class="form-control" value="<?php echo $row['city']?>">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input  name="country" type="text" class="form-control" value="<?php echo $row['country']?>">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input name="address" type="text" class="form-control" value="<?php echo $row['address']?>">
												</div>
											</div>
										</div>
										<div class="submit-section" >
											<button type="submit" class="btn btn-primary submit-btn" name ="submit" style=    "margin-bottom: 10px;">Save Changes</button>
											
                                        </div>
										<?php
										$idUS =$_SESSION['id'];
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$dateBirth=$_POST['date3'];
	$zipcode=$_POST['zipcode'];
	$city=$_POST['city'];
	$Country=$_POST['country'];
	$address=$_POST['address'];
    // we created a file variable 
    // to store the value of file in the in it with help of $_FILES 
	if($_FILES["file"]["error"] == 0)
	{
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $filetmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

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
                    $fileDestination = 'assets/img/patients/'.$fileNewName;
                    move_uploaded_file($filetmpName, $fileDestination);
					$qrd1 = mysqli_query($conn, "Select * FROM `users` WHERE  `IDusers`= '$idUS' ");
	             	$delete=mysqli_fetch_assoc($qrd1);
					 if($delete['image']!="assets/img/patients/patientF.jpg" and $delete['image']!="assets/img/patients/patientH.jpg")	
	             	unlink($delete['image']);
					$insert="UPDATE `users` SET `image`='$fileDestination' where `IDusers`='$idUS'";
					mysqli_query($conn,$insert);
					
					$inseert="UPDATE `users` SET `dateBirth`= '$dateBirth', `name`='$name',`surname`='$surname',`phone`='$phone',`email`='$email',`zipcode`= '$zipcode',`city`= '$city',`Country`= '$Country',`address`= '$address'where `IDusers`='$idUS'";
					mysqli_query($conn,$inseert);
					$insrt=mysqli_query($conn,"select * from`users`where `IDusers`='$idUS' ");
					$roow = mysqli_fetch_assoc($insrt);
					$_SESSION['image']=$roow['image'];
					
					?><meta http-equiv="Refresh" content="0; url=profile-settings.php"><?php

					echo '<div class="alert alert-success" role="alert" >
					your details have been successfully!!
                        </div>';
					

					
                        
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
	elseif($_FILES["file"]["error"] == 4)
	 {
		$inseert="UPDATE `users` SET `name`='$name',`surname`='$surname',`phone`='$phone',`email`='$email' ,`dateBirth`= '$dateBirth',`zipcode`= '$zipcode',`city`= '$city',`Country`= '$Country',`address`= '$address' where `IDusers`='$idUS'";
					mysqli_query($conn,$inseert);
		$insrt=mysqli_query($conn,"select * from`users`where `IDusers`='$idUS' ");
		$roow = mysqli_fetch_assoc($insrt);
		$_SESSION['image']=$roow['image'];
		$_SESSION['name']=$roow['name'];
		$_SESSION['surname']=$roow['surname'];
		$_SESSION['email']=$roow['email'];
		$_SESSION['phone']=$roow['phone'];
		
		?><meta http-equiv="Refresh" content="0; url=profile-settings.php"><?php
		
		echo '<div class="alert alert-success" role="alert" >
		your details have been successfully!!
  </div>';
	}

}




?>
									</form>

									

									
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
	  
		<!-- jQuery -->
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
		
		<script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}

config ={
			
			maxDate:  new Date().fp_incr(-6570),
			
			"locale": {
				"firstDayOfWeek": 1 // start week on Monday
			}
		
				}
				flatpickr("#date3", config);
				$('#date3').on('focus', ({ currentTarget }) => $(currentTarget).blur())
			$("#date3").prop('readonly', false)
	</script>
		
	</body>


</html>