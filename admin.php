<?php require 'include/header.php';
require "include/start_bdd.php"; ?>

<title>Profil de <?= $req_user['username'] ?></title>
</head><body style="background-color: darkslateblue;">
</div>
<?php
if(!in_array($_SESSION['role'], [1, 2])){
    header('Location: connexion.php');
    exit;
}
    //$bdd = new PDO("mysql:host=localhost;dbname=menbres;charset=utf8", "root", "");
    //session_start();
    if(isset($_SESSION['id'])){

    $req = $bdd->prepare('SELECT * FROM menbres.table_menbres
    WHERE id = ?');
    $req->execute([$_SESSION['id']]);
    $req_user = $req->fetch();

    switch($req_user['role']){
        case 0:
            $role = 'utilisateur';
    break;
        case 1:
            $role = 'admin';
    break;
        case 2:
            $role = 'moderateur';
    break;
    }

?>
    <div id="login">
        <h1 class="text-center text-white pt-5">Page admin de <?= $req_user['username'] ?> </h1>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6" style="color:darkred">
                    <div id="login-box" class="col-md-12" style="background-color:burlywood;">

                <table style="margin: 15px; font-size: 1rem">
                    <tr>
                        <td>Nom d'utilisateur: </td><td><?=$_SESSION['username'] ?></td>
                    </tr>                    
                    <tr>
                        <td>Adresse email:  </td><td><?=$_SESSION['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Role:  </td><td><?= $role ?></td>
                    </tr>
                    <tr>
                        <td><a href="modif_profil.php">Modifier mon profil : </a>  </td>
                    </tr>

                </table>

                <a href="niveau_admin.php" style="margin:10px">Supprimer ou modifier le role d'un membres</a>
                </br>
                <a href="admin_article.php" style="margin: 10px;">Supprimer des articles</a>
                </br>

<?php

    }
?>


                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>                 