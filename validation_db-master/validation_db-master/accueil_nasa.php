<?php session_start(); ?>

<?php
setcookie('temps', '22h', time() + 365*24*3600, null, null, false, true); // On écrit un cookie dans lequel on écrit le temps de connexion
setcookie('date', '28/09/2019', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...la date les null etc c'est pour le cookie en sécu httponly

// Et SEULEMENT MAINTENANT, on peut commencer à écrire du code html
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Accueil NASA</title>
</head>

<body>
<?php
// On démarre la session AVANT d'écrire du code HTML


// On s'amuse à créer quelques variables de session dans $_SESSION
$_SESSION['prenom'] = 'Chris';
$_SESSION['nom'] = 'SIMON';
$_SESSION['age'] = 26;
?>
	<p>Bonjour <?php echo $_SESSION['prenom']; ?> !</p>	

	<form action = 'code_nasa.php' method='POST'>

		<p><label for ='mdp'>Code : </label>
			<input type = 'password' name='mdp' placeholder="******">
		</p>
		<p><input type="submit"></p>
	</form>


	<?php //Ou en utilisant une page unique qui sera rechargée 

// Le mot de passe n'a pas été envoyé ou n'est pas bon
if (!isset($_POST['mot_de_passe']) OR $_POST['mot_de_passe'] != "kangourou")
{
	// Afficher le formulaire de saisie du mot de passe
}
// Le mot de passe a été envoyé et il est bon
else
{
	// Afficher les codes secrets
}

?>

</body>
</html>