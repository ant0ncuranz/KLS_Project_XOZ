<!DOCTYPE html>
    <html lang="de">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans'>
        
        <link rel="stylesheet" href='css/schulen.css'>
        
        <title>Königin-Luise-Stiftung</title>
        
        <!--[if IE]>
	       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if lte IE 7]>
	       <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
        <!--[if lt IE 7]>
           <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->
        
        <?php
            $art = "";
            
            if(isset($_GET["art"])) {
                $art = $_GET["art"];
            }
        ?>
        
    </head>

    <body>
        
        <?php include "header.php"; ?>
        
        
        <main>
            
            <article id="kontaktdaten" class="article">
                
                <header class="article_header">
                    <h2 class="article_title">
                    <?php
                        if($art == "grundschule") {
                            echo "Grundschule";
                        } elseif($art == "sekundarschule") {
                            echo "Sekundarschule";
                        } elseif($art == "gymnasium") {
                            echo "Gymnasium";
                        } else {
                            echo "Schulen";
                        }
                    ?>
                    </h2>
                
                </header>
                
                <div class="article_content">
                    <?php
                        $seiten = array('grundschule' => 1,'sekundarschule' => 1,'gymnasium' => 1);
                        if($seiten[$art])
                        {
                            echo  (nl2br(file_get_contents(dirname(__FILE__).'/'.$art.'.txt')));
                        }
                        else
                        { 
                    ?>
                        <p>Bitte wählen sie eine der verschiedenen Schularten unten aus.</p>
                    <div id="school_selection">
                        <a href="schulen.php?art=grundschule"><strong>Grundschule</strong></a>
                        <a href="schulen.php?art=sekundarschule"><strong>Sekundarschule</strong></a>
                        <a href="schulen.php?art=gymnasium"><strong>Gymnasium</strong></a>
                    </div>
                    
                    <?php } ?>
                </div>
                
            </article>
            
        </main>
        
        <?php include "footer.php"; ?>
        
    </body>
</html>