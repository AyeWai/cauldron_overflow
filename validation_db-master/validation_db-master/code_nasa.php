
<?php session_start(); ?>
<?php setcookie('temps', 'gfgyhh', time() + 365*24*3600, null, null, false, true); // On écrit un cookie dans lequel on écrit le temps de connexion
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nasa codes d'accès</title>
</head>
<body>

	<p>M.<?php echo $_SESSION['nom']; ?>, quelle surprise !</p>
	<p>Comment allez vous depuis votre connexion le <?php $_COOKIE['temps']; ?></p>
	<?php

	//Quand il y a beaucoup de texte, il est préférable d'afficher du code html qu'un echo
		if(isset($_POST['mdp']) && $_POST['mdp'] == '02069300')
		{
			echo('sdf0s3sdq065fsd01f0230');
		} 
		else
		{
			echo('Mot de passe incorrect');
		}

	?>	



</body>
</html>