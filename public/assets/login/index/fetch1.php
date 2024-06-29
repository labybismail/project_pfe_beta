<?php 
	include_once("config.php");
    session_start();	

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
            $messa = $_POST['msg'];
            $sqql = "UPDATE `appointment` SET `code`='2', `message`='$messa' WHERE idapp = '" . $id . "'";
            $result = mysqli_query($conn, $sqql);
            echo json_encode(array("success"=>true));
            return true;
     } 
     echo json_encode(array("success"=>false));
     return false;