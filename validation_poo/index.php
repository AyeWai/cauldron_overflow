<?php

#include 'Voiture.php';
#include 'Vehicule.php';

spl_autoload_register(function ($class_name) {
    include './classes/'.$class_name. '.php';
});

echo "Hello world !";

$voiture = new Voiture('bleu');
$voiture2 = new Voiture('bleu_ciel');
$voiture->couleur = 'rouge';
var_dump($voiture);

echo $voiture->avancer();
$voiture->repeindre('noir');
var_dump($voiture);
$voiture->avancer2();
var_dump($voiture);
$voiture->giveOil($voiture2, 50);
var_dump($voiture,$voiture2);
$voiture2->paint('black');
var_dump($voiture2);


$anakin = new Character(70,20);
$obi = new Character(125,15);

var_dump($anakin);
$anakin->attack($obi);
$obi->attack($anakin);
var_dump($anakin);
$obi->attack($anakin);
var_dump($anakin);

$magicien = new Mage('Isaac');
$magicien2 = new Mage('Hector');
var_dump($magicien);
var_dump($magicien);
$magicien->fireball($magicien2);
var_dump($magicien2);








?>
