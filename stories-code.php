<?php
include('security.php');

// approves story on read story page
if(isset($_POST['approve'])){
    $id = $_POST['story_id'];
    $tittle = $_POST['story_tittle'];
    $status = 1;
    $query = "UPDATE `story` SET `status`=$status WHERE `story_id`=$id";
    $query_run = mysqli_query($connection, $query_run);
    $_SESSION['success'] = "$tittle has been approved";
    header("Location: stories.php");
}else{
    $_SESSION['neutral'] = "No story selected";
    header("Location: stories.php");
}

// approve story on stories page
if(isset($_POST['approve_btn'])){
    $id = $_POST['story_id'];
    $tittle = $_POST['story_tittle'];
    $status = 1;
    $query = "UPDATE `story` SET `status`=$status WHERE `story_id`=$id";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        $_SESSION['success'] = "$tittle has been approved";
        header("Location: stories.php");
    }else{
        $_SESSION['warning'] = "$tittle was not approved";
        header("Location: stories.php");
    }
}else{
    $_SESSION['neutral'] = "No story selected";
    header("Location: stories.php");
}


// disapprove stories
if(isset($_POST['disapprove_btn'])){
    $id = $_POST['story_id'];
    $tittle = $_POST['story_tittle'];
    $status = 0;
    $query = "UPDATE `story` SET `status`=$status WHERE `story_id`=$id";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        $_SESSION['success'] = "$tittle has been disapproved";
        header("Location: stories.php");
    }else{
        $_SESSION['warning'] = "$tittle fail to disapproved";
        header("Location: stories.php");
    }
}else{
    $_SESSION['neutral'] = "No story selected";
    header("Location: stories.php");
}
