<?php
include('control.php');
include('config/connection.php');

if (isset($_POST['save-pwd'])) {

    function sanitize_data($in)
    {
        $in = trim($in, " ");
        $in = stripslashes($in);
        $in = htmlspecialchars($in);
        return $in;
    }
    $new_password   = sanitize_data($_POST['new_password']);
    $con_password   = sanitize_data($_POST['con_password']);
    $code = $_SESSION['code'];
    $email = $_SESSION['email'];

    if(empty($new_password)) {
        $_SESSION['warning'] = "New Password is required";
        header('Location: profile.php');
    } elseif ($new_password !== $con_password) {
        $_SESSION['warning'] = "New Password and Confirm password do not match";
        header('Location: password-reset.php');
    } else {
        
        $query = "SELECT `email`,`pwd_reset_token` FROM `admin_registration` WHERE `email` = '$email' AND `pwd_reset_token`= '$code'";
        $query_run = mysqli_query($connection, $query);
        if (mysqli_num_rows($query_run) ===  1) {
            // update old password with new password 
            $new_password = password_hash($new_password, PASSWORD_BCRYPT);
            $query_2 = "UPDATE `admin_registration` SET `password` = ? WHERE `email` = ? AND `pwd_reset_token`= ?";
            $stmt_update = $connection->prepare($query_2);
            $stmt_update->bind_param("ssi", $new_password, $email, $code);
            $stmt_update->execute();

            include('verification-code.php');
            // update token in password reset table
            $query_3 = "UPDATE `password_reset` SET `pwd_reset_token` = ? WHERE `pwd_reset_email` = ?";
            $stmt_update_2 = $connection->prepare($query_3);
            $stmt_update_2->bind_param("is", $resetcode, $email);
            $stmt_update_2->execute();
            $stmt_update_2->close();

            // update token in admin table
            $query_4 = "UPDATE `admin_registration` SET `pwd_reset_token` = ? WHERE `email` = ?";
            $stmt_update_3 = $connection->prepare($query_4);
            $stmt_update_3->bind_param("is", $resetcode, $email);
            $stmt_update_3->execute();
            $stmt_update_3->close();

            include('send-password-change-confirmation-code.php');
            $_SESSION['success'] = "You have successfully changed your password";
            header("location: login.php");
        }else {
            $_SESSION['status'] = "You cannot change this password";
            header('Location: login.php');
        }
    }

    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['code']);
} else {
    $_SESSION['warning'] = "An error occured!";
    header("Location: password-reset.php");
}
