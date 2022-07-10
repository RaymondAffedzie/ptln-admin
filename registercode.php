<?php
    include('security.php');

    // keypress verification of username
    if(isset($_POST['check_sumbmit_btn_username'])){
        $username = $_POST['username_id'];

        $username_query = "SELECT username FROM admin_registration WHERE username = ?";
        $stmt_check = $connection->prepare($username_query);
        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $stmt_check->store_result();   

        if($stmt_check->num_rows > 0){
            $stmt_check->bind_result($username);
            $stmt_check->fetch();
            $stmt_check->close();

            echo "Username Exist";

        }
    }

    // keypress verification of email
    if(isset($_POST['check_sumbmit_btn_email'])){
        $email = $_POST['email_id'];

        $email_query = "SELECT email FROM admin_registration WHERE email = ?";
        $stmt_check = $connection->prepare($email_query);
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();   

        if($stmt_check->num_rows > 0){
            $stmt_check->bind_result($email);
            $stmt_check->fetch();
            $stmt_check->close();

            echo "Email Is Registered To Another User";

        }
    }

    // keypress  verification of phonenumber
    if(isset($_POST['check_sumbmit_btn_phone_number'])){
        $phone_number = $_POST['phone_number_id'];

        $phone_number_query = "SELECT phone_number FROM admin_registration WHERE phone_number = ?";
        $stmt_check = $connection->prepare($phone_number_query);
        $stmt_check->bind_param("s", $phone_number);
        $stmt_check->execute();
        $stmt_check->store_result();   

        if($stmt_check->num_rows > 0){
            $stmt_check->bind_result($phone_number);
            $stmt_check->fetch();
            $stmt_check->close();

            echo "Number Exist";

        }
    }

    // registration code
    if(isset($_POST['register'])){
        if(empty($_POST['firstname'])){

            $_SESSION['warning'] = "Firstname is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['surname'])){
            
            $_SESSION['warning'] = "Surname is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['username'])){
            
            $_SESSION['warning'] = "Username is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['email'])){

            $_SESSION['warning'] = "Email is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['phone_number'])){

            $_SESSION['warning'] = "Phone Number is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['password'])){

            $_SESSION['warning'] = "Password is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['confirm_password'])){

            $_SESSION['warning'] = "Please confirm your password";
            header('Location: register.php');
            
        }else{

            function sanitize_user_input($data) {
                $data = trim($data, " ");
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function valisantize_email($data){
                $data = filter_var($data, FILTER_VALIDATE_EMAIL);
                $data = filter_var($data, FILTER_SANITIZE_EMAIL);
                return $data;
            }

            $firstname          = sanitize_user_input(ucfirst($_POST['firstname']));
            $surname            = sanitize_user_input(ucfirst($_POST['surname']));
            $username           = sanitize_user_input($_POST['username']);
            $email              = valisantize_email($_POST['email']);
            $phone_number       = sanitize_user_input($_POST['phone_number']);

            $password           = $_POST['password'];
            $confirm_password   = $_POST['confirm_password'];
            
            $email_query = "SELECT email FROM admin_registration WHERE email = ?";
            $stmt_check = $connection->prepare($email_query);
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $stmt_check->store_result();   
            
            if($stmt_check->num_rows > 0){
                $stmt_check->bind_result($email);
                $stmt_check->fetch();
                $stmt_check->close();
                
                $_SESSION['warning'] = "This <strong>Email</strong> is registered to another user";
                header('Location: register.php');
                
            }else{
                
                if($password != $confirm_password){
                    $_SESSION['warning'] =  "Passwords Do Not Match";
                    header('Location: register.php');
                    
                }else{
                    
                    $hash = password_hash($password, PASSWORD_BCRYPT); 

                    $query = "INSERT INTO admin_registration (firstname, surname, username, email, phone_number, password) VALUES (?,?,?,?,?,?)";
                    $stmt_insert = $connection->prepare($query);
                    $stmt_insert->bind_param("ssssss", $firstname, $surname, $username, $email, $phone_number, $hash);
                    $stmt_insert->execute();
            
                    if($stmt_insert->affected_rows > 0){
                        $_SESSION['success'] =  "Admin Registered";
                        header('Location: register.php');
        
                    }else{
                        $_SESSION['status'] =  "Admin Not Added ";
                        header('Location: register.php');
                    }
                    $stmt_insert->close();
                }
    
            }
            $stmt_check->close();
        }          
    }


    // delete admin
    if(isset($_POST['delete_admin_profile'])){
        $id = $_POST['delete_id'];

        $query = "DELETE FROM admin_registration WHERE  id = ?";
        $stmt_del = $connection->prepare($query);
        $stmt_del->bind_param("i", $id);
        $stmt_del->execute();

        if($stmt_del){
            
                $_SESSION['warning'] = "Admin <strong>Terminated</strong>";
                header("location: register.php");

        }else{

                $_SESSION['status'] = "User termination <strong>Failed</strong>";
                header("location: register.php");
        }
        $stmt_del->close();
    }


    // updating active users profile
    if(isset($_POST['updateprofile'])){
        
        if(empty($_POST['firstname'])){
            
            $_SESSION['warning'] = "Firstname is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['surname'])){
            
            $_SESSION['warning'] = "Surname is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['email'])){
            
            $_SESSION['warning'] = "Email is required";
            header('Location: register.php');
            
        }elseif(empty($_POST['phone_number'])){
            
            $_SESSION['warning'] = "Phone Number is required";
            header('Location: register.php');
            
        }else{
            
            function sanitize_user_update($input) {
                $input = trim($input, " ");
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }

            
            function valisantize_update($input){
                $input = filter_var($input, FILTER_VALIDATE_EMAIL);
                $input = filter_var($input, FILTER_SANITIZE_EMAIL);
                return $input;
            }
        
            $id             = $_POST['id'];
            $firstname      = sanitize_user_update($_POST['firstname']);
            $surname        = sanitize_user_update($_POST['surname']);
            $username       = sanitize_user_update($_POST['username']);
            $phone_number   = sanitize_user_update($_POST['phone_number']);
            $email          = valisantize_update($_POST['email']);
            
            $query = "UPDATE admin_registration SET firstname = ?, surname = ?, username = ?, phone_number = ?, email = ? WHERE id = ? ";
            $stmt_update = $connection->prepare($query);
            $stmt_update->bind_param("sssssi", $firstname, $surname, $username, $phone_number, $email, $id);
            $stmt_update->execute();
            
            if($stmt_update){

                $_SESSION['success'] = "Your profile is updated";
                header("location: profile.php");
                exit();

            }else{

                $_SESSION['status'] = "Your profile is not updated";
                header("location: profile.php");
                exit();
            }

        }
    }
        
        
?>