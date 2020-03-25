<?php

$name = 'Julien';

$displayInformation = function () use ($name) {
    echo sprintf("Hello %s!\n", $name);
};

$displayInformation();