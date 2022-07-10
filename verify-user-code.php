<?php
    session_start();
    include('config/connection.php');

    if(isset($_POST['confirm-code'])){
        function sanitize_user_input($data) {
            $data = trim($data, " ");
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $code = sanitize_user_input($_POST['verify-code']);
        $email = $_SESSION['email'];
        $_SESSION['code'] = $code;
        
        $query = "SELECT `email`,`pwd_reset_token` FROM `admin_registration` WHERE `email` = '$email' AND `pwd_reset_token`= '$code'";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            $_SESSION['success'] ="Enter new password";
            header("Location: password-reset.php");
        }else if(empty($code)){
            $_SESSION['warning'] ="Enter verificaiton code";
            header("Location: verify-user.php");
        }else{
            $_SESSION['status'] ="Invalid verification code";
            header("Location: verify-user.php");
        }
        
        $stmt_update->close();
        $stmt_select->close();
        
    }else{
        $_SESSION['warning'] = "An error occured";
        header("Location: verify-user.php");
    }
?>