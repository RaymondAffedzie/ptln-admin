<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg rounded-3 mb-4">
                <div class="card-body">
                    <h4 class="text-primary">Update Admininistrator's Profile</h4>

                    <?php
                    include('alerts.php');

                    if (isset($_POST['edit_btn'])) {
                        $id = $_POST['edit_id'];

                        $query = "SELECT * FROM admin_registration WHERE id = '$id' ";
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            while ($row = mysqli_fetch_array($query_run)) {
                    ?>

                                <form action="registercode.php" method="POST" autocomplete="off">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" id="username" placeholder="Username" minlength="3" maxlength="24" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" id="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-groupg mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="new_password" id="password" placeholder="Enter password" minlength="6" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="con_password">Confirm Password</label>
                                                <input type="password" class="form-control" name="con_password" id="con_password" placeholder="Confirm Password" minlength="6" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-outline-primary" name="update-user-profile">Update Profile</button>
                                </form>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="card-footer">
                    <a href="register-admin.php" class="btn btn-outline-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>