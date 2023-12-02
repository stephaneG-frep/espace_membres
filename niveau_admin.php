<?php require 'include/header.php'; ?>
<title>Changement de role</title>
</head><body>
</div>
<?php
if(!in_array($_SESSION['role'], [1])){
    header('Location: connexion.php');
    exit;
}
    $bdd = new PDO("mysql:host=localhost;dbname=menbres;charset=utf8", "root", "");
 
    if(isset($_SESSION['id'])){

    $req = $bdd->prepare('SELECT u.*, ar.libelle FROM 
    menbres.table_menbres u
    LEFT JOIN admin ar ON ar.role = u.role
    WHERE u.id <> ?');
    $req->execute([$_SESSION['id']]);
    $req_list_user = $req->fetchAll();

    $req = $bdd->prepare('SELECT * FROM menbres.admin');
    $req->execute();
    $req_list_role = $req->fetchAll();

    $tab_liste_role = [];

    foreach($req_list_role as $r){
        array_push($tab_liste_role, [$r['role'], $r['libelle']]);
    }

    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        if(isset($_POST['modifier'])){
            $id_user = (int) $id_user;
            $role = (int) $role;


        $req = $bdd->prepare('SELECT * FROM menbres.admin WHERE role = ?');
        $req->execute([$role]);
        $verif_role = $req->fetch();

        if(!$verif_role){
            $valid = false;
            $message = "Ce role n\'existe pas";
        }
        if($valid){
            $req = $bdd->prepare("UPDATE menbres.table_menbres SET role = ? WHERE id = ?");
            $req->execute([$verif_role['role'], $id_user]);
            header('Location: niveau_admin.php');
        }

        }
    }
    }

?>

<div id="login">
        <h1 class="text-center text-white pt-5">Page de changement de niveau du role  </h1>
        <div class="container">


            
            <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">

                    <center><div class="container" style="background-color: red;">
                        <font color="white"><?php if(isset($message))echo $message; ?></font>
                        </div></center> 

                <?php 
                foreach($req_list_user as $r){
                ?>
                <form id="login-form" class="form" action="" method="post">
                <div style="margin: 15px;">
                <div style="color:#994D1C; font-weight: bold; font-size: 2rem"> <?= $r['username']?></div>
                </br>                  
                <select name="role">
                    <option value="<?= $r['role']?>" hidden><?= $r['libelle']?></option>
                    <?php
                        foreach($tab_liste_role as $tr){
                    ?>
                    <option value="<?= $tr['0']?>"><?= $tr['1']?></option>
                    <?php
                    }
                    ?>
                </select>
                </br>
                <input type="hidden" name="id_user" value="<?= $r['id']?>" />
                <button type="submit" name="modifier" style="margin: 15px;">Modifier</button>
                </br>
                </div>
                </form>
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