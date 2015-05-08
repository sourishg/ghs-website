<?php
    include ('inc/constants.php');
    include('inc/GHS.php');
    session_destroy();
    header("location:admin_login.php");
?>