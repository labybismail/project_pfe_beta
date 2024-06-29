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
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="assets/plugins/dropzone/dropzone.min.css">
		
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
									<li class="breadcrumb-item active" aria-current="page">Add Prescription</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Add Prescription</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
<?php
$iduser=$_GET['id'];
$idser=$_SESSION['id'];
$sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
$row = mysqli_fetch_assoc($sql);
$sqql = mysqli_query($conn,"select * from `users` where `IDusers`='$idser'");
$roow = mysqli_fetch_assoc($sqql);
$date=date('j F Y');
?>
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Widget -->
							<div class="card widget-profile pat-widget-profile">
								<div class="card-body">
									<div class="pro-widget-content">
										<div class="profile-info-widget">
											<a href="#" class="booking-doc-img">
												<img src="<?php echo $row["image"] ?>" alt="User Image">
											</a>
											<div class="profile-det-info">
												<h3><a href="patient-profile.html"><?php echo $row["name"]?> <?php echo $row["surname"] ?></a></h3>
												<div class="patient-details">
													
													<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
												</div>
											</div>
										</div>
									</div>
									<div class="patient-info">
                                        <ul>
											<li>Phone <span><?php echo $row["phone"] ?></span></li>
											<li>Age <span>38 Years, Male</span></li>
											<li>Blood Group <span>AB+</span></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Profile Widget -->
							
						</div>

						<form id="server" class="col-md-7 col-lg-8 col-xl-9" >
        <div class="col-md-7 col-lg-8 col-xl-9" id="content">
            <div class="card" id="invoice">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add Prescription</h4>
                </div>
                <div class="card-body">
                    <div class="row headerr" id="headerr" style="max-width:934px;max-height:175px;">
                        <div class="col-sm-6">
                            <div class="biller-info">
                                <h4 class="d-block">Dr. <?php echo $roow["name"]?> <?php echo $roow["surname"] ?></h4>
                                <span class="d-block text-sm text-muted">Dentist</span>
                                <span class="d-block text-sm text-muted">Newyork, United States</span>
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <div class="billing-info">
                                <h4 class="d-block"><?php echo $date?></h4>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Education -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Prescription</h4>
                            <div class="prescription-info elementData"></div>
                            <div class="add-more">
                                <a href="javascript:void(0);" onclick="return addMoreRow(this)" class="add-prescription"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Education -->
                    <!-- Signature -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="signature-wrap">
                                <div class="signature" id="signature">
                                    <div class="sign-name">
                                        <p class="mb-0">( Dr. <?php echo $roow["name"]?> <?php echo $roow["surname"] ?> )</p>
                                        <span class="text-muted">Signature</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Signature -->
                    <!-- Submit Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="msg"></div>
                            <div class="submit-section">
                                <button onclick="return saveForm(this)" type="button" class="btn btn-primary submit-btn save">Save</button>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload header</span>
                                        <input type="file" name="header" class="upload" id="imgInpp">
                                        <input type="hidden" name="iddoc" value="<?php echo $_SESSION['id'] ?>" id="iddoc">
                                        <input type="hidden" name="idus" value="<?php echo $_GET['id'] ?>" id="idus">
                                    </div>
                                    <span class="text-muted" style=" margin-bottom: 20px;   display: block;  text-align: center;"> 934px/85px</span>
                                </div>
                                <div class="upload-img">
                                    <div class="upload-img" style=" margin-top: 10px;">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Signature</span>
                                            <input type="file" name="signature" class="upload" id="imgInp">
                                        </div>
                                    </div>
                                    <span class="text-muted" style=" margin-bottom: 20px;   display: block;  text-align: center;"> 216px/81px</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Submit Section -->
                </div>
            </div>
        </div>
    </form>
							
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
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Dropzone JS -->
		<script src="assets/plugins/dropzone/dropzone.min.js"></script>
		
		<!-- Bootstrap Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		
		
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	
   
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

    function newRow(id) {

        let btnDelete = `<div class="col-12 col-md-2 col-lg-1">
                                <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="javascript:void(0)" onclick="return deleteRow(this)" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                            </div>`
        var content = `
            <div class="row form-row prescription-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" autocomplete="off" class="form-control" name="name" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="number" autocomplete="off" class="form-control" name="qty" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Days</label>
                                                    <input type="number" autocomplete="off" class="form-control" name="days" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label>Time</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te">
                                                            <input class="form-check-input" name="time[` +id+ `]" value="Morning" id="checkbox" value="Morning" type="checkbox" checked> Morning </input>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te1">
                                                            <input class="form-check-input" name="time[` +id+ `]" value="Afternoon" id="checkbox1" value="Afternoon" type="checkbox"> Afternoon </input>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te2">
                                                            <input class="form-check-input" name="time[` +id+ `]" value="Evening" id="checkbox2" value="Evening" type="checkbox"> Evening </input>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te3">
                                                            <input class="form-check-input" name="time[` +id+ `]" value="Night" id="checkbox3" value="Night" type="checkbox"> Night </input>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ` + ((id === 0) ? '' : btnDelete) + `
                                </div>
            `;
        return content
    }

    let baseElement = $('.elementData');
    let subElemengt = baseElement.find('.prescription-cont');
    baseElement.html(newRow(subElemengt.length));

    function deleteRow(elm) {
        $(elm).parents('.prescription-cont').remove();
    }

    function addMoreRow(elm) {
        baseElement = $('.elementData');
        subElemengt = baseElement.find('.prescription-cont');
        baseElement.append(newRow(subElemengt.length));
    }

    function saveForm(elm) {
        let form = $('#server');
        let formValue = form.serializeObject();
        console.log(formValue);

        var datapos = new FormData(); // Currently empty

        datapos.append('formData', JSON.stringify(formValue));
        
        if ($('input[name=header]')[0].files.length) {
            datapos.append('header', $('input[name=header]')[0].files[0]);
            datapos.append('header_default', "NO");
        } else {
            datapos.append('header_default', "YES");
        }

        if ($('input[name=signature]')[0].files.length) {
            datapos.append('signature', $('input[name=signature]')[0].files[0]);
            datapos.append('signature_default', "NO");
        } else {
            datapos.append('signature_default', "YES");
        }
        datapos.append('iddoc',$('#iddoc').val() );
        datapos.append('idus',$('#idus').val() );
        $.ajax({
            url: "generate.php",
            type: "POST",
            data: datapos,
            dataType: "JSON",
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            success: function(res) {
                console.log("success");
            }
        });
        $('#msg').replaceWith("<div class='alert alert-success' role='alert' >You have been successfully added the prescription !!</div>");
        window.setTimeout(function(){
            window.location.href = "patient-profile.php?id=<?php echo $_GET['id']?>";
                                    }, 2000);

    }

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {

            $('#signature').replaceWith("<img class='signature' id='blah' src='#' alt='your image' />");
            blah.src = URL.createObjectURL(file)
        }
    }

    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img style="max-width:934px;max-height:175px;width:100%;height:100%">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#imgInpp').on('change', function() {
            $(".headerr").empty();
            imagesPreview(this, 'div.headerr');
        });
    });
    </script>
</body>

</html>