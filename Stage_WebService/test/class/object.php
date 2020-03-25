<?php
class Car {
    public $speed;

    public function __construct($speed = null) {
        $this->speed = $speed ?: 0;

    }

    public function start() {
        echo "Car started\n";

        return $this;
    }

    public function getSpeed() {
        echo "Car speed: $this->speed\n";

        return $this;
    }

    public function accelerate($speed) {
        $this->speed = $speed;

        return $this;
    }
}

$car = new Car(50);
$car
    ->getSpeed();
