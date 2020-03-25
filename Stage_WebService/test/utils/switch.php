<?php

$var = 2;
$varEqualOne = 1 == $var;
$varEqualTwo = 2 == $var;

switch (true) {
    case $varEqualOne:
        echo "var : 1";
        break;
    case $varEqualTwo:
        echo "var : 2";
        break;
    default:
        echo "Default";
}