<!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="utf-8" />
        
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
        
        <link rel="stylesheet" href='css/articles.css'>
        <link rel="stylesheet" href='css/lightbox.css'>
        
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $(".img").each(function(){
                    $(this).width($(this).width() * 0.5);
                });
            });
        </script>
        
        <?php
            include 'database.php';
            
            //Artikel selektieren
            $result = mysqli_query($mysqli, "SELECT * FROM articles WHERE id = ".$_GET["id"]);
            
            if(!isset($_GET["id"])) {
                
                $err404 = true;
            }
            
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
            
            <?php
                while(($row = mysqli_fetch_array($result))) {
            ?>
            
            <article class="article">
                <header class="article_header">
                    <h2 class="article_title">
                        <?php
                            echo $row["title"];
                        ?>
                    </h2>
                </header>
                
                <div class="article_content">
                    <?php
                        if(!is_null($row["img"])) {
                            echo '<a href="article_images/'.$row["img"].'" data-lightbox="img1"><img src="article_images/' . $row["img"] . '" class="img"></a>';
                        }
                        echo "<p>".nl2br($row["content"]);
                    ?>
                </div>
                
            </article>
            
            <?php
                }
            ?>
            
        </main>
        
        <?php
            include 'footer.php';
            mysqli_close($mysqli);
        ?>
        
    </body>
</html>