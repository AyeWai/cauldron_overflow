<?php

try
{
    // On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=armidewebservice;charset=utf8', 'root', '');
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video    
$req = $bdd->prepare('INSERT INTO commande (Nom,Type,Interclassement, Attributs,Null,Valeur par défaut,Commentaires,Extra,Action) VALUES(:Nom,:Type,:Interclassement, :Attributs,:Null,:Valeur par défaut,:Commentaires,:Extra,:Action');

if (isset($_POST["Nom"],
$_POST["Type"],
$_POST["Interclassement"],
$_POST["Attributs"],
$_POST["Null"],
$_POST["Valeur par défaut"],
$_POST["Commentaires"],
$_POST["Extra"],
$_POST["Action"])){


$nomForm = $_POST["Nom"];
$typeForm = $_POST["Type"];
$interclaForm = $_POST["Interclassement"];
$attrForm = $_POST["Attributs"];
$nullForm = $_POST["Null"];
$vpdForm = $_POST["Valeur par défaut"];
$comForm = $_POST["Commentaires"];
$extraForm = $_POST["Extra"];
$actForm = $_POST["Action"];

$req->execute(array(
    'Nom'=> $nomForm,
    'Type'=> $typeForm,
    'Interclassement'=> $interclaForm,
    'Attributs'=> $attrForm,
    'Null'=> $nullForm,
    'Valeur par défaut'=> $vpdForm,
    'Commentaires'=> $comForm,
    'Extra'=> $extraForm,
    'Action'=> $actForm,
    ));

    echo $_POST["Nom"];
    echo $_POST["Type"];
    echo $_POST["Interclassement"];
    echo $_POST["Attributs"];
    echo $_POST["Null"];
    echo $_POST["Valeur par défaut"];
    echo $_POST["Commentaires"];
    echo $_POST["Extra"];
    echo $_POST["Action"];


if ($res = $req->fetchObject()){
    echo "Commande crée";
    exit();
}else{
    echo "Echec création commande";
}


$req->closeCursor(); 

}
?>


<body>
    <p>
        <form action="commande.php" method="post">
            <input type="text" placeholder ="Nom" name="Nom" required>
            <input type="text" placeholder ="Type" name="Type" required>
            <input type="text" placeholder ="Interclassement" name="Interclassement" required>
            <input type="text" placeholder ="Attributs" name="Attributs" required>
            <input type="text" placeholder ="Null" name="Null" required>
            <input type="text" placeholder ="Valeur par défaut" name="Valeur par défaut" required>
            <input type="text" placeholder ="Commentaires" name="Commentaires" required>
            <input type="text" placeholder ="Extra" name="Extra" required>
            <input type="text" placeholder ="Action" name="Action" required>
            <input type="submit" value="Soumettre">
        </form>
    </p>

</body>

