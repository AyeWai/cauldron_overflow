<?php

$date = new DateTime();
$dateInterval = new DateInterval('P10D');

$formattedDate = $date
    ->add($dateInterval)
    ->format('d-m')
;

echo $formattedDate;