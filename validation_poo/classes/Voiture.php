<?php


class Voiture extends Vehicule
{
    private $nb_roues = 4;
    public $couleur;
    public $tank = 100;


    function __construct($couleur)
    {
       $this->couleur = $couleur;
    }

    function avancer(){
        return "Vroum Vroum";
    }
    function repeindre($couleur){
        return $this->couleur = $couleur;
    }
    function avancer2(){
        $this->tank -= 15;
        return "Vroum Vroum";
    }
    function giveOil($voiture, $qte){
        $this->tank -= $qte;
        $voiture->tank += $qte;

}
}