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

	<!-- Jquery UI-->
	<link rel="stylesheet" href="assets/plugins/jquery-ui/jquery-ui.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/redmond/jquery-ui.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
		 <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

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
			
  .modal-coontent {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    outline: 0;
}

		</style>
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
								<li class="breadcrumb-item"><a href="index.html">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dependent</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Dependent</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Page Content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">

					
						<!-- Profile Sidebar -->
											
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
							
							<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 30px;"><div class="profile-sidebar">
									<div class="widget-profile pro-widget-content">
										<div class="profile-info-widget" >
											<a href="Profile_Sidebar.php" class="booking-doc-img">
											  <img src="<?php echo $_SESSION['image']?>" >
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
												<li class="active">
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
	
								</div>  <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 385px; height: 1316px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></div>

						  <!-- /Profile Sidebar -->

					<div class="col-md-7 col-lg-8 col-xl-9">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col-sm-6">
										<h3 class="card-title">Dependent</h3>
									</div>
									<div class="col-sm-6">
										<div class="text-right">
											<a href="#modal_form" data-toggle="modal" class="btn btn-primary btn-sm" tabindex="0">Add Dependent</a>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body ">

								<!-- Dependent Tab -->
								<div class="card card-table mb-0">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0"id='example'>
												<thead>
													<tr>
														<th>Dependent</th>
														<th>Relation</th>
														<th>gender</th>
														<th>Number</th>
														<th>Blood Group</th>
														<th>Action</th>
													</tr>
												</thead>
												<?php 
                          $idp=$_SESSION['id'];
                           $reesult = mysqli_query($conn,"SELECT * FROM dependent where idu = '$idp' ");
                          while(  $roow = mysqli_fetch_array($reesult) ) 
                          {
                              $idus=$roow['idu'];
                              $sqql = "SELECT * FROM users where usertype = 'user' AND IDusers  ='$idus'";
                              $result = mysqli_query($conn, $sqql); 
                          while($row = mysqli_fetch_array($result))  
                          {  
							
								
								 echo'
                                 <tr>
									<td>
										<h2 class="table-avatar">
											<span class="avatar avatar-sm mr-2">
												<img class="avatar-img rounded-circle" src="'.$roow["image"].'" alt="User Image">
											</span>
											'.$roow["name"].'
										</h2>
									</td>
									<td >'.$roow["relation"].'</td>
									<td>'.$roow["gender"].'</td>
									<td>303-297-6170</td>
									<td>AB+</td>
									<td>
										<div class="table-action">
											<a href="#editarUsuario" id="edit" class="btn btn-sm bg-info-light fedit" data-toggle="modal" data-id="'.$roow["idd"].'" data-name="'.$roow["name"].'" data-relation="'.$roow["relation"].'" data-date="'.$roow["date"].'">	<i class="fas fa-edit" data-id="'.$roow["idd"].'" data-name="'.$roow["name"].'" data-relation="'.$roow["relation"].'" data-date="'.$roow["date"].'" ></i> Edit</a>
											<a href="dependent.php?i='.$roow["idd"].'"   class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Delete</a>
										</div>
									</td>
								</tr>
								';
		
                          } 
                         }
						 
						 if(isset($_GET['i']))
						 {
							$d=$_GET['i'];
							
							 $rlt = mysqli_query($conn,"DELETE FROM `dependent` WHERE `idd`='$d'");
							 ?><meta http-equiv="Refresh" content="0; dependent.php"><?php
						 }
                          ?>  
													
													
											</table>
										</div>
									</div>
								</div>
								<!-- /Dependent Tab -->

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

	<!-- Add Dependent Modal-->
	<div id="modal_form" class="modal fade custom-modal" tabindex="-1" role="dialog" aria-modal="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-coontent">
				<form action="dependent.php" enctype="multipart/form-data" autocomplete="off" method="post"> 
					<div class="modal-header">
						<h5 class="modal-title">Add new member</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label mb-10" > Name <span class="text-danger">*</span></label>
							<input type="text" name="namee" class="form-control" required >
						</div>
						<div class="form-group">
							<label class="control-label mb-10">Relation </label>
							<input type="text" name="relationn" class="form-control"required >
						</div>
						<div class="form-group">
							<label class="control-label mb-10" >Gender </label>
							<select class="form-control" name="geender" required >
								<option value="">Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10">DOB </label>
							<input type="text" name="datee" id="date3" value="" readonly="" class="form-control" required >
						</div>
						<div class="form-group">
							<label class="control-label mb-10">Photo </label>
							<input type="file"  name="file" class="form-control">
						</div>
					</div>
					<div class="modal-footer text-center">
						<button type="submit" class="btn btn-primary submit-btn" name="savee">Save Changes</button>
					</div>
					<?php 
					
					if(isset($_POST['savee']))
					{
						$idu=$_SESSION['id'];
						$name=$_POST['namee'];
						$relation=$_POST['relationn'];
						$gender=$_POST['geender'];
						$date=$_POST['datee'];
	if($_FILES["file"]["error"] == 0)
	{
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $filetmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    //to store only the Extention in our variable
    //and put the extention in lower case
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
 
    $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
               
                if($fileSize < 5000000){
                    $fileNewName = uniqid('',false).".".$fileActualExt;

                    //var to stor new upload space
                    $fileDestination = 'assets/img/dependent/'.$fileNewName;
                    move_uploaded_file($filetmpName, $fileDestination);
					
					$insert = "INSERT INTO `dependent`( `name`, `relation`, `gender`,  `date`,`image`, `idu`) VALUES ('$name','$relation','$gender','$date','$fileDestination','$idu')";
                    $insert_sql =mysqli_query($conn,$insert);
					
                                ?><meta http-equiv="Refresh" content="0; dependent.php"><?php

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
	elseif($_FILES["file"]["error"] == 4)
	 {
		if ($gender=="Male")
		{
			$img="assets/img/patients/patientH.jpg";
        $insert = "INSERT INTO `dependent`( `name`, `relation`, `gender`,  `date`, `idu`,`image`) VALUES ('$name','$relation','$gender','$date','$idu','$img')";
        $insert_sql =mysqli_query($conn,$insert);
        echo '<div class="alert alert-success" role="alert" >
        Your dependent have been successfully registered !!
        </div>';
		?><meta http-equiv="Refresh" content="0; dependent.php"><?php
		}
		elseif ($gender=="Female")
		{
			$img="assets/img/patients/patientF.jpg";
        $insert = "INSERT INTO `dependent`( `name`, `relation`, `gender`,  `date`, `idu`,`image`) VALUES ('$name','$relation','$gender','$date','$idu','$img')";
        $insert_sql =mysqli_query($conn,$insert);
        echo '<div class="alert alert-success" role="alert" >
        Your dependent have been successfully registered !!
        </div>';
		?><meta http-equiv="Refresh" content="0; dependent.php"><?php
		}
		
	}
	
					}

					
					
					
					?>
				</form>
			</div>
		</div>
	</div>
	<!-- /Add Dependent Modal-->

	<!-- Edit Dependent Modal-->
	
	<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
	

              <form action="dependent.php" enctype="multipart/form-data" autocomplete="off" method="post" id="update_form"> 
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
							<input type="text" id="name_u" name="name" class="form-control"  required >
						</div>
						<div class="form-group">
							<label class="control-label mb-10">Relation </label>
							<input type="text" id="relation_u" name="relation" class="form-control" required >
						</div>
						<div class="form-group">
							<label class="control-label mb-10" >Gender </label>
							<select class="form-control" name="gender" required >
								<option value="">Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10">DOB </label>
							<input type="text" name="date6" id="date6"   class="form-control" required >
						</div>
						<div class="form-group">
							<label class="control-label mb-10">Photo </label>
							<input type="file"  name="filee" class="form-control">
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
						$relation=$_POST['relation'];
						$gender=$_POST['gender'];
						$date=$_POST['date6'];
	if($_FILES["filee"]["error"] == 0)
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
                    $fileDestination = 'assets/img/dependent/'.$fileNewName;
                    move_uploaded_file($filetmpNamee, $fileDestination);
					
					$insert = " UPDATE `dependent` SET `name`='$name',`relation`='$relation',`gender`='$gender',`image`='$fileDestination',`date`='$date' WHERE `idd`='$iduser'";
                   
					$insert_sql =mysqli_query($conn,$insert);
					
                                ?><meta http-equiv="Refresh" content="0; dependent.php"><?php

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
        $insert = " UPDATE `dependent` SET `name`='$name',`relation`='$relation',`gender`='$gender',`date`='$date' WHERE `idd`='$iduser'";
        $insert_sql =mysqli_query($conn,$insert);
        echo '<div class="alert alert-success" role="alert" >
        Your dependent have been successfully registered !!
        </div>';
		?><meta http-equiv="Refresh" content="0; dependent.php"><?php
		
	}

					}

					
					
					
					?>
				</form>

        </div>
        </div>
    </div>
