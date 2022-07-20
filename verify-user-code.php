<?php
    include('control.php');
    include('config/connection.php');

    if(isset($_POST['confirm-code'])){
        function sanitize_user_input($data) {
            $data = trim($data, " ");
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $email = $_SESSION['email'];
        $code = sanitize_user_input($_POST['verify-code']);
        $_SESSION['code'] = $code;
        
        if(empty($code)){
            $_SESSION['warning'] ="Enter verificaiton code";
            header("Location: verify-user.php");
        }else{
            $query = "SELECT `email`, `pwd_reset_token` FROM `admin_registration` WHERE `email` = '$email' AND `pwd_reset_token`= '$code'";
            $query_run = mysqli_query($connection, $query);
            if(mysqli_num_rows($query_run) ===  1){
                $_SESSION['success'] ="Enter new password";
                header("Location: password-reset.php");
            }else{
                $_SESSION['status'] = "Invalid validation code";
                header("Location: verify-user.php");
            }
        }   
        
    }else{
        $_SESSION['warning'] = "An error occured";
        header("Location: verify-user.php");
    }
?>