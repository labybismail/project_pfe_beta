<?php 
include_once("config.php");
session_start();
?>

<?php  
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);
//fetch all comment
//return them as an Assiciative array
$posts = mysqli_fetch_array($result );

// if user has click the like or dislike button
if (isset($_POST['action'])) {
    $post_id = $_POST['post_id']; //comments id
    $Dr_id = $_POST['Dr_id'];
    $action = $_POST['action'];
    $user_id = $_POST['data_iduss'];

    
    echo ($action);
    switch ($action){
        case 'like':
           $sql="INSERT INTO recomandation_info (user_id,  cmt_id, Dr_id, rec_action) 
                  VALUES ($user_id, $post_id, $Dr_id, 'like') 
                  ON DUPLICATE KEY UPDATE rec_action='like'";
           break;
        case 'dislike':
            $sql="INSERT INTO recomandation_info  (user_id, cmt_id, Dr_id, rec_action) 
                 VALUES ($user_id, $post_id, $Dr_id,'dislike') 
                  ON DUPLICATE KEY UPDATE rec_action='dislike'";
           break;
        case 'unlike':
            $sql="DELETE FROM recomandation_info WHERE user_id=$user_id AND cmt_id=$post_id" ;
            break;

        case 'undislike':
              $sql="DELETE FROM recomandation_info WHERE user_id=$user_id AND cmt_id=$post_id";
        break;
        default:
            break;
    }
      // execute query to effect changes in the database ...
        mysqli_query($conn, $sql);
        echo getRating($post_id);
         exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM recomandation_info 
  		  WHERE cmt_id = $id AND rec_action	='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM recomandation_info 
  		  WHERE cmt_id = $id AND rec_action ='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];    
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $conn;
  $rating = array();

  $likes_query = "SELECT COUNT(*) as likes FROM recomandation_info WHERE id_rec_info = $id AND rec_action='like'";
  $dislikes_query = "SELECT COUNT(*) as dislikes  FROM recomandation_info 
		  			WHERE id_rec_info = $id AND rec_action = 'dislike'";

  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes['likes'],
  	'dislikes' => $dislikes['dislikes']
  ];
  return json_encode($rating);

}

// Check if user already likes post or not
function userLiked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM recomandation_info WHERE user_id=$user_id 
  		  AND cmt_id = $post_id AND rec_action = 'like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return FALSE;
  }else{
  	return  TRUE;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM recomandation_info WHERE user_id=$user_id 
  		  AND cmt_id=$post_id AND rec_action='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}



							
									  
              if(isset($_POST['date']))
              {
    if (empty ($_POST['date']) or empty($_POST['time'])){
      echo'<div class = "alert alert-danger"  role = "alert "> please enter the date and time of the appointment</div>  ';	
  }
    else
    {	            $iduser=$_POST['id_doc_input'];
                  $date =$_POST['date'];
                  $time =$_POST['time'];
                  $idus=$_SESSION['id'];
    
                $sql_email=mysqli_query($conn, "select * from `appointment` where `date`='$date' and `time`='$time' and `idus`= '$idus' and `iddoc`='$iduser' ");
                  if(mysqli_num_rows($sql_email) != 0)
                {
                  echo'<div class="alert alert-danger" role="alert">
                  Appointment already exists
                  </div>';
                }
                elseif(mysqli_num_rows($sql_email) == 0)
                {
      $dateM=date('j F Y');
                  $insert = "insert into `appointment` (`iddoc`,`idus`,`date`,`time`,`dateM`) values('$iduser','$idus','$date','$time','$dateM')";
                  $insert_sql = mysqli_query($conn,$insert);
   
                                echo ('<div class="alert alert-success" role="alert" >
                                Your Appointment have been successfully registered !!
                                   </div>');
                }
                }
              }

              ?>