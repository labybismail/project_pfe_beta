<?php

include_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Doctor List Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


		
		
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

		</style>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <?php
           
           
           if ($_SESSION['usertype']=='admin')
           {
              include_once("headerAd.php"); 
           } 
           else
           {
               session_destroy();
               header("location: ..\..\login-23.php");
           } 
               ?>
			<!-- /Header -->
			
			<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="appointment-list.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
							</li>
							<li class="active"> 
								<a href="doctor-list.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
							</li>
							<li> 
								<a href="patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li> 
								<a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li>
								<a href="pharmacy-list.html"><i class="fe fe-vector"></i> <span>Clinic List</span></a></li>
							<li> 
								<a href="profile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>

							
							
						
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">List of Doctors</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Doctor</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
                        </div>
                    </div>
                </div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0" id='example'>
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Member Since</th>
													<th>Best Doctor</th>
                                                    <th>Block Account</th>
                                                    <th>Edit Profile</th>
													
												</tr>
                                                </thead>
										<form method="post" action="doctor-list.php">

											<?php
											
												$sqql = "SELECT * FROM users where usertype = 'doctor' ";
												$result = mysqli_query($conn, $sqql);
                                                $k=0;
												while ($row = mysqli_fetch_array($result)) {
                                                    $idcount=$row["specialities"];
                                                    $count = mysqli_query($conn, "SELECT * FROM `specialities` WHERE `idspec`= '$idcount' ");
                                                    $row1 = mysqli_fetch_array($count);
                                                     $k++;
											?>

                                                <tr>  
													<td>
														<h2 class="table-avatar">
															<a href="../doctor-profile.php?id=<?php echo $row["IDusers"] ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $row["image"] ?>" alt="User Image"></a>
															<a href="../doctor-profile.php?id=<?php echo $row["IDusers"] ?>">Dr. <?php echo $row["name"] ?> <?php echo $row["surname"] ?></a>
														</h2>
													</td>
													<td>
															<a href="javascript:void(0)" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="../<?php echo $row1["image"] ?>" alt="User Image"></a>

                                                        <?php echo $row1["name"] ?></td>
													
													<td><?php echo $row["date"] ?> <br><small><?php echo $row["time"] ?></small></td>
													
													
													
													<td>
                                                    <?php if($row["best"]==0)
                                                    {?>
														<div class="status-toggle">
															<input type="checkbox" name="checkbox1" id="<?php echo $row["IDusers"] ?>" onclick='window.location.assign("doctor-list.php?id=<?php echo $row["IDusers"] ?>&best=<?php echo $row["best"] ?>")' class="check" value="b" >
															<label for="<?php echo $row["IDusers"] ?>" class="checktoggle">checkbox</label>
														</div>
                                                        <?php
                                                     }elseif($row["best"]==1){
													
                                                    ?>
                                                    
                                                    <div class="status-toggle">
															<input type="checkbox" name="checkbox2" onclick='window.location.assign("doctor-list.php?id=<?php echo $row["IDusers"] ?>&best=<?php echo $row["best"] ?>")' id="<?php echo $row["IDusers"] ?>" class="check" value="a" checked>
															<label for="<?php echo $row["IDusers"] ?>" class="checktoggle" >checkbox</label>
														</div>
                                                        <?php
                                                     }
													
                                                    ?>

													</td>
                                                    <td>
                                                    <?php  if($row["block"]==0)
                                                    { 
                                                     ?>
														<div class="status-toggle">
															<input type="checkbox" name="checkbox1" id="<?php echo $k ?>" onclick='window.location.assign("doctor-list.php?ids=<?php echo $row["IDusers"] ?>&block=<?php echo $row["block"] ?>")' class="check" value="b" >
															<label for="<?php echo $k ?>" class="checktoggle" style="background-color: #00d0f1;">checkbox</label>
														</div>
                                                        <?php
                                                     }elseif($row["block"]==1){
													
                                                    ?>
                                                    <div class="status-toggle">
															<input type="checkbox" name="checkbox2" onclick='window.location.assign("doctor-list.php?ids=<?php echo $row["IDusers"] ?>&block=<?php echo $row["block"] ?>")' id="<?php echo $k?>" class="check" value="a" checked>
															<label for="<?php echo $k ?>" class="checktoggle"style="background-color: #212529;">checkbox</label>
														</div>
                                                        <?php
                                                     }
													
                                                    ?>

													</td>
                                                    <td>
									            	<div class="table-action">
										        	<a href="#editarUsuario" id="edit" class="btn btn-sm bg-info-light fedit" data-toggle="modal" data-id="<?php echo $row["IDusers"] ?>"  data-gender="<?php echo $row["gender"] ?>" data-name="<?php echo $row["name"] ?>" data-surname="<?php echo $row["surname"] ?>" data-cin="<?php echo $row["cin"] ?>" data-phone="<?php echo $row["phone"] ?>" data-email="<?php echo $row["email"] ?>"  data-specialities="<?php echo $row1["idspec"] ?>" data-specialitiesn="<?php echo $row1["name"] ?>" >	<i class="fas fa-edit"    ></i> Edit</a>
										        	 </div>
									               </td>
												</tr>


												<?php
                                                

													}
                                                   
                                                    if(isset($_GET['id']))
                                                { 
                                                    $t1= $_GET['best'];
                                                    
                                                    if($t1==1)
                                                    {
                                                        $is= $_GET['id'];
                                                        $updat="UPDATE `users` SET `best`='0' where `IDusers` = '$is' ";
                                                        $result = mysqli_query($conn, $updat); 
                                                        ?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php
                                                   
                                                   }
                                                   elseif($t1==0)
                                                   {
                                                    $is= $_GET['id'];
                                                    $update="UPDATE `users` SET `best`='1' where `IDusers` = '$is' ";
                                                    $result = mysqli_query($conn, $update); 
                                                    ?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php
  
                                                  }
                                                     

                                                }
                                                if(isset($_GET['ids']))
                                                { 
                                                    $t= $_GET['block'];
                                                    
                                                    if($t==1)
                                                    {
                                                        $i= $_GET['ids'];
                                                        $updat="UPDATE `users` SET `block`='0' where `IDusers` = '$i' ";
                                                        $result = mysqli_query($conn, $updat); 
                                                        ?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php
                                                   
                                                   }
                                                   elseif($t==0)
                                                   {
                                                    $i= $_GET['ids'];
                                                    $update="UPDATE `users` SET `block`='1' where `IDusers` = '$i' ";
                                                    $result = mysqli_query($conn, $update); 
                                                    ?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php
  
                                                  }
                                                     

                                                }
                                               
                                                    

												
										
											?>
                  

										</form>
									</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
            <!-- Add Modal -->
        <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Doctor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                    </div>
                    <div class="modal-body">
                        <form action="doctor-list.php" enctype="multipart/form-data" autocomplete="off" method="post">
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>SurName</label>
                                        <input type="text" class="form-control"  name="surname" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Cin</label>
                                        <input type="text" class="form-control"  name="cin" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control"  name="phone" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control"  name="email" required  >
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control"  name="password" required >
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                    <label>Gender</label>
                                        <select class="form-control"  id="viewSelector"    name="gender" required >
											<option value="male">Male</option>
                                            <option value="female">Female</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" id="date3"  name="dateBirth" required>
                                    </div>
                                </div>
                               
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control"  name="address" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control"  name="country"required >
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Zipcode</label>
                                        <input type="text" class="form-control"  name="zipcode" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control"  name="city" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Specialities</label>
                                        <select class="form-control Specialities" id="Specialities" name="Specialities" >
                                        <?php
                                            $sqql = "SELECT * FROM specialities  ";
                                            $result = mysqli_query($conn, $sqql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                          <option value="<?php echo $row["idspec"] ?>"><?php echo $row["name"] ?></option>
                                          <?php }?>
                                        </select>
                                    </div>
                                </div>
                               <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="filee" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" name="save" class="btn btn-primary btn-block" style="margin-bottom: 10px;">Save</button>

                            <?php 
					
					if(isset($_POST['save']))
					{
						
				
						$surname=$_POST['surname'];
						$name=$_POST['name'];
						$cin=$_POST['cin'];
                        $email=$_POST['email'];
                        $phone=$_POST['phone'];
                        $password=$_POST['password'];
						$gender=$_POST['gender'];
						$nowD = date('j F Y'); 
						$nowT = date('H:i:s'); 
						$dateBirth=$_POST['dateBirth'];
						$address=$_POST['address'];
						$country=$_POST['country'];
						$zipcode=$_POST['zipcode'];
						$city=$_POST['city'];
						$Specialities=$_POST['Specialities'];

                        $searchaddress=$address.",".$country.",".$zipcode.",".$city;
                        $sql_email=mysqli_query($conn, "select * from `users` where `email`='$email' or `cin`='$cin' or `phone`='$phone' ");
                        $roow = mysqli_fetch_assoc($sql_email);
                        if ($roow['email']==$email )
                        {
                         echo'<div class="alert alert-danger" role="alert">
                         the email has been used before!
                        </div>';
                        
                        }
                        elseif ($roow['phone']==$phone )
                        {
                         echo'<div class="alert alert-danger" role="alert">
                         the phone number has been used before!
                        </div>';
                        
                        }
                        elseif ($roow['cin']==$cin )
                        {
                         echo'<div class="alert alert-danger" role="alert">
                        the cin has been used before!
                        </div>';
                           
                        }

	elseif($_FILES["filee"]["error"] == 0)
	{
    $file = $_FILES['file'];

    $fileNamez = $_FILES['filee']['name'];
    $filetmpNamee = $_FILES['filee']['tmp_name'];
    $fileErrorr = $_FILES['filee']['error'];
    $filetypee = $_FILES['filee']['type'];

    //to store only the Extention in our variable
    //and put the extention in lower case
    $fileExtt = explode('.', $fileNamez);
    $fileActualExtt = strtolower(end($fileExtt));
 
    $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExtt, $allowed)){
            if($fileErrorr === 0){
               
                if($fileSize < 5000000){
                    $fileNewName = uniqid('',false).".".$fileActualExtt;

                    //var to stor new upload space
                    $fileDestination = 'assets/img/doctors/'.$fileNewName;
                    move_uploaded_file($filetmpNamee, $fileDestination);
					
$insert = "insert into `users` (`name`,`surname`,`cin`,`phone`,`email`,`password`,`usertype`,`gender`,`date`,`time`,`image`,`dateBirth`,`address`,`country`,`zipcode`,`city`,`searchaddress`,`Specialities`) values('$name','$surname','$cin','$phone','$email','$password','doctor','$gender','$nowD','$nowT','$fileDestination','$dateBirth','$address','$country','$zipcode','$city','$searchaddress','$Specialities')";
                   
					$insert_sql =mysqli_query($conn,$insert);
					
                                ?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php

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
	elseif($_FILES["filee"]["error"] == 4)
	 {
         if($gender=="male")
         {
            $chemain = "assets/img/doctors/docM.png";	
$insert = "insert into `users` (`name`,`surname`,`cin`,`phone`,`email`,`password`,`usertype`,`gender`,`date`,`time`,`image`,`dateBirth`,`address`,`country`,`zipcode`,`city`,`searchaddress`,`Specialities`) values('$name','$surname','$cin','$phone','$email','$password','doctor','$gender','$nowD','$nowT','$chemain','$dateBirth','$address','$country','$zipcode','$city','$searchaddress','$Specialities')";
        $insert_sql =mysqli_query($conn,$insert);
        echo '<div class="alert alert-success" role="alert" >
        Your  have been successfully registered !!
        </div>';
		?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php
         }
         elseif($gender=="female")
         {
            $chemain = "assets/img/doctors/docF.png";	
$insert = "insert into `users` (`name`,`surname`,`cin`,`phone`,`email`,`password`,`usertype`,`gender`,`date`,`time`,`image`,`dateBirth`,`address`,`country`,`zipcode`,`city`,`searchaddress`,`Specialities`) values('$name','$surname','$cin','$phone','$email','$password','doctor','$gender','$nowD','$nowT','$chemain','$dateBirth','$address','$country','$zipcode','$city','$searchaddress','$Specialities')";
        $insert_sql =mysqli_query($conn,$insert);
        echo '<div class="alert alert-success" role="alert" >
        Your  have been successfully registered !!
        </div>';
		?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php
         }
		
	}

					}

					
					
					
					?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /ADD Modal -->
        <!-- Edit Profile Modal-->
	
	<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
                

              <form action="doctor-list.php" enctype="multipart/form-data" autocomplete="off" method="post" id="update_form"> 
					<div class="modal-header">
						<h5 class="modal-title">Edit member</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
                    <div class="form-group">
							<label class="control-label mb-10" > Name <span class="text-danger">*</span></label>
							<input type="hidden" id="id_u" name="id" class="form-control" required>	
							<input type="text" id="name_u" name="name" class="form-control"  value=""  required >
						</div>
                        <div class="form-group">
							<label class="control-label mb-10" > Surname <span class="text-danger">*</span></label>
							<input type="text" id="surname" name="surname" class="form-control"  value=""  required >
						</div>
						<div class="form-group">
							<label class="control-label mb-10">Phone </label>
							<input type="text" id="phone" name="phone" class="form-control" value="" required >
						</div>
                        <div class="form-group">
							<label class="control-label mb-10">Email </label>
							<input type="text" id="email" name="email" class="form-control" value="" required >
						</div>
                        <div class="form-group">
							<label class="control-label mb-10">CIN </label>
							<input type="text" name="cin" id="cin" value=""  class="form-control" required >
						</div>
                       <div class="form-group">
                           <label>Specialities</label>
                           <select class="form-control Specialities" id="Specialitiese" name="Specialities" >
                           <?php
                               $sqql = "SELECT * FROM specialities  ";
                               $result = mysqli_query($conn, $sqql);
                               while ($row = mysqli_fetch_array($result)) {
                                   ?>
                             <option value="<?php echo $row["idspec"] ?>"><?php echo $row["name"] ?></option>
                             <?php }?>
                           </select>
                       </div>
						<div class="form-group">
							<label class="control-label mb-10" >Gender </label>
							<select class="form-control" id ="gender" name="gender" required >
								<option value="">Select</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						
					</div>
					<div class="modal-footer text-center">
					<button type="submit" class="btn btn-primary submit-btn" name="update">Save Changes</button>
					
					</div>
					
					<?php 
					
					if(isset($_POST['update']))
					{
						
				
						$iduser=$_POST['id'];
						$name=$_POST['name'];
                        $surname=$_POST['surname'];
                        $phone=$_POST['phone'];
						$email=$_POST['email'];
                        $cin=$_POST['cin'];
						$gender=$_POST['gender'];
						$Specialities=$_POST['Specialities'];

						
	
	
        $insert = " UPDATE `users` SET `name`='$name',`surname`='$surname',`phone`='$phone',`email`='$email',`cin`='$cin',`gender`='$gender',`Specialities`='$Specialities' WHERE `IDusers`='$iduser'";
        $insert_sql =mysqli_query($conn,$insert);
        echo '<div class="alert alert-success" role="alert" >
        Your dependent have been successfully registered !!
        </div>';
		?><meta http-equiv="Refresh" content="0; doctor-list.php"><?php
		
	

					}

					
					
					
					?>
			
				</form>

        </div>
        </div>
    </div>
</div>
	<!-- /Edit Profile Modal-->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    

	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({});
		});
	</script>
    <script type='text/javascript'>
      $(document).ready(function(){
          $('#edit').click(function(){
               $('.modal-content').html(response); 
              $('#editarUsuario').modal('show'); 
		 });
      });
      
	$(document).on('click','.fedit',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
        var surname=$(this).attr("data-surname");
		var email =$(this).attr("data-email");
        var phone =$(this).attr("data-phone");
		var cin=$(this).attr("data-cin");
		var gender=$(this).attr("data-gender");

		var specialities = $(this).attr("data-specialities");
		$('#id_u').val(id);
		$('#name_u').val(name);
        $('#surname').val(surname);
		$('#email').val(email);
        $('#phone').val(phone);
		$('#cin').val(cin);
		$('#gender').val(gender);

		$('#Specialitiese').val(specialities);
		$('.select2-selection__rendered').text($(this).attr("data-specialitiesn"));


		
	});
     </script>
     <script>

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
		<script>
$(document).ready(function() {
    $('.Specialities').select2();
    $( ".select2-selection" ).removeClass( "select2-selection--single" );
    $( ".select2" ).removeClass( "select2-container" ).addClass( "form-control" );

});

        </script>
    </body>


</html>