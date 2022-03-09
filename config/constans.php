<?php

        session_start();

        define('SITEURL','http://localhost/food-order/');
        define('LOCALHOST','localhost');
        define('DB_USERNAME','root');
        define('DB_PASSWORD','');
        define('DB_NAME','food-order');

        $conn = mysqli_connect('localhost','root','');
        $db_select = mysqli_select_db($conn,'food-order'); 

?>