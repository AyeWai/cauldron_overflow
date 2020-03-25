<?php

$start = microtime();

for ($i=0; $i<7000000; $i++) {
    $assign = "i : $i";
}

$end = microtime() - $start;

$start2 = microtime();

for ($i=0; $i<7000000; $i++) {
    $assign2 = 'i : ' . $i;
}

$end2 = microtime() - $start2;

$start3 = microtime();

for ($i=0; $i<7000000; $i++) {
    $assign2 = sprintf('i : %s', $i);
}

$end3 = microtime() - $start3;

echo "<br>temps guillemets : $end";
echo "<br>temps apostrophes : $end2";
echo "<br>temps sprintf : $end3";
