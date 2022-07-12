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
                    <h4 class="text-primary">Upadate an existing event</h4>

                    <?php
                    include('alerts.php');

                    if (isset($_POST['edit_btn'])) {
                        $id = $_POST['edit_id'];

                        $query = "SELECT * FROM events WHERE event_id = '$id' ";
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                                <form action="events-code.php" method="POST" autocomplete="off">
                                    <input type="hidden" name="id" value="<?php echo $row['event_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="tittle">Tittle</label>
                                                <input type="text" class="form-control" name="tittle" value="<?php echo $row['tittle']; ?>" id="tittle">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="content">Descpription of Event</label>
                                                <input class="form-control" name="content" value="<?php echo $row['content']; ?>" id="content" autocapitalize="on" autocorrect="on">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email">Info email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $row['info_email']; ?>" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="time">Time</label>
                                                <input type="time" class="form-control" name="time" value="<?php echo $row['time']; ?>" id="time">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>" id="date">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="contact">Info contact</label>
                                                <input type="tel" class="form-control" name="phone_number" value="<?php echo $row['info_contact']; ?>" id="contact">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="venue">Venue</label>
                                                <input type="text" class="form-control" name="venue" value="<?php echo $row['venue']; ?>" id="venue">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="date">Date</label>
                                                <input type="text" class="form-control" name="town" value="<?php echo $row['town']; ?>" id="town">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" name="country" value="<?php echo $row['country']; ?>" id="country">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-outline-primary" name="update-event">Update event</button>
                                </form>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="card-footer">
                    <a href="events.php" class="btn btn-outline-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>