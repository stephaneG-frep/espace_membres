<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="include/bootstrap.min.css">
  <link href="include/style.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #3d5e43ec;
      height: 100vh;
    }

    #login .container #login-row #login-column #login-box {
      margin-top: 20px;
      margin-bottom: 50px;
      max-width: 600px;
      height: auto;
      border: 4px solid cadetblue;
      background-color: #dcc72e;
      box-shadow: 20px 20px 20px black;
    }

    #login .container #login-row #login-column #login-box #login-form {
      padding: 30px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
      margin-top: -85px;
    }

    .navbar{
  animation-duration: 1s;
  animation-name: slidein;
}
@keyframes slidein {
  from {
    margin-left: 100%;
    width: 300%;
  }
  to {
    margin-left: 0%;
    width: 100%;
  }
}
  </style>

  <div class="navbar navbar-expand navbar-dark bg-dark">
    <nav class="navbar bg-body-tertiary">
      <form class="container-fluid justify-content-start">
        <a class="navbar-brand m-2 text-white" href="index.php">Accueil</a>
        <ul class="navbar-nav ">

        </ul>

        <ul class="navbar-nav">

          <?php
          if (isset($_SESSION['id'])) {
          ?>
            <button type="button" class="btn btn-outline-danger mx-2"><a href="deconnexion.php"> Deconnexion</a></button>
            <button type="button" class="btn btn-outline-secondary mx-2"><a href="profil.php">Profil</a></button>
            <?php
            if(in_array($_SESSION['role'],[1])){
            ?>
            <button type="button" class="btn text-warning bg-light btn-outline mx-2"><a href="admin.php">Admin</a></button>
            <?php 
            }
            ?>
            <button type="button" class="btn btn-warning btn-outline mx-2"><a href="euro_million.html">Euro-Millions</a></button>
          <?php
          } else { ?>
            

            <li class="nav-item mx-2"><a class="nav-link text-danger" href="">••[»»» Inscrivez-vous, n'hésitez plus. ••[»»»</a></li>

            <button type="button" class="btn btn-outline-warning mx-2"><a href="inscription.php">Inscription</a></button>
            <button type="button" class="btn btn-warning btn-outline mx(2"><a href="connexion.php">Connexion</a></button>
        </ul>
    </nav>
    <?php
}
?>
    </form>
  </div>





<body>

</html>