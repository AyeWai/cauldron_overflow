<?php

session_start();
//echo "role" . $_SESSION['role']. "\n";
//echo "pseudo" . $_SESSION['pseudo']. "\n";
//echo "mdp" . $_SESSION['mdp']. "\n";
$_POST['inputLogin'] ="";

 ?>

<html>
    <head>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href ="webdb.css">
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
            <div class="row">
            <?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=valid_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{       
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT name, description, price, img FROM products WHERE product_id not in (7,8,9)');
$count = 1;

while ($donnees = $reponse->fetch())
{
    echo '<div class="col-md-4">
    <div class="card mb-4 box-shadow">
    <img class="card-img-top" src='.$donnees['img'].' alt="'.$donnees['name'].'">
    <div class="card-body">
        <p class="card-text">'.$donnees['description'].'</br>'.'</br>'.$donnees['name'].'   : '.$donnees['price'].'</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="input-group">
                <span class="input-group button">
                    <button type="button" class="btn btn-success">Acheter</button>
                    <button type="button" name = "'.$count.'" class="less btn btn-outline-success">-</button>
                    <div class="col-2 align-items-center">
                        <input type="text" id="quantity_'.$count.'" class="form-control input-number" value="1" min="1" max="100">
                    </div>
                    <button type="button" name="'.$count.'" class="more btn btn-outline-success ">+</button>
                </span>
            </div>
        </div>
    </div>
</div>
</div>';

$count +=1;

}

$reponse->closeCursor();

if($_SESSION['role'] == 1 OR $_SESSION['role'] == 2){
$reponse2 = $bdd->query('SELECT name, description, price, img FROM products WHERE product_id in (7,8,9) ');
while ($donnees2 = $reponse2->fetch())
{
    echo '<div class="col-md-4">
    <div class="card mb-4 box-shadow">
    <img class="card-img-top" src='.$donnees2['img'].' alt="'.$donnees2['name'].'">
    <div class="card-body">
        <p class="card-text">'.$donnees2['description'].'</br>'.'</br>'.$donnees2['name'].'   : '.$donnees2['price'].'</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="input-group">
                <span class="input-group button">
                    <button type="button" class="btn btn-success">Acheter</button>
                    <button type="button" name = "'.$count.'" class="less btn btn-outline-success">-</button>
                    <div class="col-2 align-items-center">
                        <input type="text" id="quantity_'.$count.'" class="form-control input-number" value="1" min="1" max="100">
                    </div>
                    <button type="button" name="'.$count.'" class="more btn btn-outline-success ">+</button>
                </span>
            </div>
        </div>
    </div>
</div>
</div>';

$count +=1;
}
$reponse2->closeCursor();
}
?>
            </div>
        </div>
    </div>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script src="webdb.js"></script>     
    </body>
</html>