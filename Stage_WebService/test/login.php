<?php

$pdo = new PDO('mysql:host=localhost;dbname=armidewebservice', 'root', 'root');


$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username and password = :password');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

$username = $_POST['username'];
$password = $_POST['password'];

$stmt->execute();

if ($result = $stmt->fetchObject()) {
    header('Location: index.php');
    exit();
} else {
    echo 'Not logged in';
}
?>

<form method="post">
    <label>Username :
    <input type="text" name="username">
    </label>
    <label>Password :
    <input type="password" name="password">
    </label>
    <input type="submit">
</form>
