	<!-- Page Content -->
    <div class="content">
				<div class="container">
                           <?php
                           $iduser=$_GET['id'];
                           $sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
                           $row = mysqli_fetch_assoc($sql);
                           
                           ?>
					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="assets/img/block.png" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name"><?php echo $row["name"]?>&nbsp<?php echo $row["surname"] ?></h4>
										<p class="doc-speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
										<p class="doc-department"><img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(35)</span>
										</div>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a href="javascript:void(0);">Get Directions</a></p>
											<ul class="clinic-gallery">
												<li>
													<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
														<img src="assets/img/blockimg.png" alt="Feature">
													</a>
												</li>
												<li>
													<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
														<img  src="assets/img/blockimg.png" alt="Feature Image">
													</a>
												</li>
												<li>
													<a href="assets/img/blockimg.png" data-fancybox="gallery">
														<img src="assets/img/blockimg.png" alt="Feature">
													</a>
												</li>
												<li>
													<a href="assets/img/blockimg.png" data-fancybox="gallery">
														<img src="assets/img/blockimg.png" alt="Feature">
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
								<div class="doc-info-right">
									<div class="clini-infos">
										<ul>
											<li><i class="far fa-thumbs-up"></i> 99%</li>
											<li><i class="far fa-comment"></i> 35 Feedback</li>
											<li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
											<li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
										</ul>
									</div>
									<div class="doctor-action">
									<form action="" method="POST" >
                                         
  
                                         <a href="javascript:void(0)" class="btn btn-white fav-btn" style="  color: currentColor; cursor: not-allowed; opacity: 0.5; text-decoration: none; ">
                                        		<i class="far fa-bookmark"></i>
                                        	</a>
										
										<a href="javascript:void(0)" class="btn btn-white msg-btn" style="  color: currentColor; cursor: not-allowed; opacity: 0.5; text-decoration: none; "  >
											<i class="far fa-comment-alt"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" style="  color: currentColor; cursor: not-allowed; opacity: 0.5; text-decoration: none; " >
											<i class="fas fa-phone"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn"  style="  color: currentColor; cursor: not-allowed; opacity: 0.5; text-decoration: none; " >
											<i class="fas fa-video"></i>
										</a>
									</div>
									</form>
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
									<img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
								</div>
								<!-- /Overview Content -->
								
								<!-- Locations Content -->
								<div role="tabpanel" id="doc_locations" class="tab-pane fade">
								
									<!-- Location List -->
									<div class="location-list">
                                    <img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
									</div>
									<!-- /Location List -->
									
									

								</div>
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
                                <img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
						
								</div>
								<!-- /Reviews Content -->
								
								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                                <img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
								</div>
								<!-- /Business Hours Content -->
								<!-- Business Hours Content -->
								<?php if($_SESSION['usertype']=='user') { ?>
								<div role="tabpanel" id="book_appointment" class="tab-pane fade show active">
                                <img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
								<!-- /Business Hours Content -->
								
							</div>
							<?php } ?>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->