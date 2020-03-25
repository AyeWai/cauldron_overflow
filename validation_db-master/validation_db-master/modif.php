
<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifications et suppression</title>
</head>
<body>

	<p>M.<?php echo $_SESSION['nom']; ?>, quelle surprise !</p>
	<?php

		echo 'Grand test'.$_POST['ID'];

		//Quand il y a beaucoup de texte, il est préférable d'afficher du code html qu'un echo
		if(isset($_POST['ID']) && $_POST['Supprimer'] == true)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
			
			echo $_POST['ID'];
			echo $_POST['Supprimer'];
			$req = $bdd->prepare('DELETE FROM valid_db.users WHERE users.user_id =:u_id');
			$req->execute(array(
			'u_id' => $_POST['ID']
			));
			echo('Succès de la suppression');
		
		} 
		else
		{
			echo('Echec de la suppression');
		}

	?>	



</body>
</html>