<?php

class Character
{
    // (Classe de personnage)

    public $name;
    private $lifePoints = 100;
    public $magicPoints = 100;
    public $attack;

    function __construct(string $name) {
        $this->name = $name;
    }

    public function getLifePoints() {
        return $this->lifePoints;
    }

    public function setLifePoints($dmg) {
        $this->lifePoints -= $dmg;
        if ($this->lifePoints < 0) {
            $this->lifePoints = 0;
        }
        return;
    }

    public function attack(Character $target) {
        $attack = rand(5, 15);
        $target->setLifePoints($attack);
        $status = "$this->name attaque {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";
        return $status;
    }
}