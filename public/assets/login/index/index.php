<?php  
include_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">



<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Doccure</title>
	<!-- Favicons -->
	<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	
</head>

<body>
<!-- logout Auto -->
<?php
//if(time() - $_SESSION['timestamp'] > 5) { //subtract new timestamp from the old one
  /*  echo"<script>alert('15 Minutes over!');</script>";
    session_destroy();
    $_SESSION['logged_in'] = false;
    header("Location: ..\login-23.php" ); //redirect to index.php
  
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}

*/?>
<!-- logout Auto -->
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<!-- Home Banner -->
        <?php
           if ($_SESSION['usertype']=='user')
           {
              include_once("homeU.php"); 
           } 
           elseif ($_SESSION['usertype']=='admin' or $_SESSION['usertype']=='doctor' ) 
           {
            include_once("homeAD.php"); 
           } elseif (!isset($_SESSION) or !isset($_SESSION['usertype']) or $_SESSION['usertype']=='' )
           {
               session_destroy();
               header("location: ..\login-23.php");
           } 
           
           
               ?> 
			   <!-- check date appointment -->
			             <?php 
                          $d=date("Y-m-d");
						  $t =date("h:i");
                          $rlt = mysqli_query($conn,"UPDATE `appointment` SET `code`='3' WHERE `date`<'$d' and `code`='1'");
                          $rl = mysqli_query($conn,"UPDATE `appointment` SET `code`='2' WHERE `date`<'$d' and `code`='0'");
						   ?>
          <!-- check date appointment -->

        <!-- /Home Banner -->
		<!-- Clinic and Specialities -->
		<section class="section section-specialities">
			<div class="container-fluid">
				<div class="section-header text-center">
					<h2>Clinic and Specialities</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-9">
						<!-- Slider -->
						<div class="specialities-slider slider">
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/chirurgie cardiaque.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Urology</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/chirurgie cardiaque02.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Neurology</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/chirurgie cardiaque03.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Orthopedic</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/chirurgie cardiaque04.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Cardiologist</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/chirurgie cardiaque06.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Dentist</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/chirurgie cardiaque07.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Dentist</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="speicality-item text-center">
								<div class="speicality-img">
									<img src="assets/img/specialities/chirurgie cardiaque08.png" class="img-fluid" alt="Speciality">	<span><i class="fa fa-circle" aria-hidden="true"></i></span>
								</div>
								<p>Dentist</p>
							</div>
							<!-- /Slider Item -->
						</div>
						<!-- /Slider -->
					</div>
				</div>
			
		</section>
		<!-- Clinic and Specialities -->
		<!-- Category Section -->
		<section class="section section-category">
			<div class="container">
				<div class="section-header text-center">
					<h2>Browse by Specialities</h2>
					<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/1.png" alt="">
							</div>
							<div class="category-content">
								<h4>Urology</h4>
								<span>21 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/2.png" alt="">
							</div>
							<div class="category-content">
								<h4>Neurology</h4>
								<span>18 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/3.png" alt="">
							</div>
							<div class="category-content">
								<h4>Orthopedic</h4>
								<span>17 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/4.png" alt="">
							</div>
							<div class="category-content">
								<h4>Cardiologist</h4>
								<span>12 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/5.png" alt="">
							</div>
							<div class="category-content">
								<h4>Dentist</h4>
								<span>07 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/1.png" alt="">
							</div>
							<div class="category-content">
								<h4>Urology</h4>
								<span>16 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/4.png" alt="">
							</div>
							<div class="category-content">
								<h4>Cardiologist</h4>
								<span>18 Doctors</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="category-box">
							<div class="category-image">
								<img src="assets/img/category/3.png" alt="">
							</div>
							<div class="category-content">
								<h4>Neurology</h4>
								<span>22 Doctors</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Category Section -->
		<?php
           if ($_SESSION['usertype']=='user')
           {
              ?><!-- Popular Section -->
			  <section class="section section-doctor">
				  <div class="container-fluid">
					  <div class="section-header text-center">
						  <h2>Book Our Best Doctor</h2>
						  <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					  </div>
					  <div class="row">
						  <div class="col-lg-12">
							  <div class="doctor-slider slider">
							  <?php $sql = "SELECT * FROM users where usertype = 'doctor' and best = '1'";
								   $result = $conn->query($sql);?>
							  <?php while( $row = $result->fetch_object() ): ?>
								  <!-- Doctor Widget -->
								  <div class="profile-widget">
									  <div class="doc-img">
										  <a href="doctor-profile.php?id=<?php echo $row->IDusers?>">
											  <img class="img-fluid" alt="User Image" src="<?php echo $row->image ?>">
										  </a>
										  
									  </div>
									  <div class="pro-content">
										  <h3 class="title">
												  <a href="doctor-profile.php?id=<?php echo $row->IDusers?>"><?php echo $row->name ?>&nbsp<?php echo $row->surname ?></a> 
												  <i class="fas fa-check-circle verified"></i>
											  </h3>	
										  <p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
										  <div class="rating">	<i class="fas fa-star filled"></i>
											  <i class="fas fa-star filled"></i>
											  <i class="fas fa-star filled"></i>
											  <i class="fas fa-star filled"></i>
											  <i class="fas fa-star"></i>
											  <span class="d-inline-block average-rating">(49)</span>
										  </div>
										  <ul class="available-info">
											  <li>	<i class="fas fa-map-marker-alt"></i> California, USA</li>
											  <li>	<i class="far fa-clock"></i> Available on Fri, 22 Mar</li>
											  <li>	<i class="far fa-money-bill-alt"></i> $100 - $400	<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											  </li>
										  </ul>
										  <div class="row row-sm">
											  
											  <div class="col-12">	<a href="doctor-profile.php?id=<?php echo $row->IDusers?>" class="btn book-btn">Book Now</a>
											  </div>
										  </div>
									  </div>
								  </div>
								  <!-- Doctor Widget -->
								  <?php endwhile; ?>
							  </div>
						  </div>
					  </div>
				  </div>
			  </section>
			  <!-- /Popular Section -->
			  <?php
           } 
           elseif ($_SESSION['usertype']=='admin' or $_SESSION['usertype']=='doctor' ) 
           {
             
           } elseif (!isset($_SESSION) or !isset($_SESSION['usertype']))
           {
               session_destroy();
               header("location: ..\login-23.php");
           } 
           
           
               ?> 
		
		<!-- Availabe Features -->
		<section class="section section-features">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5 features-img">
						<img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
					</div>
					<div class="col-md-7">
						<div class="section-header">
							<h2 class="mt-2">Availabe Features in Our Clinic</h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
						</div>
						<div class="features-slider slider">
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
								<p>Patient Ward</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
								<p>Test Room</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
								<p>ICU</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
								<p>Laboratory</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
								<p>Operation</p>
							</div>
							<!-- /Slider Item -->
							<!-- Slider Item -->
							<div class="feature-item text-center">
								<img src="assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
								<p>Medical</p>
							</div>
							<!-- /Slider Item -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Availabe Features -->
		
		<!-- Footer -->
		<footer class="footer">
			<!-- Footer Top -->
			<?php  include_once("footer.php"); ?>
		<!-- /Footer -->
	</div>
    
	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Slick JS -->
	<script src="assets/js/slick.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

<script>
$(document).ready(function() {
    $('.Specialities').select2();
    

});

        </script>

</html>