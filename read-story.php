<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php
                    if (isset($_POST['read_btn'])) {
                        $id = $_POST['story_id'];

                        $query = "SELECT * FROM `story` WHERE `story_id` = $id";
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                                <h3 class="font-weight-bold m-0 text-center text-primary"><?= $row['tittle']; ?></h3>
                </div>
                <div class="card-body">
                    <p><?= $row['content'] ?></p>
                    <a class="text-decoration-none" href="stories.php">All stories</a>
                    <form action="stories-code.php" method="post">
                        <input type="hidden" name="story_id" value="<?php echo $row['story_id']; ?>">
                        <input type="hidden" name="story_tittle" value="<?php echo $row['tittle']; ?>">

                        <button type="button" name="approve" class="btn btn-outline-secondary ml-5 float-end">
                            <i class="fa-solid fa-check"></i> Approve story
                        </button>
                    </form>
        <?php
                            }
                        } else {
                            $_SESSION['neutral'] = "You did not select any story";
                        }
                    }
        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>