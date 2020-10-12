<?php

require __DIR__ . '/vendor/autoload.php';

$codility = new src\Codility();

$A[0] = 3;
$A[1] = 1;
$A[2] = 2;
$A[3] = 3;
$A[4] = 6;

echo '<pre>';
//print_r($codility->sieve(12));
print_r($codility->countNonDivisible1($A));
echo '</pre>';
exit;