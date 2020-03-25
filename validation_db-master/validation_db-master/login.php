<?php 

    session_start();
;?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="webdb2.css">
    <title>Page de connexion</title>
  </head>

  <body class="text-center">
    <form class="form-signin" method='POST'>
      <div class="smthing"><a href="index.php"><img class="mb-4" src="img/commodities_logo.png" alt="main_logo" width="150" height="150"></a></div>
      <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
      <label for="inputLogin" class="sr-only">Pseudo</label>
      <input type="text" name="inputLogin" class="form-control" placeholder="Identifiant" required autofocus>
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
        <?php 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{       
        die('Erreur : '.$e->getMessage());
}

if (isset($_POST['inputLogin'])){

$reponse = $bdd->query('SELECT pseudo, mdp FROM users WHERE users.capacity = 1');
$donnees = $reponse->fetch();

$reponse2 = $bdd->prepare('SELECT pseudo, mdp, capacity FROM users WHERE pseudo = :u_pseudo AND mdp = :u_mdp');
$reponse2->execute(array(
  'u_pseudo' => htmlspecialchars($_POST['inputLogin']),
  'u_mdp' => htmlspecialchars($_POST['inputPassword']),
  ));
$donnees2 = $reponse2->fetch();



if (($_POST['inputLogin'] != $donnees2['pseudo']) OR ($_POST['inputPassword'] != $donnees2['mdp']))
{
    //echo "echec!";
    //echo $_POST['inputLogin'];
    //echo $_POST['inputPassword'];
    //echo $donnees['pseudo'];
    //echo $donnees['mdp'];
    $_SESSION['role'] = 3;
    $_SESSION['prenom'] = 'Utilisateur';
    $_SESSION['nom'] = 'Temporaire';
    echo '<div class="alert alert-danger" role="alert">
      Identifiant et/ou mot de passe incorrect
    </div>';
    //header('Location: index.php');
    $reponse->closeCursor();
}
else if (isset($donnees2) )
{   
    //echo "reussite!";
    $_SESSION['role'] = $donnees2['capacity'];
    $_SESSION['pseudo'] = $donnees2['pseudo'];
    $_SESSION['mdp'] = $donnees2['mdp'];
    $reponse2->closeCursor();
    header('Location: index.php');


}
else if (($_POST['inputLogin'] == $donnees['pseudo']) OR ($_POST['inputPassword'] == $donnees['mdp']))
{   
    //echo "reussite!";
    header('Location: index.php'); 
    $_SESSION['role'] = 1;
    $reponse->closeCursor();
    header('Location: index.php');
}

}
?>
      </div>
      <button class="btn btn-lg btn-primary btn-block bg-success" type="submit">Se connecter</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>


  </body>
</html>

