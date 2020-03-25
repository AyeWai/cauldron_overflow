<?php
    session_start();
    $_SESSION['role'] = 3;
    $_SESSION['prenom'] = 'Utilisateur';
    $_SESSION['nom'] = 'Temporaire';
?>


<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="webdb2.css">
    <title>Page de déconnexion</title>
  </head>

  <body class="text-center">
  <row>
  <col class="align_deco col-4">
      <div class="smthing"><img class="mb-4" src="img/commodities_logo.png" alt="main_logo" width="150" height="150"></a></div>
      <h1 class="h3 mb-3 font-weight-normal">Déconnexion</h1>
      <p>Vous êtes bien déconnecté, revenir à l\'accueil</p>
      <button class="btn btn-lg btn-primary btn-block bg-success mb-4" type="submit"><a href="index.php">Se déconnecter</a></button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
      </col>
</row>
  </body>
</html>