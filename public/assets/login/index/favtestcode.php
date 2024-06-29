                                        <?php
                                              
                                        	  $idus=$_SESSION['id'];
                                        	  $result = mysqli_query($conn,"SELECT * FROM favourites where iddoc = '$iduser' and idus = '$idus'");
                                        	  if(mysqli_num_rows($result)!=0)
                                        	  {
                                        		?><a href="javascript:void(0)" class="btn btn-white fav-btn" style="background-color: #fb1612; border-color: #fb1612;color: #fff;">
                                        		<i class="far fa-bookmark"></i>
                                        	</a><?php
                                        	  }
                                        	  elseif(mysqli_num_rows($result)==0)
                                        	  {
                                        		$row = mysqli_fetch_array($result)
                                        		?><a href="doctor-profile.php?idU=<?php echo  $iduser ?>" name='fav' class="btn btn-white fav-btn" >
                                        		<i class="far fa-bookmark"></i>
                                        	</a><?php
                                        	  }
                                        	  if(isset($_GET["idU"]))
                                        {
                                        	$iddocc=$_GET["idU"];
                                          $sqql = "INSERT INTO `favourites`( `idus`, `iddoc`) VALUES ('$idus','$iddocc')";
                                          $result = mysqli_query($conn, $sqql); 
                                          ?><meta http-equiv="Refresh" content="0; url=doctor-profile.php?id=<?php echo  $iddocc ?>"><?php
                                        }
                                        ?>  
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
	   action = 'like';  
  } else if($clicked_btn.hasClass('favo-btn')){
	   action = 'unlike';
  }
  
  $.ajax({
	  url: 'docprof.php',
	  type: 'post',
	  data: {
		  'action': action,
		  'post_idus': post_idus,//id cmt
		  'data_iddoc':data_iddoc,//id users
	  },
	  success: function(data){
		  res = JSON.parse(data);
		  if (action == "like") {
			  $clicked_btn.removeClass('btn-white'); //off
			  $clicked_btn.addClass(' favo-btn');//on
		  } else if(action == "unlike") {
			  $clicked_btn.removeClass('favo-btn');//on 
			  $clicked_btn.addClass('btn-white');//off
		  } 

		  
		  
	  }
  });       

});
});

	</script>
	<?php
	 if(isset($_POST['action']))
     {  $iddoc1=$_POST['data_iddoc'];
		$idus1=$_POST['post_idus'];
		$action=$_POST['action'];

		$result = mysqli_query($conn,"SELECT * FROM favourites where iddoc = '$iddoc1' and idus = '$idus1'");
		if(mysqli_num_rows($result)!=0 and $_POST['action']=='like')
		{
			$sqql = "UPDATE `favourites` SET `codef`='$action' WHERE `idus`='$idus'and`iddoc`='$iddocc'";
			$result2 = mysqli_query($conn, $sqql); 
		}
		elseif(mysqli_num_rows($result)!=0 and $_POST['action']=='unlike')
		{
			$sqql = "UPDATE `favourites` SET `codef`='$action' WHERE `idus`='$idus'and`iddoc`='$iddocc'";
			$result2 = mysqli_query($conn, $sqql); 
		}
		elseif(mysqli_num_rows($result)==0 )
		{
			$sqql = "INSERT INTO `favourites`( `idus`, `iddoc` ,`codef`) VALUES ('$idus','$iddocc','$action')";
			$result2 = mysqli_query($conn, $sqql); 
		}

	 }
	
	
	
	?>