<!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="utf-8" />
        
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
        
        <link rel="stylesheet" href='css/admin.css'>
        <link rel="stylesheet" href='css/lightbox.css'>
        
        <?php
            
            include 'database.php';
            
            //Artikel selektieren
            $result = mysqli_query($mysqli, "SELECT * FROM articles ORDER BY created_at DESC");
            
            //Variablen deklarieren
            $articlesTotal = mysqli_num_rows($result);
            $articlesPerPage = 4;
            $articleIndex = 1;
            
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
                    <p>Hier können Sie mithilfe des folgenden Formulars einen neuen Artikel schreiben.</p>
                    <br />
                    <form action="new_article.php" autocomplete="on" method="post" enctype="multipart/form-data">
                        <p>Titel:</p><input type="text" name="title" placeholder="Geben sie hier den Titel des Artikels ein..." required><br />
                        <p>Text:</p><textarea type="text" name="content" placeholder="Geben sie hier den Text des Artikels ein..." required></textarea><br />
                        <label for="imageUpload">Bild einbinden?</label><input type="file" name="imageUpload">
                        <p>Autor:</p><input type="text" name="author" placeholder="Geben sie hier ihren Namen ein..." required><br />
                        <input type="submit" value="Artikel fertigstellen">
                    </form>
                    <br />
                </div>
                
            </article>
            
            <hr>
            
            <article class="article">
                <header class="article_header">
                    <h2 class="article_title">Artikel bearbeiten</h2>
                </header>
                
                <div class="article_content">
                    <p>Wählen sie den zu bearbeiteden Artikel unten aus.</p>
                    <ul id="article_selection">
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                        <li><?php echo '<a href="edit_article.php?id=' . $row["id"] . '"><strong>' . $row["title"] . '</strong></a>' ?></a></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
                
            </article>
            
            </main>
        
        <?php
            include 'footer.php';
            mysqli_close($mysqli);
        ?>
        
    </body>
</html>