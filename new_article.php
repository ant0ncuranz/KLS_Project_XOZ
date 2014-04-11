<?php
    include 'database.php';

    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    $image = $_FILES["imageUpload"]["name"];
    $path_parts = pathinfo($image);
    $extension = $path_parts['extension'];
    $id = mysqli_fetch_array(mysqli_query($mysqli, "SELECT MAX(id) FROM articles"));
    $highest_id = $id[0] + 1;
    $source_filename = $_FILES["imageUpload"]["tmp_name"];
    $target_filename = "article_images/" . $highest_id . "." . $extension;
    
    if((mb_strlen($image, "UTF-8") > 225) == TRUE) {
        exit;
    }
    
    if(!(in_array(strtolower($extension), array('gif','jpg','jpe','jpeg','png')))) {
        exit;
    }
    
    move_uploaded_file($source_filename, $target_filename);

    $insert_query = 'INSERT INTO articles (id, title, content, author, img) VALUES (' . $highest_id . ', "' . $title . '", "' . $content . '", "' . $author . '", "' . $highest_id . "." . $extension . '")';
    
    mysqli_query($mysqli, $insert_query);
    
    mysqli_close($mysqli);
    
    header("Location: index.php");
    die();
    
?>