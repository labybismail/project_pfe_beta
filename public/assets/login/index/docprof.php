<?php 
	 //sql requests for the recommandation_info page
	 include_once("server.php");	
	 include_once('config.php');
	?>

	<style>
	.thumbs_up{
	 background-color: #28a745;
	 border: 1pxsolid #28a745; 
	 color: #fff;
    }

	.thumbs_down{
	 background-color: red;
	 border: 1pxsolid #28a745; 
	 color: #fff;
    }
	
	
	</style> 

	<!-- Page Content -->
    <div class="content">
				<div class="container">
                           <?php
                           $iduser=$_GET['id'];
						   $idus=$_SESSION['id'];
                           $sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
                           $row = mysqli_fetch_assoc($sql);

				
                           ?>

				<!-- Doctor Widget -->
				<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="<?php echo $row["image"]?>" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name"><?php echo $row["name"]?>&nbsp<?php echo $row["surname"] ?></h4>
										<p class="doc-speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
										<p class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</p>								
										<?php 
										//stars avg 
										  if($row["thisDoc_avg"] == 5){
											echo '	<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">('.round($row["thisDoc_avg"]).')</span>
										</div>';
										}elseif($row["thisDoc_avg"]== 4){
												echo '	<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">('.round($row["thisDoc_avg"]).')</span>
										</div>';
										}elseif($row["thisDoc_avg"] == 3){
												echo '	<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">('.round($row["thisDoc_avg"]).')</span>
										</div>';
										}elseif($row["thisDoc_avg"] == 2){
													echo '	<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">('.round($row["thisDoc_avg"]).')</span>
										</div>';
										}elseif($row["thisDoc_avg"] == 1){
													echo '	<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">('.round($row["thisDoc_avg"]).')</span>
										</div>';
										}else{
											echo '	<div class="rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(0)</span>
										</div>';
										}
										?>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
											<ul class="clinic-gallery">
												<li>
													<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
														<img src="assets/img/features/feature-01.jpg" alt="Feature">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
														<img  src="assets/img/features/feature-02.jpg" alt="Feature Image">
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
											<span>Teeth Whitneing</span>
										</div>
									</div>
								</div>
									
									<?php
									//  <!-- count num cmt for every doc  -->
								        $idDoc = $_GET['id'];	
									    $sql = "SELECT count(id) as count FROM comments where Doc_id =  $idDoc" ;
							     	    $result = mysqli_query($conn, $sql);
										$rw = mysqli_fetch_assoc($result);
										if(isset($_POST['comment_load_data'])){															
									    };

									 //  <!-- count num like up for every doc  -->
										$like_sl = "SELECT COUNT(id_rec_info) as total_like FROM recomandation_info WHERE Dr_id = $idDoc and rec_action = 'like' ";
										$like_rq = mysqli_query($conn, $like_sl);
										$like_rw = mysqli_fetch_array($like_rq);
								    ?>
								
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="far fa-thumbs-up"></i><?php echo $like_rw['total_like']; ?> </li>
											<li><i class="far fa-comment"></i> <?php echo $rw['count']; ?> Feedback</li>
											<li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
											<li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
										</ul>
										
									</div>
									<div class="doctor-action">
									<form action="" method="POST" >
										<?php
										$result22 = mysqli_query($conn,"SELECT * FROM favourites where iddoc = '$iduser' and idus = '$idus'");
										
										?>
										<!-- fav_btn -->
									<a  name='fav' data-idus="<?php echo  $idus ?>" data-iddoc="<?php echo  $iduser ?>" 
									<?php if(mysqli_num_rows($result22)==0 ){ ?>
									 class="btn btn-white fav-btn  fav" 
									 <?php }elseif(mysqli_num_rows($result22)!=0 ){ ?>
										class="btn  favo-btn fav-btn fav" 
										style="color: white;"
										<?php } ?>>
									<i class="far fa-bookmark"></i>
								    	<!-- fav_btn -->
                                    	<a href="chat.html" class="btn btn-white msg-btn">
											<i class="far fa-comment-alt"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
											<i class="fas fa-phone"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
											<i class="fas fa-video"></i>
										</a>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
									<?php if($_SESSION['usertype']=='admin') { ?>
										<a class="nav-link active " href="#doc_overview" data-toggle="tab">Overview</a>
								<?php }elseif($_SESSION['usertype']=='user') { ?>
									<a class="nav-link " href="#doc_overview" data-toggle="tab">Overview</a>
									<?php } ?>
										
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
									</li>
									<?php if($_SESSION['usertype']=='user') { ?>
									<li class="nav-item">
										<a class="nav-link active" href="#book_appointment" data-toggle="tab">Book Appointment</a>
									</li>
									<?php } ?>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<?php if($_SESSION['usertype']=='admin') { ?>
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active ">
								<?php }elseif($_SESSION['usertype']=='user') { ?>
									<div role="tabpanel" id="doc_overview" class="tab-pane fade ">
									<?php } ?>
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
											</div>
											<!-- /About Details -->
										
											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">American Dental Medical University</a>
																	<div>BDS</div>
																	<span class="time">1998 - 2003</span>
																</div>
															</div>
														</li>
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">American Dental Medical University</a>
																	<div>MDS</div>
																	<span class="time">2003 - 2005</span>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Education Details -->
									
											<!-- Experience Details -->
											<div class="widget experience-widget">
												<h4 class="widget-title">Work & Experience</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">Glowing Smiles Family Dental Clinic</a>
																	<span class="time">2010 - Present (5 years)</span>
																</div>
															</div>
														</li>
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">Comfort Care Dental Clinic</a>
																	<span class="time">2007 - 2010 (3 years)</span>
																</div>
															</div>
														</li>
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">Dream Smile Dental Practice</a>
																	<span class="time">2005 - 2007 (2 years)</span>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Experience Details -->
								
											<!-- Awards Details -->
											<div class="widget awards-widget">
												<h4 class="widget-title">Awards</h4>
												<div class="experience-box">
													<ul class="experience-list">
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<p class="exp-year">July 2019</p>
																	<h4 class="exp-title">Humanitarian Award</h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
																</div>
															</div>
														</li>
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<p class="exp-year">March 2011</p>
																	<h4 class="exp-title">Certificate for International Volunteer Service</h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
																</div>
															</div>
														</li>
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<p class="exp-year">May 2008</p>
																	<h4 class="exp-title">The Dental Professional of The Year Award</h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Awards Details -->
											
											<!-- Services List -->
											<div class="service-list">
												<h4>Services</h4>
												<ul class="clearfix">
													<li>Tooth cleaning </li>
													<li>Root Canal Therapy</li>
													<li>Implants</li>
													<li>Composite Bonding</li>
													<li>Fissure Sealants</li>
													<li>Surgical Extractions</li>
												</ul>
											</div>
											<!-- /Services List -->
											
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<ul class="clearfix">
													<li>Children Care</li>
													<li>Dental Care</li>	
													<li>Oral and Maxillofacial Surgery </li>	
													<li>Orthodontist</li>	
													<li>Periodontist</li>	
													<li>Prosthodontics</li>	
												</ul>
											</div>
											<!-- /Specializations List -->

										</div>
									</div>
								</div>
								<!-- /Overview Content -->
								
								<!-- Locations Content -->
								<div role="tabpanel" id="doc_locations" class="tab-pane fade">
								
									<!-- Location List -->
									<div class="location-list">
										<div class="row">
										
											<!-- Clinic Content -->
											<div class="col-md-6">
												<div class="clinic-content">
													<h4 class="clinic-name"><a href="#">Smile Cute Dental Care Center</a></h4>
													<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
													<div class="rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
														<span class="d-inline-block average-rating">(4)</span>
													</div>
													<div class="clinic-details mb-0">
														<h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2286  Sundown Lane, Austin, Texas 78749, USA <br><a href="javascript:void(0);">Get Directions</a></h5>
														<ul>
															<li>
																<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-01.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-02.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-03.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-04.jpg" alt="Feature Image">
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- /Clinic Content -->
											
											<!-- Clinic Timing -->
											<div class="col-md-4">
												<div class="clinic-timing">
													<div>
														<p class="timings-days">
															<span> Mon - Sat </span>
														</p>
														<p class="timings-times">
															<span>10:00 AM - 2:00 PM</span>
															<span>4:00 PM - 9:00 PM</span>
														</p>
													</div>
													<div>
													<p class="timings-days">
														<span>Sun</span>
													</p>
													<p class="timings-times">
														<span>10:00 AM - 2:00 PM</span>
													</p>
													</div>
												</div>
											</div>
											<!-- /Clinic Timing -->
											
											<div class="col-md-2">
												<div class="consult-price">
													$250
												</div>
											</div>
										</div>
									</div>
									<!-- /Location List -->
									
									<!-- Location List -->
									<div class="location-list">
										<div class="row">
										
											<!-- Clinic Content -->
											<div class="col-md-6">
												<div class="clinic-content">
													<h4 class="clinic-name"><a href="#">The Family Dentistry Clinic</a></h4>
													<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
													<div class="rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
														<span class="d-inline-block average-rating">(4)</span>
													</div>
													<div class="clinic-details mb-0">
														<p class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> 2883  University Street, Seattle, Texas Washington, 98155 <br><a href="javascript:void(0);">Get Directions</a></p>
														<ul>
															<li>
																<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-01.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-02.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-03.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery2">
																	<img src="assets/img/features/feature-04.jpg" alt="Feature Image">
																</a>
															</li>
														</ul>
													</div>

												</div>
											</div>
											<!-- /Clinic Content -->
											
											<!-- Clinic Timing -->
											<div class="col-md-4">
												<div class="clinic-timing">
													<div>
														<p class="timings-days">
															<span> Tue - Fri </span>
														</p>
														<p class="timings-times">
															<span>11:00 AM - 1:00 PM</span>
															<span>6:00 PM - 11:00 PM</span>
														</p>
													</div>
													<div>
														<p class="timings-days">
															<span>Sat - Sun</span>
														</p>
														<p class="timings-times">
															<span>8:00 AM - 10:00 AM</span>
															<span>3:00 PM - 7:00 PM</span>
														</p>
													</div>
												</div>
											</div>
											<!-- /Clinic Timing -->
											
											<div class="col-md-2">
												<div class="consult-price">
													$350
												</div>
											</div>
										</div>
									</div>
									<!-- /Location List -->

								</div>
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing">
									
										<ul class="comments-list">
											<!-- boucle de like -->
										<div id="comments">  
    							          <?php	
									         $idDoc = $_GET['id'];							    					
											// call the script instruction
											//select cmt request	
											 $sql = "SELECT * FROM comments  where Doc_id = $idDoc  ";
    								         $result = mysqli_query($conn, $sql );
    							       		 if(mysqli_num_rows($result) > 0){
    							        	 while($row = mysqli_fetch_assoc($result)){
											 $idus = $row['user_id'];

											 $sl = "SELECT * FROM users where IDusers = '$idus' " ;
											  $reult = mysqli_query($conn, $sl );
											  $roow = mysqli_fetch_assoc($reult);
										 	
												//for the stars rating
											  $rating = "SELECT * FROM rating_stars where iduser_rating = '$idus'  and id_Doc_rating = '$idDoc' " ;
											  $reult2 = mysqli_query($conn, $rating );
											  $rooow = mysqli_fetch_assoc($reult2);
                                             //last time commenting
											 $last_date_cmt = $row['commented_on'];
    							             echo '<div class="reply_bo" name="reply_bo" style="display:none;">
											 <div class="reply_box" name="reply_box" >
											 <li>
											 <div class="comment">
											   <img class="a  vatar avatar-sm rounded-circle" alt="User Image" src= " '.$roow["image"].'">
											   <div class="comment-body">
												   <div class="meta-data">
													   <span class="comment-author"> ';
													   echo $roow["name"]; 
													   echo  ' </span>
													   <span class="comment-date"> ';
													   echo $last_date_cmt; 
													   echo  ' 
													   </span>';
                                                     if($rooow['title_rating']=="5")
															  {
													  echo' <div class="review-count rating">
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i></div>';
													          }else  if($rooow['title_rating']=="4")
															  {
													  echo' <div class="review-count rating">
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star "></i></div>';
													          }else   if($rooow['title_rating']=="3")
															  {
													  echo' <div class="review-count rating">
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i></div>';
													          }else   if($rooow['title_rating']=="2")
															  {
													  echo' <div class="review-count rating">
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i></div>';
													          }else   if($rooow['title_rating']=="1")
															  {
													  echo' <div class="review-count rating">
													   <i class="fas fa-star filled"></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i></div>';
													          }
															  else  
															  {
													  echo' <div class="review-count rating">
													   <i class="fas fa-star"></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i></div>';
													          }
												echo'</div>
												   <p class="comment-content">';
												   echo $row['msg'];
												   echo '</p>
												   <div class="rrating">
												   <button value= "' .$row['id'].'"  id="'.$row['id'].'t" class="btn btn-sm btn-info   view_reply_btn"> view reply </button>';

												   //Hidden delete button condition
												   if($_SESSION['id'] == $roow['IDusers']) {
												   echo '<button data-toggle="modal" href="#delete_modal" value= "'.$row['id'].'" id="delete_cmt_btn" class="btn btn-sm btn-danger delete_cmt_btn" data-iddoc = "'.$row['Doc_id'].'"  data-user= "'.$row['user_id'].'" data-dl-button = "'.$row['id'].'"> Delete </button>';
												      }
                                                	echo '</div>
												    <p class="recommend-btn">
													<span>Recommend?</span>';
													//Like button
													// request check if user has already liked
													$u1=$row['id'];
													$u2=$_SESSION['id'];
													$result22 = mysqli_query($conn, "SELECT * FROM recomandation_info WHERE user_id=$u2 
													AND cmt_id=$u1 AND rec_action='like'");

												   if( mysqli_num_rows($result22)==0 ) 
													{
                                                        echo'<a  class="like-btn thumbs_upo" data-id="'.$row['id'].'"  data-iduss="'.$_SESSION['id'].'" id="like"   data-iddoc ="'.$row['Doc_id'].'"> <i class="far fa-thumbs-up "></i> Yes </a> <span class="likes">'.getLikes($row['id']).' </span>';
													}
													elseif( mysqli_num_rows($result22)!=0 )
													{
                                                        echo'<a data-id="'.$row['id'].'"  data-iduss="'.$_SESSION['id'].'"  data-iddoc ="'.$row['Doc_id'].'"  id="like"  class="like-btn thumbs_up"> <i class="fa fa-thumbs-up " ></i> Yes </a><span class="likes">'.getLikes($row['id']).' </span> ';
													}	
													
										            

													//Dislike button
													// request check if user has already Diliked
													$u01=$row['id'];
													$u02=$_SESSION['id'];
													$result022 = mysqli_query($conn, "SELECT * FROM recomandation_info WHERE user_id=$u02 
													AND cmt_id = $u01 AND rec_action ='dislike'");
													if(mysqli_num_rows($result022)==0 )
													{
                                                        echo'<a data-id="'.$row['id'].'"  data-iduss="'.$_SESSION['id'].'"  data-iddoc ="'.$row['Doc_id'].'" id="dislike" class="dislike-btn  thumbs_downo"><i class="far fa-thumbs-down thumbs_downo" ></i> No </a><span class="dislikes">'.getDislikes($row['id']).' </span>';
														
													}
													elseif( mysqli_num_rows($result022)!=0 )
													{
                                                       echo'<a data-id="'.$row['id'].'"  data-iduss="'.$_SESSION['id'].'"  data-iddoc ="'.$row['Doc_id'].'"   id="dislike"  class="dislike-btn thumbs_down "><i class="far fa-thumbs-down "></i> No </a><span class="dislikes">'.getDislikes($row['id']).' </span>';
													}	
													echo '
												   	</p>	
												</br>
												</br>  
												   ';
																						  
												    //sub comment request
													$idcmt = $row['id'];
													$Cm_user = $_SESSION['name'];
												   $s = "SELECT * FROM comment_replies  where  comment_id = $idcmt  " ;
												   $res = mysqli_query($conn, $s);
												   echo ' <ul class="comments-reply"  style="display: none;" id ="'.$row['id'].'">';

										 		    while($rowo = mysqli_fetch_assoc($res)){
														 	//saving the rp cmt
															 $id_user_rp = $rowo["user_id"];
															 $s_rp = "SELECT * FROM users  where  IDusers = $id_user_rp  " ;
												        	 $res_rp = mysqli_query($conn, $s_rp);
															 $rowo_rp = mysqli_fetch_assoc($res_rp);
															//last_commenting_rp
															$last_date_cmt_rp = $rowo['commented_on'];

														// sub comment
												      echo ' <li>
													   <div class="comment">
														   <img class="avatar avatar-sm rounded-circle" alt="User Image"  src= " '.$rowo_rp["image"].'">
														   <div class="comment-body">
															   <div class="meta-data">
															     <span class="comment-author"> ';
															       echo $rowo_rp["name"]." ".$rowo_rp["surname"];
															       echo  ' </span>
																   <span class="comment-date">';
															       echo $last_date_cmt_rp;
															       echo  '
																   </span>
															    </div>															
															   <p class="comment-content">
															   '.$rowo['reply_msg'].'
															   </p>
															   <div class="comment-reply">																   
															   </div>
														   </div>
													   </div>
												   </li>';
													}
													echo '</ul>
												   </div>
										   </div>
										 </li>
										 </div> 

										
											 </div> ';
    							    	    }
    							    	 } else
										    {
    							    	    echo "There are no comments";
    							    	    }

    							    	 ?>
	
										 <!-- Hiden input where filling the doctor ID ; -->
										<input type="hidden" class ="id_doc_input"id="id_doc_input" name="ide" value="<?php echo$_GET['id']; ?>" >
    									</div>										
										<!-- /end boucle like -->
										</ul>
										<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
										<!-- button display all comments two by two -->
										<script>    
										    $(document).ready(function(){
										        var commentCount = 2;
												var iddocInput= $("#id_doc_input").val();
										        $('.displayer').click(function(){
										            commentCount = commentCount + 2;
												
													// alert('displayer can display');
										            $("#comments").load("load-comments.php", {
										                commentNewcount: commentCount , 
														ids : iddocInput 
													 });           
										        });
										    });
										</script>
										
										<!-- Show All -->
										<div class="all-feedback text-center">
											<a id="load" href="javascript:void(0)" >
												Show all feedback <strong>(<?php echo $rw['count']; ?>)</strong>
											</a>
										</div>

							<script>
								$(function(){
                                $(".reply_bo").slice(0, 4).show(); // select the first ten
                                $("#load").click(function(e){ // click event for load more
                                e.preventDefault();
                                $(".reply_bo:hidden").slice(0, 2).show(); // select next 10 hidden divs and show them
                                if($(".reply_bo:hidden").length == 0){ // check if any hidden divs still exist
									$( "#load" ).hide();
                                  }
                                            });
                                           });
										</script>
										<!-- /Show All -->
								 	 </div>
									                                        <!-- /Review Listing -->
																			<?php 
										  $iddname = mysqli_real_escape_string($conn, $_GET['id']);
											// $iddname = $_GET['id'];
											$dname_rs = "SELECT * from users where IDusers = '$iddname' ";
											$iddname_qr = mysqli_query($conn , $dname_rs);
											$rowdoc = mysqli_fetch_array( $iddname_qr);
										?>
									<!-- Write Review -->
									<?php
                                            	//stars rating	
											if(isset($_POST['checkedval'])){
											$checkedval = $_POST['checkedval'];
											$id_doc_input = $_POST['id_doc_input'];
											$iduser = $_SESSION['id'];

											$st_select ="SELECT * FROM rating_stars where iduser_rating = $iduser and id_Doc_rating = $id_doc_input " ;
											$st_rq = mysqli_query($conn, $st_select);

											

											if(mysqli_num_rows($st_rq)==0){
												$star_select = "INSERT INTO `rating_stars` ( `id_Doc_rating`, `iduser_rating`, `title_rating` ) VALUES ('$id_doc_input', '$iduser', '$checkedval')" ;
												$star_request = mysqli_query($conn, $star_select);	

												$avg_user = "SELECT AVG(title_rating) as avg  from rating_stars where id_Doc_rating = '$id_doc_input' ";
												$avg_star_rs = mysqli_query($conn, $avg_user);
												$rf = mysqli_fetch_assoc( $avg_star_rs);
												$AVG = $rf['avg'];
												$avg_star_sl = "UPDATE users SET thisDoc_avg = '$AVG' where IDusers = '$id_doc_input' ";
												   $avg_result = mysqli_query($conn, $avg_star_sl);

												}elseif(mysqli_num_rows($st_rq)!=0){
													 $star_update = "UPDATE `rating_stars` SET  `title_rating` = '$checkedval'  WHERE iduser_rating =  $iduser and id_Doc_rating= $id_doc_input";															
													$star_up_request = mysqli_query($conn, $star_update);
												}
											}


                                            // Sauf queles patients de ce Dr peuvent commenter
											$session_user = $_SESSION['id'] ;
											$id_Docr = $_GET['id'];
											$sl_dependent = "SELECT * FROM appointment where  code = 3 and iddoc = $id_Docr and idus = '$session_user' ";
											$rq_dependent = mysqli_query($conn, $sl_dependent);


										 	$id_user_cmt = $_SESSION['id'];
										 	$hide_commented_sl = "SELECT * FROM comments WHERE `user_id` = '$id_user_cmt' and `Doc_id`='$id_Docr' ";
											$hide_commented_rq = mysqli_query($conn, $hide_commented_sl);
											$hide_commented_ary = mysqli_fetch_array($hide_commented_rq);

											if(mysqli_num_rows($hide_commented_rq)==0)
											{
											 echo '<div class="write-review">
											 <h4> Write a review for Dr<strong>'; ?><?php echo $rowdoc['name']." ".$rowdoc['surname']?><?php
											 echo'</strong> </h4>
											 <!-- Write Review Form -->';
											
											 if (mysqli_num_rows($rq_dependent)!=0)
											 {
											echo'<form>
													<div class="form-group">
														<label>Review</label>
														<div class="star-rating">
														<input id="star-5" type="radio" name="rating" value="5"  >
														<label for="star-5" title="5 stars">
															<i class="active fa fa-star"></i>
														</label>
														<input id="star-4" type="radio" name="rating" value="4" >
														<label for="star-4" title="4 stars">
															<i class="active fa fa-star"></i>
														</label>
														<input id="star-3" type="radio" name="rating" value="3" >
														<label for="star-3" title="3 stars">
															<i class="active fa fa-star"></i>
														</label>
														<input id="star-2" type="radio" name="rating" value="2" >
														<label for="star-2" title="2 stars">
															<i class="active fa fa-star"></i>
														</label>
														<input id="star-1" type="radio" name="rating" value="1" >
														<label for="star-1" title="1 star">
															<i class="active fa fa-star"></i>
														</label>
													</div>
												</div>';
											}elseif (mysqli_num_rows($rq_dependent)==0)
											{
												echo' <div class="review-count rating">
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i>
													   <i class="fas fa-star "></i></div>';
											}
											echo'<div class="form-group">
													<label>Your review</label>';												   
														if (mysqli_num_rows($rq_dependent)!=0){
																echo'<textarea id="review_desc" maxlength="200" class="form-control comment_textbox"></textarea>
																<div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">200</span> characters remaining</small></div>
																</div>
																	<hr>
																	<div class="form-group">
																		<div class="terms-accept">
																			<div class="custom-checkbox">
																				<input type="checkbox" id="terms_accept" checked>
																			<label for="terms_accept"> I am accepting all Terms <a href="#">Terms &amp; Conditions</a></label>
																			</div>
																		</div>
																	</div>
																	<div class="submit-section">
																		<button type="button" style ="display:flex"  class="btn btn-primary add_comment_btn">Add Review</button>
																	</div>
																</form>
																<!-- /Write Review Form -->
															</div>
															<!-- /Write Review -->	
															</div>															
															<!-- /Reviews Content -->';
														    }
															elseif (mysqli_num_rows($rq_dependent)==0){
															// secound echo to disactivat the button (non+id). in the disable case to not be posted
																echo'<textarea disabled id="review_desc" placeholder="You are not a Patient of this Doctor"  maxlength="200" class="form-control comment_textbox"></textarea>
																<div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">200</span> characters remaining</small></div>
																</div>
																<hr>
																<div class="form-group">
																	<div class="terms-accept">
																		<div class="custom-checkbox">
																			<input type="checkbox" id="terms_accept" checked>
																		<label for="terms_accept"> I am accepting all Terms <a href="#">Terms &amp; Conditions</a></label>
																		</div>
																	</div>
																</div>
																<div class="submit-section">
																	<button type="button" style ="display:flex"  class="btn btn-primary non_add_comment_btn">Add Review</button>
																</div>
															</form>
															<!-- /Write Review Form -->
														    </div>
														    <!-- /Write Review -->	
															</div>																	
														    <!-- /Reviews Content -->';				
												        }

											}elseif(mysqli_num_rows($hide_commented_rq)!=0){
												echo '<div class="write-review">
												<h4> Write a review for Dr<strong>';?><?php echo $rowdoc['name']." ".$rowdoc['surname']?><?php
												 echo'</strong> </h4>
												<!-- Write Review Form -->
												<form>
													<div class="form-group">
														<label>Review</label>
														<div class="star-rating">
															<input id="-5" type="radio" name="rating" value="5">
															<label for="star-5" title="5 stars">
																<i class="active fa fa-star"></i>
															</label>
															<input id="-4" type="radio" name="rating" value="4">
															<label for="star-4" title="4 stars">
																<i class="active fa fa-star"></i>
															</label>
															<input id="-3" type="radio" name="rating" value="3">
															<label for="star-3" title="3 stars">
																<i class="active fa fa-star"></i>
															</label>
															<input id="-2" type="radio" name="rating" value="2">
															<label for="star-2" title="2 stars">
																<i class="active fa fa-star"></i>
															</label>
															<input id="-1" type="radio" name="rating" value="1">
															<label for="star-1" title="1 star">
																<i class="active fa fa-star"></i>
															</label>
														</div>
													</div>

													<div class="form-group">
														<label>Your review</label>';
														echo'<textarea disabled placeholder="You have already Commented, you are allowed only once"  id="review_desc" maxlength="100" class="form-control comment_textbox"></textarea>
											     	    <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
													</div>

													<hr>
													<div class="form-group">
														<div class="terms-accept">
															<div class="custom-checkbox">
																<input type="checkbox" id="terms_accept" checked>
															 <label for="terms_accept"> I am accepting all Terms <a href="#">Terms &amp; Conditions</a></label>
															</div>
														</div>
													</div>

													<div class="submit-section">
														<button type="button" style ="display:flex"  class="btn btn-primary non_add_comment_btn">Add Review</button>
													</div>
												</form>
												<!-- /Write Review Form -->
											 </div>
												 <!-- /Write Review -->	
											 </div>		
												 <!-- /Reviews Content -->';
											}
										?>

										<!-- php prj -->
          <?php
								
								
								if(isset($_POST['add_comment'])){

									$msg = mysqli_real_escape_string($conn, $_POST['msg']);
									$user_id = $_SESSION['id'];
									$idc = $_GET['id'];
									$id = $_POST['id'];
									
									$comment_add_query = "INSERT INTO comments (`user_id`, `Doc_id`, `msg`) VALUES('$user_id','$id','$msg')";
									$run = mysqli_query($conn, $comment_add_query);
									if ($_POST['radio']=="true")
									{
									$rating_add_query = "INSERT INTO `rating_stars` ( `id_Doc_rating`, `iduser_rating`, `title_rating` ) VALUES ('$id', '$user_id', '0')";
									$run1 = mysqli_query($conn, $rating_add_query);
									}
								
									if($run){   
										echo 'comment added successfully';
									}else{
										echo 'somthing went wrong'; 
									}
								}
						// add reply cmt 
						// if(isset($_POST['add_reply'])){
						// 	$cmt_id = mysqli_real_escape_string($conn, $_POST['comment_id']);
						// 	$reply = mysqli_real_escape_string($conn, $_POST['reply_msg']);
							
						// 	$user_id = $_SESSION['id'];
						// 	$query =  "INSERT INTO comment_replies( user_id, comment_id, reply_msg  ) VALUES ('$user_id', '$cmt_id', '$reply')";
						// 	$query_run = mysqli_query($conn, $query);
							
						// 		if($query_run ){
						// 			echo "comment replied";
						// 		}else {
						// 		echo "somthing went wrong";
						// 		}

						// 	}


						// VIEW REPLY bttn
						if(isset($_POST['view_comment_data'])){
							$cmt_id = mysqli_real_escape_string($conn, $_POST['cmt_id']);
						
							$query = "SELECT * FROM comment_replies  WHERE comment_id = '$cmt_id' ";
							$runc = mysqli_query($conn, $query );
							$result_array = [];
						
							if( mysqli_num_rows($runc)>0 ){
							
								foreach($runc as $row){//1st data
									//we need the user data to see who is comenting
									$user_id = $row['user_id'];
									$user_query = "SELECT name FROM user WHERE id='$user_id' LIMIT 1";
									$user_query_run = mysqli_query($conn, $user_query);
									$user_result = mysqli_fetch_array($user_query_run);//2ed data
								
									// array_push($array_result, ['cmt' => $row, 'user' => $user_result]);
									array_push($result_array, ['cmt' => $row, 'user' => $user_result['name']]);
								}
								header('Content-type: application/json');
								echo json_encode($result_array);
							 }else{
									echo "No reply for this user";
								}
						}
                   ?>
									<!-- /php prj -->
								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">
										
											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span>5 Nov 2019</span></div>
															<div class="time-items">
																<span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Monday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Tuesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Wednesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Thursday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Friday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Saturday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day closed">
															<div class="day">Sunday</div>
															<div class="time-items">
																<span class="time"><span class="badge bg-danger-light">Closed</span></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Business Hours Widget -->
									
										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->
								<!-- Business Hours Content -->
								<?php if($_SESSION['usertype']=='user') { ?>
								<div role="tabpanel" id="book_appointment" class="tab-pane fade show active">
				          <div class="row">
			         	<div class="col-md-6 offset-md-3">
								<div class="modal-header "></div>

				      <div class="modal-body">
				      <center>
					 <!-- Form -->
					 

									<div class="form-group">
										<input class="form-control col-12 col-md-8" type="datetime-local" placeholder="MM/DD/YYYY" name="date3"  id="date3"  required >
									
									</div>
									<div class="form-group">
										<input class="form-control col-12 col-md-8" type="text" placeholder="00:00"  name="time1" id="time1" required>
									</div>
									<div class="form-group">
										<input class="btn btn-primary btn-block col-12 col-md-8 book_appointment" type="submit" value="Set Appointment" name ="submit">
									</div>
								
								<!-- /Form -->
								
							</center>
							<div class="message"></div>

							<div class="modal-header"></div>
		        </div>  
				   </div>
						</div>
								<!-- /Business Hours Content -->
								
							</div>
							<?php } ?>
						</div>
					</div>
					<!-- /Doctor Details Tab -->
				</div>
			</div>
</div>
</div>		

			<!-- /Page Content -->
		<!-- prj scripts -->
		<script src="assets/js/custom.Js" ></script>
		
<!-- bootstrap CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- for sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

