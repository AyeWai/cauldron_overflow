<?php
$mysql = 'mysql:host=localhost;dbname=armidewebservice';

try {
    $db = new PDO($mysql, 'root', '' );
    $sql = 'INSERT [CE1], [DOS], [REF], [USERCR], [DES] INTO article';
    $result = $db->query($sql);
    $errorInfo = $db->errorInfo();
    if (isset($errorInfo[2])) {
        $error = $errorInfo[2];
    }
} catch (PDOException $e) {
    $error = $e->getMessage();

}
?>

<form method="post">
    <label>
        <input name="text1" placeholder="[CE1]" required/>
    </label>
    <label>
        <input name="text2" placeholder="[DOS]" required/>
    </label>
    <label>
        <input name="text3" placeholder="[REF]" required/>
    </label>
    <label>
        <input name="text4" placeholder="[USERCR]" required/>
    </label>
    <label>
        <input name="text5" placeholder="[DES]" required/>
    </label>

    <button type="submit">Soumettre</button>
</form>
