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
		

	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
		<!-- Header -->
		<?php
           if ($_SESSION['usertype']=='doctor')
           {
              include_once("headerD.php"); 
           } 
           
           elseif ($_SESSION['usertype']=='admin')
           {
              include_once("headerA.php"); 
           } 
           elseif (!isset($_SESSION) or $_SESSION['usertype']=='user' or $_SESSION['usertype']=='')
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
									<li class="breadcrumb-item active" aria-current="page">Reviews</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Reviews</h2>
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
										<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
									</a>
									<div class="profile-det-info">
										<h3>Dr. <?php echo $_SESSION['name'] . '&nbsp' . $_SESSION['surname'] ?></h3>

										<div class="patient-details">
											<h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
										</div>
									</div>
								</div>
							</div>
							<div class="dashboard-widget">
								<nav class="dashboard-menu">
									<ul>
										<li >
											<a href="doctor-dashboard.php">
												<i class="fas fa-columns"></i>
												<span>Dashboard</span>
											</a>
										</li>
										<li>
											<a href="appointments.php">
												<i class="fas fa-calendar-check"></i>
												<span>Appointments</span>
											</a>
										</li>
										<li>
											<a href="my-patients.php">
												<i class="fas fa-user-injured"></i>
												<span>My Patients</span>
											</a>
										</li>



										<li class="active">
											<a href="reviews.php">
												<i class="fas fa-star"></i>
												<span>Reviews</span>
											</a>
										</li>

										<li>
											<a href="doctor-profile-settings.html">
												<i class="fas fa-user-cog"></i>
												<span>Profile Settings</span>
											</a>
										</li>
										<li>
											<a href="social-media.html">
												<i class="fas fa-share-alt"></i>
												<span>Social Media</span>
											</a>
										</li>
										<li>
											<a href="doctor-change-password.php">
												<i class="fas fa-lock"></i>
												<span>Change Password</span>
											</a>
										</li>
										<li>
												<a href="..\logout.php?id=<?php $_SESSION['id'];?>">
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
							<div class="doc-review review-listing">
							
								<!-- Review Listing -->
								<ul class="comments-list">
                              <?php  
                              $iddoc=$_SESSION['id'];
                              $result = mysqli_query($conn,"SELECT * FROM comments where Doc_id = '$iddoc' ORDER BY `commented_on` DESC ");
                            while(  $row = mysqli_fetch_array($result) ) 
                              {
                              $idus=$row['user_id'];
                              $iddocc=$row['Doc_id'];
                              $sqql = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idus'";
                              $result1 = mysqli_query($conn, $sqql);
                              $rowuser = mysqli_fetch_array($result1);
                            
                              ?>
									<!-- Comment List -->
									<li>
                                    <div class="reply_bo">
										<div class="comment">
											<img class="avatar rounded-circle" alt="User Image" src="<?php echo $rowuser["image"] ?>">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author"><?php echo $rowuser["name"] ?> <?php echo $rowuser["surname"] ?></span>
													<span class="comment-date"><?php echo $row["commented_on"] ?></span>
													<div class="review-count rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
													</div>
												</div>
												
												<p class="comment-content">
                                                <?php echo $row["msg"] ?>
												</p>
												
											</div>
										</div>
										
										<!-- Comment Reply -->
										<ul class="comments-reply">
										<!-- Comment Reply List -->
                                        <?php
                                        $idcom=$row["id"];
                                        $resultc = mysqli_query($conn, "SELECT * FROM comment_replies where comment_id	= '$idcom'  ");
                                        while(  $rowcmntr = mysqli_fetch_array($resultc) ) 
                                      {
                                        $id=  $rowcmntr["user_id"];
                                        $result3 = mysqli_query($conn, "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$id'");
                                        $rowdoc = mysqli_fetch_array($result3);
										
                                        ?>
											<li>
												<div class="comment">
													<img class="avatar rounded-circle" alt="User Image" src="assets/img/doctors/doctor-thumb-02.jpg">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author">Dr. <?php echo $rowdoc["name"] ?> <?php echo $rowdoc["surname"] ?></span>
															<span class="comment-date"> <?php echo $rowcmntr["commented_on"] ?></span>
														</div>
														<p class="comment-content">
                                                        <?php echo $rowcmntr["reply_msg"] ?>
														</p>
														
													</div>
												</div>
											</li>
                                            <?php } ?>
											<!-- /Comment Reply List -->
                                         </ul>
										<!-- /Comment Reply -->
                                         <!-- *********************************** -->    
                                          <form method="POST" action="reviews.php" autocomplete="off" >
                                         <?php
                                        if(mysqli_num_rows($resultc)==0)
                                        { 
                                            ?>
                                            <!-- Comment Reply button -->
                                            <ul class="comments-reply" id="cmntbtn" >
											<li>
                                           
                                            <div style=" margin-bottom: 30px;">
                                            <input type="text" name="reply" id ="test2" class="reply_msg form-control my-2 reply" placeholder="Reply" required>
                                            <input type="hidden" value = "<?php echo $row["id"] ?>" class="reply_msg form-control my-2  " id="test" name="cmt_id" placeholder="Reply">
                                            <button name="add_reply"  class="btn btn-sm btn-primary float-right "> Reply </button>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger float-right reply_cancel_btn"> Cancel </a>
                                            </div>
                                            
                                            
                                            
											</li>
                                             </ul>
                                        <?php } ?></form>
                                        
											<!-- /Comment Reply button -->
                                            </div>
                                        </li>
									<!-- /Comment List -->
                                    <?php
                                     }
                                    ?>
                                    <?php
                                            if(isset($_POST['add_reply'])){
                                                if(mysqli_num_rows($resultc)==0)
                                        { 
                                                $cmt_id = $_POST['cmt_id'];
                                                $reply =  $_POST['reply'];
                                                $user_id = $_SESSION['id'];
                                                 $query_run = mysqli_query($conn,"INSERT INTO comment_replies( `user_id`, `comment_id`, `reply_msg`  ) VALUES ('$user_id', '$cmt_id', '$reply')");
                                                ?><meta http-equiv="Refresh" content="0; url=reviews.php"><?php
                                        }
                                                                         }
                                            ?>
									
									
								
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
		<footer class="footer">
			<?php include_once("footer.php"); ?>
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
   <script>
	   //the cancel event.
	   $(document).on('click','.reply_cancel_btn', function () {
        
		var thisClicked = $(this);
        thisClicked.closest( "#cmntbtn" ).find('.reply').val("");
    });
   </script>
		
	</body>

</html>