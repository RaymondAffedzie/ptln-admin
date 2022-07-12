<?php
include('security.php');

if (isset($_POST['add_news'])) {
    $id = $_POST['admin_id'];
    $tittle = $_POST['tittle'];
    $content = $_POST['content'];
    $date = date('Y-m-d');
    $name = $_POST['name'];
    $source = $_POST['source'];

    $query = "INSERT INTO news (tittle, content, publisher_name, admin_id, date, source) VALUES (?,?,?,?,?,?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssiss", $tittle, $content, $name, $id, $date, $source, );
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['success'] =  "News successfully add";
        header('Location: news.php');
    } else {
        $_SESSION['status'] =  "News failed to save";
        header('Location: news.php');
    }
    $stmt->close();
}


if (isset($_POST['update-news'])){
    $id = $_POST['id'];
    $admin_id = $_SESSION['users']['users_id'];
    $tittle = $_POST['tittle'];
    $content = $_POST['content'];
    $name = $_POST['name'];
    $source = $_POST['source'];
    
    $query = "UPDATE news SET tittle =?, content=?, publisher_name=?, source=?, admin_id=? WHERE new_id=?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ssssii", $tittle, $content, $name, $source, $admin_id, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['success'] =  "You have successfully updated the <strong>$tittle</strong> news";
        header('Location: news.php');
    } else {
        $_SESSION['neutral'] =  "No changes were made to <strong>$tittle</strong>";
        header('Location: news.php');
    }
    $stmt->close();
}


if(isset($_POST['delete_event'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM news WHERE new_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $_SESSION['status'] = "Event successfully deleted";
    header("Location: events.php");
}