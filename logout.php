<?php
    session_start();
    unset($_SESSION["isloggedIN"]);
    session_destroy();
    header('location:login.php');
    exit();
?>