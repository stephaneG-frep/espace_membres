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
                margin-left: 100px;
                margin-top: 100px;
                height: auto;
                width: auto;
                display: flex;
                justify-items: flex-start;
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
        <h1 style="color:darkslateblue">Liste des messages</h1>
            <ul>
                <?php while($a = $article->fetch()) { ?>
                <li style="color:burlywood; font-size: 1.4rem"><a style="color: lightgreen;"  href="article.php?id=<?= $a['id'] ?>">
                <?= $a['titre'] ?></li>
                <?php } ?>
            </ul>
        </div>

       
        </body>
</html>
