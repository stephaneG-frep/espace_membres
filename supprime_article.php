<?php
session_start();
require 'include/start_bdd.php';
//$bdd = new PDO("mysql:host=localhost;dbname=menbres;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM menbres.article WHERE id = ?');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() > 0){

        $supprimeArticle = $bdd->prepare('DELETE FROM menbres.article WHERE id = ?');
        $supprimeArticle->execute(array($getid));

        header('Location: admin.php');

    }else{
        $message = "Aucun menbre trouvé...";
    }
}else{
    $message = "id non récupéré...";
}



?>



<center><div class="container" style="background-color: red;">
            <font color="white"><?php if(isset($message))echo $message; ?></font>
            </div></center> 