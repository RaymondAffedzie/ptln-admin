<?php
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
    
?>

    <!-- Modal -->
    <div class="modal fade modal-signin" id="add_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus"></i>Register Admininistrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="registercode.php" method="POST" autocomplete="off">

                    <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" minlength="2" maxlength="32" required>
                            <label for="firstname">Firstname</label>
                    </div> 

                    <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" minlength="2" maxlength="32" required>
                            <label for="surname">Surname</label>
                    </div>

                    <div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control verify_username" name="username" id="username" placeholder="Username" minlength="4" maxlength="32" aria-label="Username" aria-describedby="basic-addon1" required>
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>                        
                        <p class="notice_username text-danger"></p>
                    </div>

                    <div class="form-floating mb-3">
                        <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                        <input type="email" class="form-control verify_email" name="email" id="email" placeholder="Email" data-sb-validations="required,email" required>
                        <label for="email">Email</label>
                        <p class="notice_email text-danger"></p>
                    </div>

                    <div>
                        <label for="phone_number">Phone Number</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> +233 (0) </span>
                            <input type="text" class="form-control verify_phone_number" name="phone_number" id="phone_number" placeholder="eg. 024 000 000 0000" patter="^\+?(\233?|0)\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}?" minlength="10" maxlength="16" required>
                        </div> 
                        <p class="notice_phone_number text-danger"></p>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="4" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" minlength="4 required>
                            <label for="confirm_password">Confirm Password</label>
                    </div>
                    
                    <hr class="my-4">

                    <button type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-outline-primary" name="register">Register</button>
            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <!-- Button trigger modal -->
                <h6 class="font-weight-bold m-0 text-primary h3">Registered Admininstrators
                    <button type="button" class="btn btn-primary ml-3" data-bs-toggle="modal" data-bs-target="#add_admin">
                        <i class="fa fa-user-plus"></i> Add Admininstrator
                    </button>
                </h6>     
            
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <?php
                        include('alerts.php');
                        $query = "SELECT id, firstname, surname, username, phone_number, email FROM `admin_registration` WHERE status = 'Moderator'";
                        $query_run = mysqli_query($connection, $query);
                        
                    ?>
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Firstname</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Username</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($query_run){
                                    while($row = mysqli_fetch_array($query_run)){
                                        ?>
                                        <tr>
                                            <td> <p> <?php echo $row['firstname']; ?>       </p> </td>
                                            <td> <p> <?php echo $row['surname']; ?>         </p> </td>
                                            <td> <p> <?php echo $row['username']; ?>        </p> </td>
                                            <td> <p> <?php echo $row['phone_number']; ?>    </p> </td>
                                            <td> <p> <?php echo $row['email']; ?>           </p> </td>
                                            <td> 
                                                <form action="" method="POST">
                                                    <input type="hidden" name="check_status_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="check_status_btn" class="btn btn-outline-warning">
                                                    <i class="fa-solid fa-ban"></i>
                                                    </button> 
                                                </form>
                                            </td>
                                            
                                            <td> 
                                                <form action="registeredit.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="edit_btn" class="btn btn-outline-info">
                                                        <i class="fa fa-edit"></i>
                                                    </button> 
                                                </form>
                                            </td>
                                            <td>
                                                <form action="registercode.php" method="post">
                                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="delete_admin_profile" class="btn btn-outline-danger"  data-bs-toggle="tooltip" data-bs-placement="left" title="Delete Profile" onclick="return confirm('Do you want to delete')">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button> 
                                                </form>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                                
                                }else{
                                    ?>
                                        <tr><td><?php echo "No data found"; ?></td></tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
           <!-- no card footer -->
        </div>
    </div>



<?php
    include('includes/scripts.php');
    include('includes/footer.php');
?>