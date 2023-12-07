<?php 

$bdd = new PDO("mysql:host=localhost;dbname=menbres;charset=utf8", "root", "");



if(isset($_POST['username'], $_POST['titre'], $_POST['contenu'])) {
    if(!empty($_POST['username']) AND !empty($_POST['titre']) AND !empty($_POST['contenu'])) {
        $username = htmlspecialchars($_POST['username']);

      /*
        $requete = $bdd->prepare("SELECT * FROM menbres.table_menbres WHERE username=?");
        $requete->execute([$username]); 
        $user = $requete->fetch();
          if (!$user) {
          
            $message = "username invalide...";
        } 
        */



        $titre = htmlspecialchars($_POST['titre']);
        $contenu = htmlspecialchars($_POST['contenu']);

        $ins = $bdd->prepare('INSERT INTO menbres.article (username, titre, contenu, date_creation)
        VALUES (?, ?, ?, NOW())');
        $ins->execute(array($username, $titre, $contenu));

    
        $message = "Contenu posté !";
    } else {
        $message = " Remplir tous les champs !";
    }
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
                background-color: #147AF5; 
                height: 100vh;
             }

             .container{
                margin-top: 200px;
                margin-bottom: 50px;
                height: auto;
                width: auto;
                display: flex;
                justify-content: center;
             }
        </style>
    </head>    
 <nav id="topnav">
         <a id="logo" class="nav-link" href="index.php">Accueil</a>
         <a class="nav-link" href="zindex.php">Listes</a>

         <a id="about" class="nav-link" href="admin.php">Admin</a>
      </nav>

        <body>

        <center><div style="background-color:red">
            <font color="white"> 
              <?php if(isset($message)) echo $message;?> 
            </font>
          </div></center> 
          <br />

<div class="container">
            <form method="post">
                <input class="area" type="text" name="username" placeholder="username" /></br>
                <input class="area" type="text" name="titre" placeholder="titre" /><br/>
                <textarea class="area" name="contenu" placeholder="Contenu de l'article"></textarea><br/>
                <input class="send" type="submit" value="Envoyer" />
            </form>
            <br />
</div>
           
            
<center><div class="mess"  style="background-color:red">
            <font color="white"> 
              <?php if(isset($message)) echo $message;?> 
            </font>
          </div></center> 
          <br />

          
          
        
        </body>
</html>
