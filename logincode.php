<?php
include('security.php');

// login
    if(isset($_POST['login'])){

        function validate_email($user){
            $user = filter_var($user, FILTER_VALIDATE_EMAIL);
            $user = filter_var($user, FILTER_SANITIZE_EMAIL);
            return $user;
        }

        $email_login = mysqli_real_escape_string($connection, validate_email($_POST['email']));
        $username_login = mysqli_real_escape_string($connection, $_POST['email']);
        $password_login = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT * FROM admin_registration WHERE email = '$email_login' OR username = '$username_login'";
        $query_run = mysqli_query($connection, $query);

        if($row = mysqli_fetch_array($query_run)){
            $status = $row['check_status'];

            if($status !== "Active"){

                $_SESSION['warning'] = "Sorry you have been disabled!<br>Contact you senior Administrator for help.";
                header('Location: login.php');
                
            }else{
                if(password_verify($password_login, $row['password'])){
                   
                    $userspswd    =  password_verify($password_login, $row['password']);
                    $users_email  = $row['email'];
                    $users_id     = $row['id'];
                    $fname        = $row['firstname'];
                    $sname        = $row['surname'];
                    $fullname     = $fname." ".$sname; 
                    $username     = $row['username'];
                    $phone_nubmer = $row['phone_number'];
                    
                    $_SESSION['users'] = [
                        'users_email'=> $users_email,
                        'pswd'       => $userspswd,
                        'users_id'   => $users_id,
                        'fname'      => $fname,
                        'sname'      => $sname,
                        'fullname'   => $fullname,
                        'username'   => $username,
                        'phonenumber'=> $phone_nubmer,
                    ];
                    
                    header('Location: index.php');
                }else{
    
                    $_SESSION['status'] = "Incorrect password";
                    header('Location: login.php');
    
                }
            }

        }else{
            $_SESSION['status'] = "Invalid username or email";
            header('Location: login.php');
        }
   }
