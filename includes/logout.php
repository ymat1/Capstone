<?php
    session_start();

    $_SESSION = array();

    session_destroy();

    sleep(1);
    header("location: ../index.php");
    exit();
?>