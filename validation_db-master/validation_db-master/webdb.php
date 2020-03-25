
<?php
//Explorer la base de données

// On se connecte à MySQL
<?php
try{
$pdo = new PDO(
    'mysql:host=localhost;dbname=valid_db',
    'admin',
    '1234',
);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM products');



// On affiche chaque entrée une à une
$donnees = $reponse->fetch();

echo $donnees['name']; 
$reponse->closeCursor(); // Termine le traitement de la requête


?>

