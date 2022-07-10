<?php
    session_start();
    require_once('config/connection.php');
    /**
     * until session is stated with email
     * do not open verification code;
     */

    if(!isset($_SESSION['users']['users_email'])){
        isset($_SESSION['users']['email']);
        header("Location: forgot-password.php");
    }
