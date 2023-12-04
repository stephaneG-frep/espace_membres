
<?php

$bdd = new PDO("mysql:host=localhost;dbname=menbres;charset=utf8", "root", "");


$article  = $bdd->query('SELECT * FROM menbres.article ORDER BY date_creation DESC');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rédaction</title>
        <meta charset="utf_8">
        <link rel="stylesheet" href="include/article.css">

        <style>
            body{
                margin: 0;
                padding: 0;
                background-color: #147AF5; 
                height: 100vh;
             }
             .container{
                margin-top: 100px;
                height: auto;
                width: auto;
                display: flex;
                justify-content: center;
             }
             li{

             }
        </style>
    </head>
<nav id="topnav">
         <a id="logo" class="nav-link" href="index.php">Accuiel</a>
         <a class="nav-link" href="redaction.php">Rédaction</a>
         <a class="nav-link" href="zindex.php">Listes</a>

         <a id="about" class="nav-link" href="admin.php">Admin</a>
      </nav>

        <body>
        <div class="container">
            <ul>
                <?php while($a = $article->fetch()) { ?>
                <li style="margin-left: 20px; font-size: 2rem"><a href="article.php?id=<?= $a['id'] ?>">
                <?= $a['titre'] ?><a href="supprime_article.php?id=<?= $a['id']; ?>" 
                style="font-size: 1.2rem; margin-left: 20px;">Supprimer</a></div></li>
                <?php } ?>
            </ul>            
        </div>

    
    </body>
</html>
