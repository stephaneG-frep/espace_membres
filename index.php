<?php require 'include/header.php';
     ?>

<title>Accueil</title>
</head><body>

<style>
    p, h3{
  animation-duration: 6s;
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
    h1, h5{
    animation-duration: 6s;
    animation-name: slideout;;
  }
  @keyframes slideout {
  from {
    margin-top: 100%;
    width: 300%;
  }
  to {
    margin-top: 0%;
    width: 100%;
  }
}

</style>
</div>
<h1 class="text-center text-white pt-5">Page d'Accueil</h1>
</br>
<h3 class="text-center text-dark-50 pt-3">Bienvenue sur l'application Loto++</h3>
</br>
<h5 class="text-center text-warning pt-6">Vous n'avez pas d'idées pour les numéros
    de votre loto?</h5>
<p class="text-center text-white pt-6">Laissez-vous guider par les boules de l'appli...
    et Bonne Chance !
</p>



    <canvas></canvas>

<script src="include/app.js"></script>



</body>
</html>
