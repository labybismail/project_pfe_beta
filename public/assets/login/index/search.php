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
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		
	
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
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">2245 matches found for : Dentist In Bangalore</h2>
						</div>
						
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<?php 
                              
                             
                             if(isset($_POST['search'])){
								   $gender=$_POST['gender_type'];
								   $searchKey = $_POST['search'];
								   $Specialities = $_POST['Specialities'];

                                $sql = "SELECT * FROM users WHERE usertype = 'doctor' AND ((name LIKE '%$searchKey%')OR(surname LIKE '%$searchKey%'))AND `specialities` like '%$Specialities%'AND gender like '$gender%' and `block` = '0'";
							 }elseif(!empty($_GET))	
							{
								    $nameD=$_GET['name'];
									$genderD=$_GET['gender'];
									$searchaddress=$_GET['location'];
									$Specialities=$_GET['Specialities'];
								$sql = "SELECT * FROM users where usertype = 'doctor' AND ((surname LIKE '%$nameD%') or(name LIKE'%$nameD%')   ) AND `gender` like '$genderD%' AND `specialities` like '%$Specialities%' and `searchaddress` like'%$searchaddress%' and`block` = '0'";
							}
							else
							{
							$sql = "SELECT * FROM users where usertype = 'doctor' and `block` = '0' ";
						    }
						   
							

                             $result = $conn->query($sql);
							 
							 $searchKey ="";
                            ?>

                       <form action="search.php" method="POST"> 
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<div class="">
									<input type="text" name="search" class='form-control' placeholder="Search By Name"  >
									</div>			
								</div>
								<div class="filter-widget">
									<h4>Gender</h4>
									<div>
										<label class="custom_check">
											<input type="radio" name="gender_type" value ="male"  >
											<span class="checkmark" ></span> Male 
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="radio" name="gender_type" value ="female" >
											<span class="checkmark" ></span> Female 
										</label>
									</div>
									</div>
								<div class="filter-widget">
									<h4>Select Specialist</h4>
									<select class="form-control Specialities" id="Specialities" name="Specialities" >
                                          <option value="">selectitem</option>

                                        <?php
                                            $resultselect = mysqli_query($conn,  "SELECT * FROM specialities");
                                            while ($rowselect = mysqli_fetch_array($resultselect)) {
                                                ?>
                                          <option value="<?php echo $rowselect["idspec"] ?>"><?php echo $rowselect["name"] ?></option>
                                          <?php }?>
                                        </select>
								</div>
									<div class="btn-search">
										
										<input type="submit" class="btn btn-block"  value="search"  >
									</div>	
								</div>
							</div>
							</form>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">
							
                                  <?php while( $row = $result->fetch_object() ):
									$idcount= $row->specialities;
									$count = mysqli_query($conn, "SELECT * FROM `specialities` WHERE `idspec`= '$idcount' ");
									$row1 = mysqli_fetch_array($count);
									?>

							<!-- Doctor Widget -->
							<div class="card" name ="card" style="display:none;">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="doctor-profile.php?id=<?php echo $row->IDusers ?>" data-id="<?php echo $row->IDusers?>"  data-name="<?php echo $row->name ?>">
													<img src="<?php echo $row->image ?>" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="doctor-profile.php?id=<?php echo $row->IDusers ?>" data-id="<?php echo $row->IDusers?>"  data-name="<?php echo $row->name ?>">Dr. <?php echo $row->name ?>&nbsp<?php echo $row->surname ?></a></h4>
												<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
												<h5 class="doc-department"><img src="<?php echo $row1["image"] ?>" class="img-fluid" alt="Speciality"> <?php echo $row1["name"] ?></h5>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(17)</span>
												</div>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
													<ul class="clinic-gallery">
														<li>
															<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
																<img src="assets/img/features/feature-01.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
																<img  src="assets/img/features/feature-02.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
																<img src="assets/img/features/feature-03.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
																<img src="assets/img/features/feature-04.jpg" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span>Dental Fillings</span>
													<span> Whitneing</span>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="far fa-thumbs-up"></i> 98%</li>
													<li><i class="far fa-comment"></i> 17 Feedback</li>
													<li><i class="fas fa-map-marker-alt"></i> Florida, USA</li>
													
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="test view-pro-btn" href="doctor-profile.php?id=<?php echo $row->IDusers ?>" data-id="<?php echo $row->IDusers?>"  data-name="<?php echo $row->name ?>" >View Profile</a>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						
						
							
							<!-- /Doctor Widget -->
						        	<?php endwhile; ?>
									
								
									  
							
                         <!--button load more-->
							<div class="load-more text-center">
								<a class="btn btn-primary btn-sm" id="load" href="#">Load More</a>	
							</div>	
							<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
							<script>
								$(function(){
									
                                $(".card").slice(0, 4).show(); // select the first ten
								if(	$(".card:visible").length == 0){ // check if any hidden divs still exist
									$( "#load" ).replaceWith('<div class="alert alert-dark" role="alert"> No data Avaible !!</div>');
								}
                                $("#load").click(function(e){ // click event for load more
                                e.preventDefault();
                                $(".card:hidden").slice(0, 2).show(); // select next 2 hidden divs and show them
                                if($(".card:hidden").length == 0){ // check if any hidden divs still exist
									$( "#load" ).hide();
									
                                  }
								  
                                            });
							
                                           });
							</script>
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
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Fancybox JS -->
		<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	
		<script>
$(document).ready(function() {
    $('.Specialities').select2();
    

});

        </script>
	</body>


</html>