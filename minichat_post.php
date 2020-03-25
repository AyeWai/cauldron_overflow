<?php

$pdo = new PDO('mysql:host=localhost;dbname=openclassrooms', 'root', '');

$stmt = $pdo->prepare('INSERT INTO minichat ( pseudo, message) VALUES (:pseudo_form, :message_form)');

$pseudo = $_POST['pseudo'];
$message = $_POST['message'];


$req ->execute(array(
    'pseudo_form' => $pseudo,
    'message_form' => $message,
));

if ($result = $req->fetchObject()) {
    header('Location: minichat.php');
    exit();
} else {
    echo 'Echec insertion conversation';
}

header('Location: minichat.php');

?>

<form method="post">
    <label>
        <input name="[DOS]" placeholder="[DOS]" required/>
    </label>
    <label>
        <input name="[REF]" placeholder="[REF]" required/>
    </label>
    <label>
        <input name="[USERCR]" placeholder="[USERCR]" required/>
    </label>
    <label>
        <input name="[DES]" placeholder="[DES]" required/>
    </label>

    <button type="submit">Soumettre</button>
</form>
