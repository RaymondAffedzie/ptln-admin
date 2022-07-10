<?php
    include('security.php');
    /*
    ** 
    change password
    **
    */
    if(isset($_POST['changepassword'])){
        function sanitize_data($in) {
            $in = trim($in, " ");
            $in = stripslashes($in);
            $in = htmlspecialchars($in);
            return $in;
        }

        $id             = sanitize_data($_POST['id']);
        $old_password   = sanitize_data($_POST['old_password']);
        $new_password   = sanitize_data($_POST['new_password']);
        $con_password   = sanitize_data($_POST['con_password']);

        if(empty($old_password)){
            $_SESSION['warning'] = "Old Password is required";
            header('Location: profile.php');
        }elseif(empty($new_password)){
            $_SESSION['warning'] = "New Password is required";
            header('Location: profile.php');
        }elseif($new_password !== $con_password){
            $_SESSION['warning'] = "New Password and Confirm password do not match";
            header('Location: profile.php');
        }else{
            $new_password = password_hash($new_password, PASSWORD_BCRYPT);

            $query = "SELECT password FROM admin_registration WHERE id='$id'";
            $query_run = mysqli_query($connection, $query);
            if($query_run){
                while($row = mysqli_fetch_array($query_run)){
                    $verify_password = password_verify($old_password, $row['password']);
                    if($verify_password === $_SESSION['users']['pswd']){
                        
                        $query_2 = "UPDATE admin_registration SET password = ? WHERE id = ?";
                        $stmt_update = $connection->prepare($query_2);
                        $stmt_update->bind_param("si", $new_password, $id);
                        $stmt_update->execute();
                        
                        $_SESSION['success'] = "You have successfully changed your password";
                        header("location: profile.php");
                    }else{
                        $_SESSION['status'] = "You entered a wrong password";
                        header('Location: profile.php');
                    }
                }

            }

        }
    }
