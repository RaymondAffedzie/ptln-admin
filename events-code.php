<?php
include('security.php');

if (isset($_POST['create_event'])) {
    $id = $_POST['admin_id'];
    $tittle = $_POST['tittle'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $town = $_POST['town'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $contact = $_POST['phone_number'];

    $query = "INSERT INTO events (tittle, content, date, time, venue, town, country, info_email, info_contact, admin_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssssssssi", $tittle, $content, $date, $time, $venue, $town, $country, $email, $contact, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['success'] =  "You have successfully added a new event";
        header('Location: events.php');
    } else {
        $_SESSION['status'] =  "Event failed to save";
        header('Location: events.php');
    }
    $stmt->close();
}


if (isset($_POST['update-event'])){
    $id = $_POST['id'];
    $admin_id = $_SESSION['users']['users_id'];
    $tittle = $_POST['tittle'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $town = $_POST['town'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $contact = $_POST['phone_number'];

    $query = "UPDATE events SET tittle =?, content=?, date=?, time=?, venue=?, town=?, country=?, info_email=?, info_contact=?, admin_id=?  WHERE event_id=?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssssssssii", $tittle, $content, $date, $time, $venue, $town, $country, $email, $contact, $admin_id, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['success'] =  "You have successfully updated the <strong>$tittle</strong> event";
        header('Location: events.php');
    } else {
        $_SESSION['neutral'] =  "No changes were made to <strong>$tittle</strong>";
        header('Location: events.php');
    }
    $stmt->close();
}


if(isset($_POST['delete_event'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM events WHERE event_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $_SESSION['status'] = "Event successfully deleted";
    header("Location: events.php");
}