<?php
include_once("config.php");
session_start();






if(isset($_FILES["file"]["name"]))
	{
    $file = $_FILES['file'];

    $fileNamez = $_FILES['file']['name'];
    $filetmpNamee = $_FILES['file']['tmp_name'];
    $fileErrorr = $_FILES['file']['error'];
    $filetypee = $_FILES['file']['type'];
    $fileSize= $_FILES['file']['size'];
    $name=$_POST['name'];
    $specialisteid=$_POST['specialisteid'];
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
                    $fileDestination = "admin/assets/img/specialities/".$fileNewName;


                    $sqql = "SELECT * FROM specialities where `idspec`='$specialisteid' ";
                    $result = mysqli_query($conn, $sqql);
                    $row = mysqli_fetch_array($result);
	              	unlink("../".$row['image']);
                


                    move_uploaded_file($filetmpNamee, "../".$fileDestination);
					
	            	$insert = "UPDATE `specialities` SET `name`='$name',`image`='$fileDestination' WHERE `idspec`='$specialisteid'";
                   
					$insert_sql =mysqli_query($conn,$insert);
                    echo (json_encode(1));  
                    exit;
					
                }else {
					
           echo (json_encode("your file is too big! reduce the Size please!"));  
                    
                }
            
            }else{
				
           echo json_encode("an Error in uploading fill!");  
               
            }
        
        }else{
			
           echo json_encode("ERROR type!");  
                 
        }
	}
    elseif(isset($_POST['delete']))
    {
       $delete =$_POST['delete'];

       $sqql = "SELECT * FROM specialities where `idspec`='$delete' ";
                   $result = mysqli_query($conn, $sqql);
                   $row = mysqli_fetch_array($result);
                     unlink("../".$row['image']);
               


       $insert = "DELETE FROM `specialities`  WHERE `idspec`='$delete'";
       $insert_sql =mysqli_query($conn,$insert);
       echo (json_encode(1));  
       
    }
    elseif(isset($_FILES["addfile"]["name"]))
	{
    $file = $_FILES['addfile'];

    $fileNamez = $_FILES['addfile']['name'];
    $filetmpNamee = $_FILES['addfile']['tmp_name'];
    $fileErrorr = $_FILES['addfile']['error'];
    $filetypee = $_FILES['addfile']['type'];
    $fileSize= $_FILES['addfile']['size'];
    $addname=$_POST['addname'];
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
                    $fileDestination = "admin/assets/img/specialities/".$fileNewName;

                    move_uploaded_file($filetmpNamee, "../".$fileDestination);
					
	            	$insert = "INSERT INTO `specialities`( `name`, `image`) VALUES ('$addname','$fileDestination')";
                   
					$insert_sql =mysqli_query($conn,$insert);
                    echo (json_encode(1));  
                    exit;
					
                }else {
					
           echo (json_encode("your file is too big! reduce the Size please!"));  
                    
                }
            
            }else{
				
           echo json_encode("an Error in uploading fill!");  
               
            }
        
        }else{
			
           echo json_encode("ERROR type!");  
                 
        }
	}
	else
	 {
                    $name=$_POST['name'];
                    $specialisteid=$_POST['specialisteid'];
	              	$insert = "UPDATE `specialities` SET `name`='$name' WHERE `idspec`='$specialisteid'";
					$insert_sql =mysqli_query($conn,$insert);
                    echo json_encode("done");  

	 }




     
