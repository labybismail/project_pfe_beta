<?php
$host = "localhost";
$username ="root";
$password="";
$DB_name="login";

$conn = mysqli_connect ($host,$username,$password,$DB_name);
        mysqli_set_charset($conn,"utf8");


if (!$conn ) 
{
     echo mysqli_connect_error("not connect").mysqli_connect_errno();
     
}



function close_DB ()
{
    global $conn;
    mysqli_close($conn); 
}



?>