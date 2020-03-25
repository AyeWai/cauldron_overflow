<?php


class Mage extends Character
{
    //rivate $mana = 100;
    public $attack;

    public function __construct(string $name)
    {
        parent::__construct($name);

    }
    public function stab(Character $target){

    }

    public function fireball(Character $target){
        $attack = rand(5,10);
        $this->magicPoints -= $attack;
        $attack = 2* $attack;
        $target->setLifePoints($attack);
    }
}