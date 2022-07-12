<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<?php include('alerts.php') ?>
<div class="card text-center col-md-12 border-0 shadow-lg rounded-0">
    <?php include('alerts.php') ?>
    <div class="card-header">
        <ul class="nav nav-pills navbar-light  bg-dark card-header-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link text-light active" id="pills-users-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-users-profile-tab">
                <div class="card mb-3 border-0 shadow-lg rounded-0 p-3">
                    <div class="row g-0">
                        <div class="col-md-5">
                        <?php
                                if (isset($_POST['view_user'])) {
                                    $id = $_POST['id'];
                                    $query = "SELECT * FROM admin_registration WHERE id = '$id'";
                                    $query_run = mysqli_query($connection, $query);
                                    if ($query_run) {
                                        while ($row = mysqli_fetch_array($query_run)) {
                                ?>
                            <h1 class="display-4 mt-3 text-secondary"><i class="fa fa-user-circle-o"></i><br><?php echo $row['firstname'] . " " . $row['surname']; ?></h1>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                             
                                            <p>Username: <?php echo  $row['username']; ?></p>
                                            <p>Email: <?php echo $row['email']; ?></p>
                                            <p>Phone Number: <?php echo $row['phone_number']; ?></p>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>