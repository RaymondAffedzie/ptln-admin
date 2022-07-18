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
                <h5 class="modal-title" id="exampleModalLabel">Create News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="news-code.php" method="POST" enctype="multipart/form-data" autocorrect="on" autocomplete="off">
                    <input type="text" class="form-control" name="admin_id" value="<?php echo $_SESSION['users']['users_id']; ?>" hidden>
                    <div class="form-group mb-3">
                        <label for="title">Tittle</label>
                        <input type="text" class="form-control" name="tittle" id="title" placeholder="Title of event" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">News content</label>
                        <textarea class="form-control" name="content" id="content" placeholder="Add content" autocapitalize="on" autocorrect="on"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Publisher name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="John Doe">
                    </div>
                    <div class="form-group mb-3">
                        <label for="source">Source</label>
                        <input type="text" class="form-control" name="source" id="source" placeholder="url or tittle">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Add image">
                    </div>

                    <button type="submit" class="w-100 mb-2 btn btn-lg rounded-4 btn-outline-primary" name="add_news">Add news</button>

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
            <h3 class="font-weight-bold m-0 text-primary">News page
                <button type="button" class="btn btn-primary ml-5 float-end" data-bs-toggle="modal" data-bs-target="#create_event">
                    <i class="fa fa-user-plus"></i> Add news
                </button>
            </h3>

        </div>
        <div class="card-body">

            <div class="table-responsive">
                <?php
                include('alerts.php');
                $query = "SELECT * FROM `news`";
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
                            <th scope="col">Publisher name</th>
                            <th scope="col">Source</th>
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
                                    <td class="text-wrap" style="width: 100px;">
                                        <p> <?php echo $row['tittle']; ?> </p>
                                    </td>
                                    <td class="text-wrap" style="width: 300px;">
                                        <p> <?php echo $row['content']; ?> </p>
                                    </td>
                                    <td>
                                        <img src="images/<?php echo $row['image']?>" width="150px" height="auto" alt="image for news">
                                    </td>
                                    <td>
                                        <p> <?php echo $row['date']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['publisher_name']; ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row['source']; ?> </p>
                                    </td>
                                    <td>
                                        <form action="users-profile.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row['admin_id']; ?>" hidden>
                                            <button type="submit" class="btn btn-outline-secondary" name="view_user" data-bs-toggle="tooltip" data-bs-placement="left" title="View member's profile">
                                                <p><?php echo $row['admin_id']; ?></p>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="news-edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['new_id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit news">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="news-code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['new_id']; ?>">
                                            <button type="submit" name="delete_news" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Delete this news" onclick="return confirm('Do you want to delete this news?')">
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