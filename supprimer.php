<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=menbres;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM menbres.table_menbres WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){

        $supprimeUser = $bdd->prepare('DELETE FROM menbres.table_menbres WHERE id = ?');
        $supprimeUser->execute(array($getid));

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