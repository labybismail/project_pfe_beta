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
		<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		
	
	</head>
	<body>
	<style>
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
			#pat_appointments
			{
				margin-top: 10px;
			}

		</style>
        <?php
		if(!empty($_SESSION['lang']))
		{
		$lang =	$_SESSION['lang'];
            setcookie('googtrans', '/fr/'.$lang);
		}
        ?> 
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
									<li class="breadcrumb-item active" aria-current="page">Favourites</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Favourites</h2>
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
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?php echo $_SESSION['image']?>" alt="User Image">
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
												<li class="active">
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

							</div>
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">

							

							

<div class="card">
	<div class="card-body pt-0">
	
		
		
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
				<div class="card-header">
								<div class="row">
									<div class="col-sm-6">
										<h3 class="card-title"><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Favourites</font></font></h3>
									</div>
									
								</div>
							</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-center mb-0" id='example'>
								<thead>
									<tr>
										<th>Doctor</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Delete</th>
										
									</tr>
									</thead>  
<?php 
$idp=$_SESSION['id'];
$reesult = mysqli_query($conn,"SELECT * FROM favourites where idus = '$idp' ");
while(  $roow = mysqli_fetch_array($reesult) ) 
{
  $idus=$roow['iddoc'];
  $sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
  $result = mysqli_query($conn, $sqql); 
while($row = mysqli_fetch_array($result))  
{  ?><form action="" method="POST" ><?php
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
		  <td>'.$row["email"].'</td>
		  <td>'.$row["phone"].'</td>
		  <td>
			<div class="table-action">
			<a href="favourites.php?id='.$roow["idF"].'"   class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Delete</a>
	     	</div>
	      </td>
		
		  '; 
		 
		 
		  ?></form>
 <?php
		  
} 
} 
if(isset($_GET["id"]))
{
	
  $sqql = "DELETE FROM favourites WHERE idF = '".$_GET["id"]."'";
  $result = mysqli_query($conn, $sqql); 
  ?><meta http-equiv="Refresh" content="0; url=favourites.php"><?php
}
?>  

							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Appointment Tab -->
			
			
				
			
			
		
			  
		</div>
		<!-- Tab Content -->
		
	</div>
</div>
</div>
</div>

</div>

</div>		
<!-- /Page Content -->
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
		<script src="assets/js/jquery.min.js"></script>
		
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
    } );
    
 </script>

 <!-- translate save language -->
<script>


$(document).ready(function(){

	$("body").on("change", "#google_translate_element select", function (e) {
		var post_lang = $("#google_translate_element select").val();
  
  console.log(post_lang);

$.ajax({
	type: "post",
	url: "favourites.php",
	data: {
		  'post_lang': post_lang,
	  },
	
	success: function (response) {
	}
});

});


});

</script>
<?php 
//set default language user not yet selected their language
if(empty($_SESSION['lang'])){ $_SESSION['lang'] = "fr";}
if(isset($_POST['post_lang']))
{
	$_SESSION['lang'] = $_POST['post_lang'];
}
?>
<!-- translate save language -->
	</body>


</html>