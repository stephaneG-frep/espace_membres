<?php

$bdd = new PDO("mysql:host=localhost;dbname=menbres;charset=utf8", "root", "");




if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);

    $article = $bdd->prepare('SELECT * FROM menbres.article  WHERE id = ?');
    $article->execute(array($get_id));


    if($article->rowCount() == 1) {
        $article = $article->fetch();
        $username = $article['username'];
        $titre = $article['titre'];
        $contenu = $article['contenu'];


    } else {
        die('Ce commentaire n\'éxiste pas ! ');
    }
} else {
    die('Erreur');
}

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
        background-color: #5b8e7d; 
        height: 100vh;
    }
    .container{
        margin-top: 100px;
        height: auto;
        width: auto;
        display: flex;
        justify-content: center;
    }
    .table{
        background-color: darkgray;
    }
    h1{
        color: #023047;
        font-size: 3rem;;
    }
    </style>

    </head>
    <nav id="topnav">
        <a id="logo" class="nav-link" href="index.php">Accueil</a>
        <a class="nav-link" href="redaction.php">Rédaction</a>
        <a class="nav-link" href="zindex.php">Listes</a>

        <a id="about" class="nav-link" href="admin.php">Admin</a>
    </nav>
<body>
    <div class="container">
    <table class="table">
        <caption><h1>Tous vos messages</h1> </caption>
        <thead>
            <tr>

                
                <th><h1 style="color: #52796f; font-size: 1.2rem"><?= $username ?></h1><br/></th>
                <th>              </th>
                <th><h1 style="color: #073b4c; font-size: 1.4rem"><?= $titre ?></h1><br/></th>
                <th>              </th>
                <th><p style="font-size: 1rem"><?= $contenu ?></p></th>
            </tr>
        </thead>
    </table>
    </div>

    
</body>
</html>
