<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>


<!-- Modal -->
<div class="modal fade modal-signin" id="create_event" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="events-code.php" method="POST" autocomplete="off">
                    <input type="text" class="form-control" name="admin_id" value="<?php echo $_SESSION['users']['users_id']; ?>" hidden>
                    <div class="form-group mb-3">
                        <label for="title">Tittle</label>
                        <input type="text" class="form-control" name="tittle" id="title" placeholder="Title of event" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">Descpription of Event</label>
                        <textarea class="form-control" name="content" id="content" placeholder="Description" autocapitalize="on" autocorrect="on"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <label for="date">Date of Event</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="input-group mb-3">
                        <label for="time">Time of Event</label>
                        <input type="time" class="form-control" name="time" id="time">
                    </div>
                    <div class="form-group mb-3">
                        <label for="venue">Venue</label>
                        <input type="text" class="form-control" name="venue" id="venue" placeholder="Community center" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="town">Town</label>
                        <input type="text" class="form-control" name="town" id="town" placeholder="Takoradi">
                    </div>
                    <div class="form-group mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" id="country" placeholder="Ghana">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">For info Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone_number">For info phone number</label>
                        <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="eg. 024 000 000 0000">
                    </div>

                    <button type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-outline-primary" name="create_event">Create Event</button>

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
            <h3 class="font-weight-bold m-0 text-primary">Events Page
                <button type="button" class="btn btn-primary ml-5 float-end" data-bs-toggle="modal" data-bs-target="#create_event">
                    <i class="fa fa-user-plus"></i> Create new event
                </button>
            </h3>

        </div>
        <div class="card-body">

            <div class="table-responsive">
                <?php
                include('alerts.php');
                $query = "SELECT * FROM `events`";
                $query_run = mysqli_query($connection, $query);
                $counter = 0;
                ?>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Tittle</th>
                            <th scope="col" style="width: 400px;">Content</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Town</th>
                            <th scope="col">Country</th>
                            <th scope="col">Info email</th>
                            <th scope="col">Info phone number</th>
                            <th scope="col">Admin ID</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($query_run) {
                            while ($row = mysqli_fetch_array($query_run)) {
                                $counter++;
                        ?>
                                <tr>
                                    <td>
                                        <p> <?php echo $counter; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['tittle']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['content']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['date']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['time']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['venue']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['town']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['country']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['info_email']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['info_contact']; ?> </p>
                                    </td>
                                    <td>
                                        <form action="users-profile.php" method="post">
                                           <input type="text" name="id" value="<?php echo $row['admin_id']; ?>" hidden> 
                                           <button type="submit" class="btn btn-outline-secondary" name="view_user" data-bs-toggle="tooltip" data-bs-placement="left" title="View admin's profile">
                                            <p><?php echo $row['admin_id'];?></p>
                                           </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="events-edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['event_id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit this event">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="events-code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['event_id']; ?>">
                                            <button type="submit" name="delete_event" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Delete this event" onclick="return confirm('Do you want to delete this event?')">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
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