</div>
	<!-- /Edit Dependent Modal-->

	<!-- jQuery -->
	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	
    $(document).ready(function() {
        $('#example').DataTable({});
    } );
	config ={
			
			maxDate: "today",
			rules: { dateyearlevel: {required: true} },
            messages: { dateyearlevel: {required: "The date is required"} }
		
				}
	flatpickr("#date3", config);
	confiig ={
			
			maxDate: "today",
			rules: { dateyearlevel: {required: true} },
            messages: { dateyearlevel: {required: "The date is required"} }
		
				}
	flatpickr("#date6", confiig);
	//required 
	$('#date6').on('focus', ({ currentTarget }) => $(currentTarget).blur())
    $("#date6").prop('readonly', false)
	$('#date3').on('focus', ({ currentTarget }) => $(currentTarget).blur())
    $("#date3").prop('readonly', false)
	
 </script> 

<script type='text/javascript'>
      $(document).ready(function(){
          $('#edit').click(function(){
              
              
                      $('.modal-content').html(response); 
                      $('#editarUsuario').modal('show'); 
					  
			           

                 
              
          });
      });
     </script>
	 <script>
$(document).on('click','.fa-edit',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var relation =$(this).attr("data-relation");
		var date=$(this).attr("data-date");
		
		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#relation_u').val(relation);
		$('#date6').val(date);
		
	});
	$(document).on('click','.fedit',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var relation =$(this).attr("data-relation");
		var date=$(this).attr("data-date");
		
		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#relation_u').val(relation);
		$('#date6').val(date);
		
	});

	
	 </script>
	 
	  
		
</body>



</html>