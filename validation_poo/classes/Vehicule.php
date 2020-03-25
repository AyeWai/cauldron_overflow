<?php


class Vehicule
{
    protected $couleur;
    function __construct($couleur)
    {
        $this->couleur=$couleur;
    }

    public function paint($couleur){
        $this->couleur=$couleur;
    }

}