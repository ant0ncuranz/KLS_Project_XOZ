<?php
    include 'database.php';

    $id = $_GET["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    $image = $_FILES["imageUpload"]["name"];
    $imgQuery = "";
    
    if(!empty($image)) {
        $path_parts = pathinfo($image);
        $extension = $path_parts['extension'];
        $imgQuery = ", img = " . $id . "." . $extension;
        $source_filename = $_FILES["imageUpload"]["tmp_name"];
        $target_filename = "article_images/" . $id . "." . $extension;
        
        if(!(in_array(strtolower($extension), array('gif','jpg','jpe','jpeg','png')))) {
            exit("Bilder sind bunt!");
        }
        
        if((mb_strlen($image, "UTF-8") > 225) == TRUE) {
            exit("Name zu lang!");
        }
        
        move_uploaded_file($source_filename, $target_filename);
        
    }
    
    $update_query = 'UPDATE articles SET title = "' . $title . '", content = "' . $content . '", author = "' . $author . '"' . $imgQuery . ' WHERE id = ' . $id;
    
    mysqli_query($mysqli, $update_query);
    
    mysqli_close($mysqli);

    header("Location: index.php");
?>