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
$req = $bdd->prepare('INSERT INTO article (`[DOS]`, `[REF]`, `[USERCR]`, `[DES]`) VALUES(:DOS, :REF, :USERCR, :DES)');

if (isset($_POST["DOSform"], $_POST["REFform"], $_POST["USERCRform"], $_POST["DESform"])){


$dosForm = $_POST["DOSform"];
$refForm = $_POST["REFform"];
$usercrForm = $_POST["USERCRform"];
$desForm = $_POST["DESform"];


try
{
    // On se connecte à MySQL
$req->execute(array(
    'DOS'=> $dosForm,
    'REF'=> $refForm,
    'USERCR'=> $usercrForm,
    'DES'=> $desForm,
    ));
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
        die('Echec création article : '.$e->getMessage());
}


    echo $_POST["DOSform"];
    echo $_POST["REFform"];
    echo $_POST["USERCRform"];
    echo $_POST["DESform"];


$req->closeCursor(); 

}
?>


<body>
    <p>
        <form action="article.php" method="post">
            <input type="text" placeholder ="DOS" name="DOSform" required maxlength="8">
            <input type="text" placeholder ="REF" name="REFform" required maxlength="25">
            <input type="text" placeholder ="USERCR" name="USERCRform" required maxlength="20">
            <!--<input type="text" placeholder ="DES" name="DESform" required maxlength="80">-->
            <textarea type="text" rows= "10" cols ="40" placeholder ="DES" name="DESform" required maxlength="80" ></textarea>
            <input type="submit" value="Soumettre">
        </form>
    </p>

</body>