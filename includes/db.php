<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'group3a10');
    define('DB_PASSWORD', 'Poibnm312');
    define('DB_NAME', 'meathubdb');
    
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>