<?php 
    require_once 'connection.inc.php';
    unset($_SESSION['USER_ID']);
    session_destroy();
    header('Location:index.php');
    die();
?>