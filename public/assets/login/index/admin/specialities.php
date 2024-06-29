
<?php
include_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Specialities Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
		
			
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
							<li class="active" > 
								<a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
							</li>
							<li> 
								<a href="doctor-list.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
							</li>
							<li> 
								<a href="patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li > 
								<a href="reviews.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="transactions-list.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="settings.php"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							

							<li> 
								<a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
							
								</ul>
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
                            <h3 class="page-title">Specialities</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Specialities</li>
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
                                    <table class=" table table-hover table-center mb-0" id="example">
                                        <thead>
                                            <tr>
                                                <th>Specialities</th>
                                                <th>NO Doctor </th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											
                                            $sqql = "SELECT * FROM specialities  ";
                                            $result = mysqli_query($conn, $sqql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $idcount=$row["idspec"];
                                               $count = mysqli_query($conn, "SELECT COUNT(*) as `countS` FROM `users` WHERE `specialities`= '$idcount' ");
                                               $row1 = mysqli_fetch_array($count);
                                        ?>

                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2">
                                                            <img class="avatar-img" src="../<?php echo $row["image"] ?>" alt="Speciality">
                                                        </a>
                                                        <a href="profile.html"><?php echo $row["name"] ?></a>
                                                    </h2>
                                                </td>
                                                <td>
                                                <?php echo $row1["countS"] ?>
                                                </td>

                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-success-light edit" data-toggle="modal"  data-id="<?php echo $row["idspec"] ?>"  data-name= "<?php echo $row["name"] ?>"  href="#edit_specialities_details">
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a>
                                                        <a data-toggle="modal"  data-id="<?php echo $row["idspec"] ?>"   href="#delete_modal" class="btn btn-sm bg-danger-light delete">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            <tbody>
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
                        <h5 class="modal-title">Add Specialities</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                    </div>
                    <div class="modal-body">
                         <form  id="addspecialities"> 
                        
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Specialities</label>
                                        <input type="text" name="addspecialistename"  id="addspecialistename" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" id ="addfile"  class="form-control">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /ADD Modal -->

        <!-- Edit Details Modal -->
        <div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Specialities</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                    </div>
                    <div class="modal-body">
                        <form id ="editspecialities">
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Specialities</label>
                                        <input type="text" name="specialistename"  id="specialistename" class="form-control" required>
                                        <input type="hidden" name="specialisteid" id="specialisteid" class="form-control" >

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" id ="file"class="form-control">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" id ="but_upload" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                   
                    <div class="modal-body">
                    <form id ="deletespecialities">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="specialisteidd" class="form-control" >

                            <button type="button" id="deletebtn" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script type='text/javascript'>
        $(document).ready(function() {
			$('#example').DataTable({});
		});

          $('.edit').click(function(){
            $('#specialisteid').val($(this).attr("data-id")); 
            $('#specialistename').val($(this).attr("data-name")); 
		 });


      $('.delete').click(function(){
            $('#specialisteidd').val($(this).attr("data-id")); 
		 });


$("#deletebtn").click(function (e) { 
    e.preventDefault();
    var specialisteid = $('#specialisteidd').val(); 



    $.ajax({
          url: 'upload.php',
          type: 'post',
          data:{
            delete:specialisteid
					}, 
        success: function (response) {
            if(response==1)
             {
                window.setTimeout(function(){
window.location.href = "specialities.php";
}, 1000);
             }
        }
    });
});





$("#editspecialities").submit(function(e){
    e.preventDefault();

    var fd = new FormData();
    var files = $('#file')[0].files;
    var name = $('#specialistename').val(); 
    var specialisteid = $('#specialisteid').val(); 

   
    // Check file selected or not
       fd.append('file',files[0]);
       fd.append('name',name);
       fd.append('specialisteid',specialisteid);


       $.ajax({
          url: 'upload.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
             if(response==1)
             {
                swal({
  title: "Item Updated Successfully  ",
  icon: "success",
});
window.setTimeout(function(){
window.location.href = "specialities.php";
}, 1000);
             }
             else{
                swal({
  title: response ,
  icon: "error",
});
             }
          },
       });
    
});





$("#addspecialities").submit(function(e){
    e.preventDefault();

    var fd = new FormData();
    var files = $('#addfile')[0].files;
    var name = $('#addspecialistename').val(); 

   
    // Check file selected or not
       fd.append('addfile',files[0]);
       fd.append('addname',name);

       if(files.length > 0 ){
       $.ajax({
          url: 'upload.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
             if(response==1)
             {
               
                swal({
  title: "Item Added  Successfully  ",
  icon: "success",
});
window.setTimeout(function(){
window.location.href = "specialities.php";
}, 1000);
             }
             else{
                swal({
  title: response ,
  icon: "error",
});
             }
          },
       });
    }
    else{
        swal({
  title: "Please select  Icone ." ,
  icon: "error",
});
           
        }
    
});




     
     </script>


</body>


</html>