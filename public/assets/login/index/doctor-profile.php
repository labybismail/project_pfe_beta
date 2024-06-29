<?php  

include_once("config.php");
session_start();
?>

<!DOCTYPE html> 
<html lang="en">
<?php
// Turn off all error reporting
error_reporting(0);
?>

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
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/redmond/jquery-ui.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
		 <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		<?php
		if(!empty($_SESSION['lang']))
		{
		$lang =	$_SESSION['lang'];
            setcookie('googtrans', '/fr/'.$lang);
		}
        ?> 
		
			 <!-- Header -->
			 <?php
			 $u6=$_GET['id'];
			 $ql6 = mysqli_query($conn,"select * from `users` where `IDusers`='$u6' and `usertype`='doctor'");
                           
			 if(!isset($_GET['id']) or mysqli_num_rows($ql6)==0)
			 {
				session_destroy();
				header("location: ..\login-23.php");
			} 
			elseif ($_SESSION['usertype']=='user')
           {
              include_once("headerU.php"); 
           } 
           
           elseif ($_SESSION['usertype']=='admin')
           {
              include_once("headerA.php"); 
           } 
		   elseif (!isset($_SESSION) or $_SESSION['usertype']=='doctor' or $_SESSION['usertype']=='' )
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
									<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			              <?php
                           $iduser=$_GET['id'];
                           $sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
                           $rw = mysqli_fetch_assoc($sql);
						   if($rw['block']==1 and $_SESSION['usertype']!='admin')
						   {
							 include_once("docprofblock.php"); 
						   }
						   elseif($rw['block']==0 or $_SESSION['usertype']=='admin')
						   {
							 include_once("docprof.php"); 
						   }
                           
                           ?>
			<!-- Page Content -->

			<!-- /Page Content -->
   
			<!-- Footer -->
		<footer class="footer">
			<!-- Footer Top -->
			<?php  include_once("footer.php"); ?>
		<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="assets/img/doctors/doctor-thumb-02.jpg" class="call-avatar">
										<h4>Dr. Darren Elder</h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="voice-call.html" class="btn call-item call-start"><i class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										<h4>Dr. Darren Elder</h4>
										<span>Calling ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<span class="notranslate">	<a href="video-call.html" class="btn call-item call-start"><i class="material-icons">videocam</i></a></span>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
		<!-- Delete Modal -->
		<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					 <!--<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
					 <form action="" method="POST"  > 
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<input type="hidden" id="idinput_dl" name="idcom" >
								<input type="hidden" id="idinput_doc" name="iddoc" >
								<input type="hidden" id="idinput_user" name="idus" >
								<button type="submit" class="btn btn-primary "  name ="delete_cmt_btn" >Confirm </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					 </form>	<?php
								//delete button
							    if(isset($_POST["delete_cmt_btn"])){	
								$idus = $_SESSION['id'];
								$idcom = $_POST['idcom'];
								$iddoc1 = $_POST['iddoc'];
								$idus1 = $_POST['idus'];
								//delete cmt
								$dlquy = mysqli_query($conn, "DELETE FROM `comments` WHERE `id`='$idcom' ");
								//delete star
								 $stars_dl_sl = mysqli_query($conn, "DELETE FROM rating_stars WHERE  `id_Doc_rating`='$iddoc1' and `iduser_rating`='$idus1'  " );
								//delete like 
								$like_dl_sl = " DELETE FROM recomandation_info WHERE `cmt_id`='$idcom' and (rec_action = 'like' or rec_action = 'dislike') " ;
								$like_dl_rq = mysqli_query($conn ,$like_dl_sl);
								?><meta http-equiv="Refresh" content="0; url=doctor-profile.php?id=<?php echo $idDoc?>"><?php
	
								}
								 ?>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
	
		<!-- jQuery -->
		<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Daterangepikcer JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	<script>
		config ={
			
    minDate: "today",
	"disable": [
        function(date) {
            // return true to disable
            return (date.getDay() === 0 || date.getDay() === 6);

        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // start week on Monday
    }

		}
		flatpickr("#date3", config);
		$('#date3').on('focus', ({ currentTarget }) => $(currentTarget).blur())
    $("#date3").prop('readonly', false)

		conf={
			
    enableTime: true,
    minTime: "09:00",
    maxTime: "18:00",
	noCalendar: true,
	minuteIncrement : 30 ,
	disableMobile: "true",
	
	
		}
		flatpickr("#time1", conf);
		$('#time1').on('focus', ({ currentTarget }) => $(currentTarget).blur())
    $("#time1").prop('readonly', false)
		
	</script>

	<script>

//   REcomandation system
$(document).ready(function(){

// if the user clicks on the like button ...
$('.fav').on('click', function(){
  var post_idus = $(this).attr("data-idus");
  var data_iddoc = $(this).attr("data-iddoc");
//   alert(post_id); we bring the exact id where the btn clicked     
  $clicked_btn = $(this);

  if ($clicked_btn.hasClass('btn-white')) {
	   actio = 'like';  
	   $clicked_btn.removeClass('btn-white'); //off
	   $clicked_btn.addClass('favo-btn');//on
	   $(".fav").hover(function(){
  $(this).css("color", "white");
  },function(){
  $(this).css("color", "white");
});
  } else if($clicked_btn.hasClass('favo-btn')){
	   actio = 'unlike';
	   $clicked_btn.removeClass('favo-btn');//on 
	   $clicked_btn.addClass('btn-white');//off
	 $(".fav").hover(function(){
  $(this).css("color", "white");
  },function(){
  $(this).css("color", "black");
});
  }
  
  
  $.ajax({
	  url: 'doctor-profile.php?id='+data_iddoc,
	  type: 'post',
	  data: {
		  'actio': actio,
		  'post_idus': post_idus,//id cmt
		  'data_iddoc':data_iddoc,//id users
	  },
	  
  });       

});
});

	</script>
<?php
	 if(isset($_POST['actio']))
     {  $iddoc1=$_POST['data_iddoc'];
		$idus1=$_POST['post_idus'];
		$action=$_POST['actio'];

		$result = mysqli_query($conn,"SELECT * FROM favourites where `iddoc` = '$iddoc1' and `idus` = '$idus1'");
		if(mysqli_num_rows($result)==0 and $action=='like' )
		{
			$sqql = "INSERT INTO `favourites`( `idus`, `iddoc` ) VALUES ('$idus1','$iddoc1')";
			$result2 = mysqli_query($conn, $sqql);
		}
		elseif(mysqli_num_rows($result)!=0 and $action=='unlike')
		{
			$sqql = "DELETE FROM `favourites` WHERE  `idus`='$idus1'and`iddoc`='$iddoc1'";
			$result2 = mysqli_query($conn, $sqql); 
		}
		
		
	 }
	
	
	
	?>
	<!-- translate save language -->
<script>


$(document).ready(function(){

	$("body").on("change", "#google_translate_element select", function (e) {
		var post_lang = $("#google_translate_element select").val();
  
  console.log(post_lang);

$.ajax({
	type: "post",
	url: "favourites.php",
	data: {
		  'post_lang': post_lang,
	  },
	
	success: function (response) {
	}
});

});


});

</script>
<?php 
//set default language user not yet selected their language
if(empty($_SESSION['lang'])){ $_SESSION['lang'] = "fr";}
if(isset($_POST['post_lang']))
{
	$_SESSION['lang'] = $_POST['post_lang'];
}
?>
<!-- translate save language -->
		
	</body>
<!-- bootstrap CDN -->
<!-- for sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- like dislike links -->
<!-- JQuery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</html>