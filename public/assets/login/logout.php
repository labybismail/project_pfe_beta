<?php
 session_start();
if (isset($_GET['id']))
{
   
    session_destroy();
    header("location: login-23.php");
}


?>