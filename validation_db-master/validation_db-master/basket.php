<?php 

session_start();
//echo "role" . $_SESSION['role']. "\n";
//echo "pseudo" . $_SESSION['pseudo']. "\n";
//echo "mdp" . $_SESSION['mdp']. "\n";

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
            $req->closeCursor();
		
        }
        elseif(isset($_POST['ID']) && $_POST['Modifier'] == true)
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
			$req = $bdd->prepare('UPDATE valid_db.users SET users.fname =:u_fname , users.lname=:u_lname, users.capacity=:u_capacity WHERE users.user_id =:u_id');
			$req->execute(array(
            'u_id' => $_POST['ID'],
            'u_fname' => $_POST['Prenom'],
            'u_lname' => $_POST['Nom'],
            'u_capacity' => $_POST['Role'],
            ));
            $req->closeCursor();
			echo('Succès de la modification');
		
        }
        elseif(isset($_POST['ID']) && $_POST['Ajouter'] == true)
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
            echo $_POST['Prenom'];
            echo $_POST['Nom'];
            echo $_POST['Role'];
			$req = $bdd->prepare('INSERT INTO valid_db.users (user_id, fname, lname, capacity) VALUES (:u_id, :u_fname , :u_lname, :u_capacity)');
			$req->execute(array(
            'u_id' => $_POST['ID'],
            'u_fname' => $_POST['Prenom'],
            'u_lname' => $_POST['Nom'],
            'u_capacity' => $_POST['Role'],
            ));
            $req->closeCursor();
			echo('Succès de l\'ajout');
		
        }
        elseif(isset($_POST['P_ID']) && $_POST['P_Supprimer'] == true)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
			
			echo $_POST['P_ID'];
			echo $_POST['P_Supprimer'];
			$req = $bdd->prepare('DELETE FROM valid_db.products WHERE products.product_id =:u_id');
			$req->execute(array(
			'u_id' => $_POST['P_ID']
            ));
            $req->closeCursor();
			echo('Succès de la suppression');
		
        }
        elseif(isset($_POST['P_ID']) && $_POST['P_Modifier'] == true)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
			
			echo $_POST['P_ID'];
			echo $_POST['P_Supprimer'];
			$req = $bdd->prepare('UPDATE valid_db.products SET products.product_id =:u_id , products.name=:u_name, products.description=:u_description, products.create_date=:u_create_date, products.price=:u_price, products.img=:u_img WHERE products.product_id =:u_id');
            $t=time();
            $c_date =(date("Y/m/d H:i:s",$t));
            $req->execute(array(
            'u_id' => $_POST['P_ID'],
            'u_name' => $_POST['P_Nom'],
            'u_create_date' => $c_date,
            'u_description' => $_POST['P_Description'],
            'u_price' => $_POST['P_Prix'],
            'u_img' => $_POST['P_Image'],
            ));
            $req->closeCursor();
			echo('Succès de la modification');
		
        }
        elseif(isset($_POST['P_ID']) && $_POST['P_Ajouter'] == true)
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
            echo $_POST['Prenom'];
            echo $_POST['Nom'];
            echo $_POST['Role'];
			$req = $bdd->prepare('INSERT INTO valid_db.products (product_id, name, create_date, description, price, img) VALUES (:u_id, :u_name , CURRENT_TIMESTAMP(), :u_description, :u_price, :u_img)');
			$req->execute(array(
            'u_id' => $_POST['P_ID'],
            'u_name' => $_POST['P_Nom'],
            //'u_create_date' => $c_date,
            'u_description' => $_POST['P_Description'],
            'u_price' => $_POST['P_Prix'],
            'u_img' => $_POST['P_Image'],
            ));
            $req->closeCursor();
			echo('Succès de l\'ajout');
		
        }
        elseif(isset($_POST['U_ID']) && $_POST['U_Supprimer'] == true)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
			
			$req = $bdd->prepare('DELETE FROM valid_db.users WHERE users.user_id =:u_id');
			$req->execute(array(
            'u_id' => $_POST['U_ID'],
            ));
            $req->closeCursor();
			echo('Succès de la suppression');
		
        }
        elseif(isset($_POST['U_ID']) && $_POST['U_Modifier'] == true)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
			
			$req = $bdd->prepare('UPDATE valid_db.users SET users.user_id =:u_id , users.pseudo=:u_pseudo, users.mdp=:u_mdp WHERE users.user_id =:u_id');
            $req->execute(array(
            'u_id' => $_POST['U_ID'],
            'u_pseudo' => $_POST['U_Identifiant'],
            'u_mdp' => $_POST['U_Mdp'],
            ));
            $req->closeCursor();
			echo('Succès de la modification');
		
        }
        elseif(isset($_POST['U_ID']) && $_POST['U_Ajouter'] == true)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{       
					die('Erreur : '.$e->getMessage());
			}
            echo $_POST['U_ID'];
            echo $_POST['U_Identifiant'];
            echo $_POST['U_Mdp'];
			$req = $bdd->prepare('INSERT INTO valid_db.users (user_id, pseudo, mdp) VALUES (:u_id, :u_pseudo, :u_mdp)');
			$req->execute(array(
            'u_id' => $_POST['U_ID'],
            'u_pseudo' => $_POST['U_Identifiant'],
            'u_mdp' => $_POST['U_Mdp'],
            ));
            $req->closeCursor();
            echo('Succès de l\'ajout');
        }
        //else{
            //echo 'Echec modif';
        //} 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = NULL;
         }
