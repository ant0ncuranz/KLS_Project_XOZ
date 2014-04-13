<!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="utf-8" />
        
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
        
        <link rel="stylesheet" href='css/admin.css'>
        <link rel="stylesheet" href='css/lightbox.css'>
        
        <?php
            
            include 'database.php';
            
            if(isset($_GET["id"])) {
                $article_id = $_GET["id"];
            } else {
                $_GET["id"] = 0;
            }

            $article = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM articles WHERE id = " . $article_id));
            
        ?>
        
        <title>Königin-Luise-Stiftung</title>
        
        <!--[if IE]>
	       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if lte IE 7]>
	       <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
        <!--[if lt IE 7]>
           <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->
        
    </head>
        
    <body>
        
        <?php include 'header.php'; ?>
        
        <main>
            
            <article class="article">
                <header class="article_header">
                    <h2 class="article_title">Neuer Artikel</h2>
                </header>
                
                <div class="article_content">
                    <p>Hier können Sie mithilfe des folgenden Formulars einen Artikel verändern.</p>
                    <br />
                    <form action=<?php echo "edit_article_helper.php?id=" . $article_id ?> autocomplete="on" method="post" enctype="multipart/form-data">
                        <p>Titel:</p><input type="text" name="title" required <?php echo 'value="' . $article["title"] . '"' ?>><br />
                        <p>Text:</p><textarea type="text" name="content" required><?php echo $article["content"] ?></textarea><br />
                        <label for="imageUpload">Bild ändern?</label><input type="file" name="imageUpload">
                        <p>Autor:</p><input type="text" name="author" required <?php echo 'value="' . $article["author"] . '"' ?>><br />
                        <input type="submit" value="Artikel speichern">
                    </form>
                    <br />
                </div>
                
            </article>
            
            </main>
        
        <?php
            include 'footer.php';
            mysqli_close($mysqli);
        ?>
        
    </body>
</html>