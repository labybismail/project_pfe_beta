<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">
						
							<!-- Profile Widget -->
<?php
$iduser=$_GET['id'];
$sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
$row = mysqli_fetch_assoc($sql);

?>
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<div class="pro-widget-content">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												<img src="assets/img/block.png" alt="User Image">
											</a>
											<div class="profile-det-info">
												<h3><?php echo $row["name"]?> <?php echo $row["surname"] ?></h3>
												
												<div class="patient-details">
													
													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
												</div>
											</div>
										</div>
									</div>
									<div class="patient-info">
										<ul>
											<li>Phone <span>*****</span></li>
											<li>Age <span>******</span></li>
											<li>Blood Group <span>****</span></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Profile Widget -->
							
					
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
							<div class="card">
								<div class="card-body pt-0">
									<div class="user-tabs">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pres" data-toggle="tab"><span>Prescriptions</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#medical" data-toggle="tab"><span class="med-records">Medical Records</span></a>
											</li>
											 
										</ul>
									</div>
									<div class="tab-content">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
                                                    <img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="pres">
											
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
                                                    <img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
													</div>
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->

										<!-- Medical Records Tab -->
										<div class="tab-pane fade" id="medical">
											
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
                                                    <img src="assets/img/contenu.png" style="  width: 100%;   height: 100%;">
													</div>
												</div>
											</div>
										</div>
										<!-- /Medical Records Tab -->
										
										
												
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		