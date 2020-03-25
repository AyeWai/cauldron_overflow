<?php

$pdo = new PDO('mysql:host=localhost;dbname=armidewebservice', 'root', 'root');

$stmt = $pdo->prepare('INSERT INTO article ( [DOS], [REF], [USERCR], [DES]) VALUES (:dos, :ref, :usercr, :des)');

$stmt->bindParam(':[DOS]', $dos);
$stmt->bindParam(':[REF]', $ref);
$stmt->bindParam(':[USERCR]', $usercr);
$stmt->bindParam(':[DES]', $des);

$dos = $_POST['[DOS]'];
$ref = $_POST['[REF]'];
$usercr = $_POST['[USERCR]'];
$password = $_POST['[DES]'];

$stmt->execute();

if ($result = $stmt->fetchObject()) {
    header('Location: index.php');
    exit();
} else {
    echo 'Echec création article';
}
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
