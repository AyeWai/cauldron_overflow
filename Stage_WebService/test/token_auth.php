<?php 

//Create token header as a JSON string
$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256', 'exp' =>3600000]);


// Connexion avec le serveur

$bdd = new PDO('mysql:host=localhost;dbname=armidewebservice;charset=utf8', 'root', '');


//Insertion de donnees de la table

$req = $bdd->prepare('SELECT * FROM article');
$res = $req->execute();

while($res = $req->fetch()){

	//echo $res["[USERCR]"];

// Create token payload as a JSON string
$payload = json_encode(['user_id' => $res["[USERCR]"]]);

// Encode Header to Base64Url String
$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

// Encode Payload to Base64Url String
$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

// Create Signature Hash
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);

// Encode Signature to Base64Url String
$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

// Create JWT
$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

echo $jwt;
echo "\n";

}

$req ->closeCursor();


?>