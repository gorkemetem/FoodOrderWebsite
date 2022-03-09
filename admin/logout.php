<?php 

    include('../config/constans.php'); 

    session_destroy(); 
    header('location:'.SITEURL.'admin/login.php');

?>