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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">


		
		
	
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
        <style>
			#example_filter {
				margin-right: 10px;
				margin-top: 20px;
			}

			#example_length {
				margin-left: 10px;
				margin-top: 20px;
			}

			#example_info {
				margin-bottom: 20px;
				margin-left: 10px;
			}

			#example_paginate {
				margin-right: 10px;
			}
			#example1_filter {
				margin-right: 10px;
				margin-top: 20px;
			}

			#example1_length {
				margin-left: 10px;
				margin-top: 20px;
			}

			#example1_info {
				margin-bottom: 20px;
				margin-left: 10px;
			}

			#example1_paginate {
				margin-right: 10px;
			}
			#example2_filter {
				margin-right: 10px;
				margin-top: 20px;
			}

			#example2_length {
				margin-left: 10px;
				margin-top: 20px;
			}

			#example2_info {
				margin-bottom: 20px;
				margin-left: 10px;
			}

			#example2_paginate {
				margin-right: 10px;
			}

			#pat_appointments {
				margin-top: 10px;
			}
		</style>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"> Patient Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Patient Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<?php
                           $iduser=$_GET['id'];
                           $sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
                           $rw = mysqli_fetch_assoc($sql);
						   if($rw['block']==1 and $_SESSION['usertype']!='admin')
						   {
							 include_once("patientblock.php"); 
						   }
						   elseif($rw['block']==0 or $_SESSION['usertype']=='admin')
						   {
							 include_once("patient.php"); 
						   }
                           
                           ?>
			<!-- /Page Content -->
   
			<!-- Footer -->
		<footer class="footer">
			<?php include_once("footer.php"); ?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		<!-- Delete Modal --> 
		<form  method="POST" >
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
           
				<div class="modal-dialog modal-dialog-centered" role="document" >
                
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
                                <input type= "hidden" name="test" id="test" >
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="submit" class="btn btn-primary" name="submit">delete </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
               
      
			</div>
        </form >
        <?php 
	  if(isset($_POST['submit'])){
		$iduss=$_POST['test'];								
		$qrd1 = mysqli_query($conn, "Select * FROM `prescriptions` WHERE  `idP`= '$iduss' ");
		$delete=mysqli_fetch_assoc($qrd1);
		unlink($delete['file']);
		$trSQL = "DELETE FROM `prescriptions` WHERE  `idP`= '$iduss' " ;
		$qrd = mysqli_query($conn, $trSQL);
		

		?><meta http-equiv="Refresh" content="0; url=patient-profile.php?id=<?php echo $_GET['id']?>"><?php
	  }
	  ?>
			<!-- /Delete Modal -->
			<!-- Delete Modal medical record --> 
		<form  method="POST" >
			<div class="modal fade" id="delete_modal_medical" aria-hidden="true" role="dialog">
           
				<div class="modal-dialog modal-dialog-centered" role="document" >
                
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
                                <input type= "hidden" name="test1" id="test1" >
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="submit" class="btn btn-primary" name="submit">delete </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
               
      
			</div>
        </form >
        <?php 
	  if(isset($_POST['submit'])){
		$idss=$_POST['test1'];		
		$qrd1 = mysqli_query($conn, "Select * FROM `medicalr` WHERE  `idM`= '$idss' ");
		$delete=mysqli_fetch_assoc($qrd1);	
		unlink($delete['file']);
		$trSQL = "DELETE FROM `medicalr` WHERE  `idM`= '$idss' " ;
		$qrd = mysqli_query($conn, $trSQL);
		?><meta http-equiv="Refresh" content="0; url=patient-profile.php?id=<?php echo $_GET['id']?>"><?php
	  }
	  ?>
			<!-- Delete Modal medical record --> 

		
		<!-- Add Medical Records Modal -->
		<div class="modal fade custom-modal" id="add_medical_records">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Medical Records</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="POST" action="" enctype="multipart/form-data" >					
						<div class="modal-body">
							<div class="form-group">
								<label>symptoms</label>
								<input type="text" class="form-control" name="symptoms" >
							</div>
							<div class="form-group">
								<label>Description ( Optional )</label>
								<textarea class="form-control" name="description" ></textarea>
							</div>
							<div class="form-group">
								<label>Upload File</label> 
								<input type="file" name="file" class="form-control" required>
							</div>	
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn" name ="nam">Submit</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Cancel</button>							
							</div>
						</div>
					</form>
						<!-- add files -->
		<?php
					if(isset($_POST['nam']))
					{
						 $symptoms = $_POST['symptoms'];
						 $description = $_POST['description'];
                         $idus = $_GET['id'];
                         $iddoc = $_SESSION['id'];
                         
                         
						 $nowD = date('j F Y'); 
						  
                        //  $dateM = $_POST['tratment_date'];

						if($_FILES["file"]["error"] == 0)
	                    {
							//  added from frofile siting
							 $user_fileM = $_FILES['file'];							
							 $fileName = $_FILES['file']['name'];
							 $filetmpName = $_FILES['file']['tmp_name'];
							 $fileError = $_FILES['file']['error'];
							 $filetype = $_FILES['file']['type'];
							
							 //to store only the Extention in our variable
							 //and put the extention in lower case
							 $fileExt = explode('.', $fileName);
							 $fileActualExt = strtolower(end($fileExt));
							
							 $allowed = array('pdf');
							
								if(in_array($fileActualExt, $allowed)){
									if($fileError === 0){
										
										if($fileSize < 1000000){
											 $fileNewName = uniqid('',false).".".$fileActualExt;
											 //var to stor new upload space
											 $fileDestination = 'assets/Medicalr/'.$fileNewName;
											 move_uploaded_file($filetmpName, $fileDestination);

												// add to database
												
                        	                    				
    	                	                        $sql = "INSERT INTO `medicalr`(`idu`, `iddoc`, `date`, `name`, `description`, `file`, `symptoms`) VALUES ('$idus','$iddoc','$nowD','Medical Record','$description','$fileDestination','$symptoms')";
                        	                         mysqli_query($conn, $sql);
													 ?><meta http-equiv="Refresh" content="0; url=patient-profile.php?id=<?php echo $idus?>"><?php
					    	                    											 
										}else {echo "size much bigger"; }
									}else {echo "file Error"; }
								}else { echo'<div class="alert alert-danger" role="alert">
									an Error in type fill!
							</div>'; }
							
                        	 
						    }else {echo "Error2"; }
						
																	   
					    }
						
						
    	            	?>
	
	    <!-- /add files-->
					
				</div>
			</div>
		</div>
		
		<!-- /Add Medical Records Modal -->
		<!-- Add Medical certificate Modal -->
		<form action=""  id="server" role="form" onsubmit="return false">
		<div class="modal fade custom-modal" id="add_certificat_medical">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title ">medical certificate</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
										
						<div class="modal-body">
						   <div class="form-group">
								<label >Type of Certificate</label>
								<select class="form-control Medical"  aria-hidden="true" name="type" id="type">
									<option value= "medicalcertificate" >medical certificate</option>
									<option value= "certificate" >certificate of fitness</option>
								</select>
							</div>
						 <div id="certificate">
							<div class="form-group">
								<label>Number of days initial </label>
								<input required type="number" min="1" class="form-control" name="nbrday" autocomplete="off" >
								<input type="hidden" name="iddoc" value="<?php echo $_SESSION['id'] ?>" id="iddoc">
                                <input type="hidden" name="idus" value="<?php echo $_GET['id'] ?>" id="idus">
							</div>
							<div class="form-group col-12 col-md-6" style="display: -webkit-inline-box;">
								<label>Du</label>
								<input  class="form-control " type="date"  name="date3"  id="date3"   required >
								<label>Au</label>
								<input class="form-control " type="date"  name="date4"  id="date4"   required >
                           </div>
							<div class="form-group">
								<label>Number of days extension</label>
								<input  type="number" class="form-control" id="nbrdayP" name="nbrdayP" min="1" autocomplete="off" >
							</div>
							<div class="form-group col-12 col-md-6" style="display: -webkit-inline-box;">
								<label>Du</label>
								<input  class="form-control " type="date"  name="date5"  id="date5"   required >
								<label>Au</label>
								<input class="form-control " type="date"  name="date6"  id="date6"   required >
                           </div>
						   <div class="form-group">
								<label>return to work date</label>
								<input class="form-control " type="date"  name="date7"  id="date7"   required >
							</div>
							<div class="form-group">
								<label>hospital name</label>
								<input  type="text" class="form-control" name="transport" autocomplete="off" >
							</div>
							<div class="form-group">
								<label>reason</label>
								<textarea required class="form-control" name="description" ></textarea>
							</div>
							
							
						 </div>
						
						 <div id="certificateA" style="display: none;">
						 <div class="form-group col-12 col-md-6" >
								<label>examined this day</label><br>
								<input  class="form-control " type="date"  name="date8"  id="date8" value="<?php echo date("Y-n-d")?>"  required >
								
                           </div>
						   </div>
						   <div class="submit-section text-center">
                                <button   type="submit" class="btn btn-primary submit-btn save">Save</button>
								<button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Cancel</button>							
							</div>
						</div>
					
						
					
				</div>
			</div>
		</div>
		</form>
		
		<!-- /Add Medical certificate Modal -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
		
		<script>

			var date1 = $("#date3").flatpickr({ 
				minDate: "today",
				"locale": {
				"firstDayOfWeek": 1 // start week on Monday
			},
  onChange: function(selectedDates, dateStr, instance) {
    date4.set('minDate', dateStr)
  }
});

	        var date4 = $("#date4").flatpickr({
				"locale": {
				"firstDayOfWeek": 1 // start week on Monday
			},
  onChange: function(selectedDates, dateStr, instance) {
    date5.set('minDate', dateStr)
  }
});
var date5 = $("#date5").flatpickr({ 
				minDate: "today",
				"locale": {
				"firstDayOfWeek": 1 // start week on Monday
			},
  onChange: function(selectedDates, dateStr, instance) {
    date6.set('minDate', dateStr)
  }
});

	        var date6 = $("#date6").flatpickr({
				minDate: "today",
				"locale": {
				"firstDayOfWeek": 1 // start week on Monday
			},
  onChange: function(selectedDates, dateStr, instance) {
    date7.set('minDate', dateStr)
  }
});

var date7 = $("#date7").flatpickr({
				minDate: "today",
				"locale": {
				"firstDayOfWeek": 1 // start week on Monday
			}
});	
var date8 = $("#date8").flatpickr({
				minDate: "today",
				"locale": {
				"firstDayOfWeek": 1 // start week on Monday
			}
});	
	</script>
	    <script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({});
		});
		$(document).ready(function() {
			$('#example1').DataTable({});
		});
		$(document).ready(function() {
			$('#example2').DataTable({});
		});
		$(Document).on('click','.callbtmodel',function(e){
	var id= $(this).attr("data-idm");
	$('#test').val(id);

});
$(Document).on('click','.callbtmodel1',function(e){
	var id= $(this).attr("data-idM");
	$('#test1').val(id);

});
		
	</script>
	
	<script>

 $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

	$(document).ready(function() {
  $("#server").submit(function(e) {
        let form = $('#server');
        let formValue = form.serializeObject();
        console.log(formValue);

        var datapos = new FormData(); // Currently empty

        datapos.append('formData', JSON.stringify(formValue));
		datapos.append('iddoc',$('#iddoc').val() );
        datapos.append('idus',$('#idus').val() );
		// check type certificat
		var type = $('#type').val();
		if (type=="medicalcertificate") {
            datapos.append('type', "medicalcertificate");
        } else {
            datapos.append('type', "certificate");
        }
        // check type certificat
        $.ajax({
            url: "pdf1.php",
            type: "POST",
            data: datapos,
            dataType: "JSON",
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            success: function(res) {
                console.log("success");
            }
        });
    });
});
$(document).ready(function () {
            
                $(".flatpickr-calendar").addClass("notranslate");
           
        });



	
$(Document).on('click','.Medical',function(e){
	if($(this).val()=="certificate")
			{
				$("#certificate :input").prop('required',false);
				$("#certificateA").show();
				$("#certificate").hide();
			}
			else if($(this).val()=="medicalcertificate")
			{
				$("#certificate :input").prop('required',true);
				$("#nbrdayP").prop('required',false);
				$("#certificate").show();
				$("#certificateA").hide();
			}

});
</script>


<script>
$(document).on('change', '#care_sheet', function() {
var careval =$(this).val() ;
    if(careval!="")
	{
		            	$('#care_sheet_type_li').show() ;
	}
	else{
		$('#care_sheet_type_li').hide() ;
	}

});

$(document).on('change', '#care_sheet_type', function() {
var careval =$('#care_sheet').val() ;

var careval_type =$(this).val() ;
    if(careval_type!="")
	{
		
                    var idpat =$('#care_sheet').attr('data-id') ;
		
					window.open('care_sheet/'+careval+'/'+careval_type+'.php?idpat='+idpat, '_blank');
	}

});



</script>
	
	</body>

</html>