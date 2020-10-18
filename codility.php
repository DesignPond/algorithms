<?php

require __DIR__ . '/vendor/autoload.php';

$codility = new src\Codility();
$coursera = new src\Coursera();


$A = [1,3,5,2,4,6];


echo '<pre>';
print_r($coursera->countInv($A, count($A)));
//print_r($codility->checkSemiprime(4));

echo '</pre>';
exit;