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
												<img src="<?php echo $row["image"] ?>" alt="User Image">
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
												<!-- calcule dateNaissance -->
										<?php
                                            $dateNaissance = $row["dateBirth"];
                                            $aujourdhui = date("Y-m-d");
                                            $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
                                          ?>
											<li>Phone <span><?php echo $row["phone"] ?></span></li>
											<li>Age <span><?php echo $diff->format('%y') ?> Years, <?php echo $row["gender"] ?></span></li>
											<li>Blood Group <span>AB+</span></li>
											<li>
											<div class="form-group">
								<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">care sheet</font></font></label>
								<select class="form-control care_sheet notranslate " id ="care_sheet" data-id="<?php echo $_GET['id']?>" aria-hidden="true" name="type" id="type">*
								<option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"  >SELECT ITEM </font></font></option>
									<option  value="CMIM" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CMIM</font></font></option>
									<option value ="CNOPS" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" >CNOPS</font></font></option>
									<option value ="CNSS" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" >CNSS</font></font></option>

								</select>
						                	</div>
											</li>
											<li id="care_sheet_type_li" style="display: none;">
											<div class="form-group">
								<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Care Sheet Type</font></font></label>
								<select class="form-control care_sheet " id ="care_sheet_type" data-id="<?php echo $_GET['id']?>" aria-hidden="true">
								<option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"  >SELECT ITEM </font></font></option>
								<option value="Illness"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"  >Illness care sheet </font></font></option>
									<option  value="Dental" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dental care sheet</font></font></option>
									<option value ="Long-term" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" >Long-term illness care sheet</font></font></option>
								</select>
						                	</div>
											</li>

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
											<?php if($_SESSION['usertype']=='doctor')
											{?>
											<li class="nav-item">
												<a class="nav-link" href="#pres" data-toggle="tab"><span>Prescriptions</span></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#medical" data-toggle="tab"><span class="med-records">Medical Records</span></a>
											</li>
								     	<?php	}?>
											 
										</ul>
									</div>
									<div class="tab-content">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id='example' >
															<thead>
																<tr>
                                                                <th>Doctor</th>
                                                                <th>Booking Date</th>
                                                                <th>Appt Date</th>
                                                                <th>Status</th>
                                                               
                                                                </tr>
															</thead>
															<form method="post" action="">

											<?php
											
											$idp = $_SESSION['id'];
											if($_SESSION['usertype']=='admin')
											{
												$reesult = mysqli_query($conn, "SELECT * FROM appointment where idus = $iduser	");
											}elseif($_SESSION['usertype']=='doctor'){
											$reesult = mysqli_query($conn, "SELECT * FROM appointment where iddoc = '$idp' and idus='$iduser' ");
										     }
											while ($roow = mysqli_fetch_array($reesult)) {
												$idus = $roow['iddoc'];
												$sqql = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$idus'";
												$result = mysqli_query($conn, $sqql);
												while ($row = mysqli_fetch_array($result)) {
													$code = $roow['code'];
													
											?>

														<tr>
															<td>
																<h2 class="table-avatar">
																	<a  class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo $row["image"] ?>" alt="User Image"></a>
																	<a > Dr. <?php echo $row["name"] ?> <?php echo $row["surname"] ?> </a>
																</h2>
															</td>
															<td><?php echo $roow["date"] ?> <span class="d-block text-info"><?php echo $roow["time"] ?></span></td>
															<td><?php echo $roow["dateM"] ?></td>
															
                                                            <?php if ($code == 0) { ?>
                                                            <td><span class="badge badge-pill bg-warning-light">Pending</span></td>
															
                                                            <?php } elseif ($code == 1) {?>
                                                                <td><span class="badge badge-pill bg-success-light">Confirm</span></td>
                                                                
                                                             <?php } elseif ($code == 2) {?>
                                                                <td><span class="badge badge-pill bg-danger-light">Cancelled</span></td>
                                                                
                                                                <?php } elseif ($code == 3) {?>
                                                                    <td><span class="badge badge-pill bg-success-light" style="background-color: rgb(0 178 255 / 12%) !important; color: #0066ffcf !important;">Done</span></td>
                                                                   
                                                                    <?php } ?>
														</tr>

												<?php

													
												}
											}	
											?>

										</form>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<div class="tab-pane fade" id="pres">
											<div class="text-right">
												<a href="add-prescription.php?id=<?php echo $_GET['id']?>" class="add-new-btn">Add Prescription</a>
											</div>
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id="example2" >
															<thead>
																<tr>
																	<th>Created by </th>
																	<th>Date </th>
																	<th></th>
																</tr>     
															</thead>
															<tbody>
                                                            <?php 
                          if($_SESSION['usertype']=='admin')
						  {
                                 $tes = "SELECT * FROM prescriptions where idus = '$iduser'and iddoc='$idp'";
								 $img ="admin/";
						  }
						elseif($_SESSION['usertype']=='doctor'){
							$tes = "SELECT * FROM prescriptions where idus = '$iduser' and iddoc='$idp'";
							$img ="";
						}
                           $reesult = mysqli_query($conn,$tes);
                          while(  $row = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$row['iddoc'];
                              $sqql = "SELECT * FROM users where (usertype = 'doctor' or usertype = 'admin')  AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($roow = mysqli_fetch_array($result))  
                          { 
                           
                               ?>
															
															<tr>
																<td>
																		<h2 class="table-avatar">
																			<a  class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="<?php echo $img.$roow["image"] ?>" alt="User Image">
																			</a>
																			<a >Dr. <?php echo $roow["name"] ?> <?php echo $roow["surname"] ?> <span>Dental</span></a>
																		</h2>
																	</td>
																	<td><?php echo $row["date"] ?> <span class="d-block text-info"><?php echo $row["time"] ?></span> </td>
																	
																	
																	<td class="text-right">
																		<div class="table-action">
																			<a download= "<?php echo $row["file"] ?>"  href="<?php echo $row["file"] ?>" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Download
																			</a>
																			
																			
                                                                       <a  class="btn btn-sm bg-danger-light callbtmodel "  data-idm="<?php echo $row["idP"] ?>"  data-toggle="modal" href="#delete_modal">
															        	<i class="fe fe-trash"></i> Delete
															           </a>
															
														
																		</div>
																	</td>
																</tr>
                                                <?php
                                              }
                                        }
                          
                          ?>		
															</tbody>	
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Prescription Tab -->

										<!-- Medical Records Tab -->
										<div class="tab-pane fade" id="medical">
											<div class="text-right">		
												<a href="#" class="add-new-btn" data-toggle="modal" data-target="#add_medical_records">Add Medical Records</a>
												<a href="#" class="add-new-btn" data-toggle="modal" data-target="#add_certificat_medical">Add medical certificate</a>

											</div>
											
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0" id="example1">
														<thead>
																<tr>
																	
																	<th>Created by </th>
																	<th>Title </th>
																	<th>Description</th>
																	<th>symptoms</th>
																	<th>Date</th>
																	<th></th>
																</tr>     
															</thead>
															
															<?php 
                          $id=$_SESSION['id'];
						  $ids=$_GET['id'];
						  if($_SESSION['usertype']=='admin')
											{
												$reeslt = mysqli_query($conn,"SELECT * FROM medicalr where idu = '$ids'  and iddoc='$id' ");
												$img1 ="admin/";
											}
											elseif($_SESSION['usertype']=='doctor')
											{
												$reeslt = mysqli_query($conn,"SELECT * FROM medicalr where idu = '$ids' and iddoc='$id' ");
												$img1 ="admin/";
											}
                           
                          while(  $roooow = mysqli_fetch_array($reeslt) ) 
                          {
                              $ids=$roooow['iddoc'];
                              $sl = "SELECT * FROM users where usertype = 'doctor' AND IDusers  ='$ids'";
                              $reslt = mysqli_query($conn, $sl); 
                          while($rooow = mysqli_fetch_array($reslt))  
                          {  
							
								
								 echo'
                                 <tr>
									
									<td>
										<h2 class="table-avatar">
											<a  class="avatar avatar-sm mr-2">
												<img class="avatar-img rounded-circle" src="'.$img1.$rooow["image"].'" alt="User Image">
											</a>
											<a >Dr.'.$rooow["name"].' '.$rooow["surname"].' <span>Dental</span></a>
										</h2>
									</td>
									<td>'.$roooow["name"].'</td>
									<td>'.$roooow["description"].'</td>
									<td>'.$roooow["symptoms"].'</td>
									<td>'.$roooow["date"].'</td>
									
									<td class="text-right">
									<div class="table-action">
										<a download= "'.$roooow["file"].'"  href="'.$roooow["file"].'" class="btn btn-sm bg-primary-light">
											<i class="fas fa-print"></i> Download
										</a>
										
										
                                   <a  class="btn btn-sm bg-danger-light callbtmodel1 "  data-idM="'.$roooow["idM"].'"  data-toggle="modal" href="#delete_modal_medical">
							    	<i class="fe fe-trash"></i> Delete
							       </a>
						
					
									</div>
								</td>
								</tr>
									   '; 
							
                          } 
                         } 
                          ?> 
																
														</table>
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

			