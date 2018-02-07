<?php

    /* DATABASE CREDENTIALS */

    define('DB_SERVER', 'localhost');  /* To be changed to actual server later */

    define('DB_USERNAME', 'root'); /* To be changed to actual username later */

    define('DB_PASSWORD', '');  /* To be changed to actual password later */

    define('DB_NAME', 'hmongPreservation');

     

    /* Attempt to connect to MySQL database */

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }



?>