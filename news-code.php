<?php
include('security.php');

if (isset($_POST['add_news'])) {
    $id = $_POST['admin_id'];
    $tittle = $_POST['tittle'];
    $content = $_POST['content'];
    $date = date('Y-m-d');
    $name = $_POST['name'];
    $source = $_POST['source'];
    $time = time();
    $img_name = $time.$_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if(empty($tittle)){
        $_SESSION['warning'] = "Title is required";
        header("Location: news-edit.php");
    }elseif(empty($content)){
        $_SESSION['warning'] = "News content is required";
        header("Location: news-edit.php");
    }elseif(empty($name)){
        $_SESSION['warning'] = "Authors name is required";
        header("Location: news-edit.php");
    }
    
    if ($img_size > 3000000){
        $_SESSION['warning'] = "Sorry, your file is to large.";
        header("Location: news.php");
    }else{
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");

        if(in_array($img_ex_lc, $allowed_exs)){
            $new_img_name = uniqid("news", true).'.'.$img_ex_lc;
            $img_upload_path = 'images/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $query = "INSERT INTO news (tittle, content, publisher_name, image, admin_id, date, source) VALUES (?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssssiss", $tittle, $content, $name, $new_img_name, $id, $date, $source, );
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                    $_SESSION['success'] =  "News successfully add";
                    header('Location: news.php');
            } else {
                    $_SESSION['status'] =  "News failed to save";
                    header('Location: news.php');
            }
            $stmt->close();

         }else{
            $_SESSION['warning'] = "You can't upload files of this type";
            header("Location: news.php");
         }
    }

}


if (isset($_POST['update-news'])){
    $id = $_POST['id'];
    $admin_id = $_SESSION['users']['users_id'];
    $tittle = $_POST['tittle'];
    $content = $_POST['content'];
    $name = $_POST['name'];
    $source = $_POST['source'];
    $time = time();
    $old_image = $_POST['old_image'];
    $img_name = $time.$_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];

    if(empty($tittle)){
        $_SESSION['warning'] = "Title is required";
        header("Location: news-edit.php");
    }elseif(empty($content)){
        $_SESSION['warning'] = "News content is required";
        header("Location: news-edit.php");
    }elseif(empty($name)){
        $_SESSION['warning'] = "Authors name is required";
        header("Location: news-edit.php");
    }else{
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
            if ($img_size > 3000000){
                $_SESSION['warning'] = "Sorry, your file is to large.";
                header("Location: news.php");
            }else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
        
                if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid("news", true).'.'.$img_ex_lc;
                    $img_upload_path = 'images/'.$new_img_name;

                    // delete old news image
                    $old_news_image = "images/$old_image";
                    if(unlink($old_news_image)){
                        //just deleted 
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }else{
                        // already deleted
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }
        
                        $query = "UPDATE news SET tittle =?, content=?, image=?, publisher_name=?, source=?, admin_id=? WHERE new_id=?";
                        $stmt = $connection->prepare($query);
                        $stmt->bind_param("sssssii", $tittle, $content, $new_img_name, $name, $source, $admin_id, $id);
                        $stmt->execute();
        
                        if ($stmt->affected_rows > 0) {
                            $_SESSION['success'] =  "$tittle successfully updated";
                            header('Location: news.php');
                        } else {
                            $_SESSION['status'] =  "News failed to update";
                            header('Location: news-edit.php');
                        }
                        $stmt->close();
                }else{
                    $_SESSION['warning'] = "You can't upload files of this type";
                    header("Location: news-edit.php");
                }
            }
        }else{
            $query = "UPDATE news SET tittle =?, content=?, publisher_name=?, source=?, admin_id=? WHERE new_id=?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssssii", $tittle, $content, $name, $source, $admin_id, $id);
            $stmt->execute();   
            if ($stmt->affected_rows > 0) {
                $_SESSION['success'] =  "$tittle successfully updated";
                header('Location: news.php');
            } else {
                $_SESSION['status'] =  "$tittle failed to update";
                header('Location: news-edit.php');
            }
            $stmt->close();
        }
    } 
}   



if(isset($_POST['delete_news'])){
    $id = $_POST['delete_id'];

    $query = "SELECT * FROM news WHERE new_id =  $id";
    $query_run = mysqli_query($connection, $query);
    $news = mysqli_fetch_assoc($query_run);

    if(mysqli_num_rows($query_run) === 1){
        $news_image = $news['image'];
        $image_path = './images/'.$news_image;
        if(!$image_path) {
            $_SESSION['warning'] = "File not found";
            header("Location: news.php");
        }else{
            unlink($image_path);
        }
    }

    $query = "DELETE FROM news WHERE new_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $_SESSION['status'] = "News successfully deleted";
    header("Location: news.php");
}