<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="font-weight-bold m-0 text-primary">All stories</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include('alerts.php');
                $query = "SELECT * FROM `story`";
                $query_run = mysqli_query($connection, $query);
                $counter = 0;
                ?>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Tittle</th>
                            <th scope="col">Content</th>
                            <th scope="col">Date</th>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            <th scope="col">Read me</th>
                            <th scope="col">Approval action</th>
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
                                    <td class="text-wrap" style="width: 100px;">
                                        <p> <?php echo $row['tittle']; ?> </p>
                                    </td>
                                    <td class="text-wrap" style="width: 300px;">
                                        <p> <?php echo $row['content']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['date']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['country']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['state']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php if ($row['status'] == 0) { // 0 = not approved and 1 = approved
                                                echo "Not approved";
                                            } elseif ($row['status'] == 1) { // 0 = not approved and 1 = approved
                                                echo "Approved";
                                            } ?> </p>
                                    </td>
                                    <td>
                                        <img src="images/<?php echo $row['image'] ?>" width="60px" height="auto" alt="image for story">
                                    </td>
                                    <td>
                                        <!-- read story -->
                                        <form action="read-story.php" method="POST">
                                            <input type="hidden" name="story_id" value="<?php echo $row['story_id']; ?>">
                                            <button type="submit" name="read_btn" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#read_story" data-bs-toggle="tooltip" data-bs-placement="left" title="Read story">
                                                <i class="fa-brands fa-readme"></i> Read story
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <!-- approving disapproved story -->
                                        <?php if ($row['status'] == 0) {  // 0 = not approved and 1 = approved
                                        ?>
                                            <form action="stories-code.php" method="post">
                                                <input type="hidden" name="story_id" value="<?php echo $row['story_id']; ?>">
                                                <input type="hidden" name="story_tittle" value="<?php echo $row['tittle']; ?>">
                                                <button type="submit" name="approve_btn" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="left" title="Approve story" onclick="return confirm('Do you want to approve this story?')">
                                                    <i class="fa-solid fa-check"></i> Approve
                                                </button>
                                            </form>
                                        <?php } elseif ($row['status'] == 1) { // 0 = not approved and 1 = approved
                                        ?>
                                            <form action="stories-code.php" method="post">
                                                <input type="hidden" name="story_id" value="<?php echo $row['story_id']; ?>">
                                                <input type="hidden" name="story_tittle" value="<?php echo $row['tittle']; ?>">
                                                <button type="submit" name="disapprove_btn" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Approve story" onclick="return confirm('Do you want to disapprove this story?')">
                                                    <i class="fa-solid fa-xmark"></i> Disapprove
                                                </button>
                                            </form>
                                        <?php } ?>
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