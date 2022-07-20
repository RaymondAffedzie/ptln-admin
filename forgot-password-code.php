<?php
    include('control.php');
    include('config/connection.php');

    if(isset($_POST['code-request'])){

        function valisantize_email($data){
            $data = filter_var($data, FILTER_VALIDATE_EMAIL);
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            return $data;
        }
        
        $email =  valisantize_email($_POST['email']);
        $_SESSION['email'] = $email;
        
        if(empty($email)){
            
            $_SESSION['warning'] = "Enter your email";
            header("Location: forgot-password.php");
            
        }else{

            $query = "SELECT email FROM admin_registration WHERE email = ?";
            $stmt_check = $connection->prepare($query);
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $stmt_check->store_result();   

            if($stmt_check->num_rows > 0){
                $stmt_check->bind_result($email);
                $stmt_check->fetch();

                $query_2 = "DELETE FROM password_reset WHERE pwd_reset_email = ?";
                $stmt_del = $connection->prepare($query_2);
                $stmt_del->bind_param("s", $email);
                $stmt_del->execute();
                $stmt_del->close();


                include('verification-code.php');
                $query_3 = "INSERT INTO password_reset (pwd_reset_email, pwd_reset_token) VALUES (?,?)";
                $stmt_insert = $connection->prepare($query_3);
                $stmt_insert->bind_param("si", $email, $resetcode);
                $stmt_insert->execute();
                $query_4 = "UPDATE admin_registration SET pwd_reset_token = ? WHERE email = ?";
                $stmt_insert_2 = $connection->prepare($query_4);
                $stmt_insert_2->bind_param("is", $resetcode, $email);
                $stmt_insert_2->execute();
                $stmt_insert_2->close();
                
                if($stmt_insert->affected_rows > 0){
                    
                    include('send-password-verification-code.php');
                    $_SESSION['success'] = "Check your email for reset code";
                    header("location: verify-user.php");
        
                }else{
                    $_SESSION['status'] = "Could not send verificaiton code <strong>Try Again</strong>";
                    header("location: forgot-password.php");
                }
                
            }else{
                
                $_SESSION['status'] = "You are not registered";
                header("Location: forgot-password.php");
                
                $stmt_insert->close();
            }
            $stmt_check->close();
            
        }
    }else{
        $_SESSION['warning'] = "An error occured!";
        header("Location: forgot-password.php");
    }

?>