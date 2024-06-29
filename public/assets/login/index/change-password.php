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
		<link rel="stylesheet" href="css/bootstrap.min.css">
	
	
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
           
           
           elseif (!isset($_SESSION) or $_SESSION['usertype']!='user' or $_SESSION['usertype']=='' )
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
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
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
											<img  src="<?php echo $_SESSION['image']?>"  alt="User Image">
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
												
												<li >
													<a href="profile-settings.php">
														<i class="fas fa-user-cog"></i>
														<span>Profile Settings</span>
													</a>
												</li>
												<li class="active">
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

							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">

											<!-- Change Password Form -->
											<form method="POST">
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control" name="oldpassword" required>
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="newpassword" required>
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name="confpassword" required >
												</div>
												<div class="submit-section" style="margin-bottom: 10px;">
													<button type="submit" class="btn btn-primary submit-btn" name ="submit">Save Changes</button>
												</div>
                                                <?php
$iduser=$_SESSION['id'];
$sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
$row = mysqli_fetch_assoc($sql);
if(isset($_POST['submit']))
{
    $oldpass=$_POST['oldpassword'];
    $newpass=$_POST['newpassword'];
    $confpass=$_POST['confpassword'];
    if($oldpass!=$row['password'])
    {
        echo'<div class = "alert alert-danger"  role = "alert ">  Password incorrect </div>  ';
    }
    elseif($confpass!=$newpass)
    {
        echo'<div class = "alert alert-danger"  role = "alert "> Confirm password Not Match </div>  ';
    }
    elseif($confpass==$newpass and  $oldpass==$row['password'])
    {
        $sqql = mysqli_query($conn,"UPDATE `users` SET `password`='$newpass' where  `IDusers`='$iduser' ");
        $update_sql =mysqli_query($conn,$sqql);
        echo '<div class="alert alert-success" role="alert" >
        Password changed successfully !!
      </div>';

    }
}

?>
											</form>
											<!-- /Change Password Form -->
									


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
		
	</body>


</html>