?>	





<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href ="webdb3.css">
    <meta charset="UTF-8">
    </head>
    <body>
            <div class="col">
                    <div class="header">
                        <div class="row">
                                <nav class="col navbar navbar-expand-lg navbar-dark bg-success">
                                    <a class="navbar-brand" href="index.php">
                                        <img src="img/commodities_logo.png" width="120" height="90" alt="Site logo">
                                        Commodities Market
                                    </a>
                                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                        data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div id="navbarContent" class="navbar-collapse collapse" style="">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="index.php">Accueil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="login.php">Se connecter</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="basket.php">Panier                                                 </a>
                                            </li>
                                            <?php if($_SESSION['role'] == 1){
                                    echo '<li class="nav-item">';
                                        echo '<a class="nav-link" href="moderation.php">Modération</a>';
                                    echo '</li>';
                                        }
                                    ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                    </div>
                <div class="main">
<?php

 try
{
	$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{       
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT products.product_id, name, price, quantity FROM products, basket WHERE products.product_id = basket.product_id');

echo '<div class="row">
    <h1 class="text-center">Panier</h1>
    <table class="table table-striped table-success bg-light">
      <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix</th>
          </tr>
      </thead>
      <tbody>';

while ($donnees = $reponse->fetch())
{
    
    echo '    <tr>
              <th scope="row">'.$donnees['product_id'].'</th>
              <td>'.$donnees['name'].'</td>
              <td>'.$donnees['quantity'].'</td>
              <td>'.$donnees['price'].'</td>
              </tr>';
}
$reponse->closeCursor();
$reponse2 = $bdd->query('SELECT sumtotbask.total_price FROM sumtotbask');
$donnees2 = $reponse2->fetch();    
echo 
        '<tr>
            <th scope="row">Total</th>
            <td></td>
            <td></td>
            <td>'.$donnees2['total_price'].'</td>
        </tr>
      </tbody>
  </table>
</div>';

$reponse2->closeCursor();

?>

<!-- <?php

    
    echo'
    <div class="row">
    <div class="col-12">
    
    <span class="input-group button">
    <button type="submit" class="btn btn-success" value="true" name="Ajouter">Ajouter</button>
    <button type="submit" class="btn btn-light" value="true" name="Modifier">Modifier</button>
    <button type="submit" class="btn btn-danger" value="true" name="Supprimer">Supprimer</button>
    </span>

    </div>
    </div>
    ';

?> 
-->

<button type="button" class="logout btn btn-danger"><a href="logout.php">Déconnexion</a></button>

                
              </div>
            </div>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script src="webdb.js"></script>      
    </body>
</html>
