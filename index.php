<!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="utf-8" />
        
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
        
        <link rel="stylesheet" href='css/startseite.css'>
        <link rel="stylesheet" href='css/lightbox.css'>
        
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        
        <?php
            
            include 'database.php';
            
            //Artikel selektieren
            $result = mysqli_query($mysqli, "SELECT * FROM articles ORDER BY created_at DESC");
            
            //Variablen deklarieren
            $articlesTotal = mysqli_num_rows($result);
            $articlesPerPage = 4;
            $articleIndex = 1;
            
            if(isset($_GET["more"])) {
                $articlesPerPage = $_GET["more"] * 2 + $articlesPerPage; //Zwei neue Artikel bei Klick
            } else {
                $_GET["more"] = 0;
            }
            
            if($articlesPerPage > $articlesTotal) {
                
                $articlesPerPage = $articlesTotal;
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
                while(($row = mysqli_fetch_array($result)) && ($articleIndex <= $articlesPerPage)) {
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
                            echo '<a href="article_images/'.$row["img"].'" data-lightbox="img1"><img src="article_images/' . $row["img"] . '" class="img" alt="ArtikelThumbnail"></a>';
                        }
                        
                        if(strlen($row["content"]) > 850) {
                            
                            $text = nl2br(trim(substr($row["content"], 0, 850)))."...";
                        } else {
                            
                            $text = nl2br(trim(substr($row["content"], 0, 850)));
                        }
                    
                        echo "<p>".$text."</p><a class='viewAll' href='articles.php?id=" . $row["id"] . "'><strong>Ganzer Artikel</strong></a>";
                    ?>
                </div>
                
            </article>
            <?php
                if(!($articleIndex == $articlesPerPage)) {
                    echo "<hr>";
                }
                    $articleIndex++;
                
                }
                
                if(!($articlesPerPage == $articlesTotal)) {
                    
                    echo '<a id="more" href="index.php?more=' . ($_GET['more']+1) . '#footer"><strong>Mehr Artikel...</strong></a>';
                }
            ?>
            
        </main>
        
        <?php
            include 'footer.php';
            mysqli_close($mysqli);
        ?>
        
    </body>
</html>