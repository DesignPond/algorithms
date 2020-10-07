<?php

require __DIR__ . '/vendor/autoload.php';

$math = new src\Math();
$cake = new src\Cake();

$A[0] = 3;
$A[1] = 4;
$A[2] = 3;
$A[3] = 2;
$A[4] = 3;
$A[5] = -1;
$A[6] = 3;
$A[7] = 3;

/**/
$A[0] = 1;
$A[1] = 4;
$A[2] = 4;
$A[3] = 4;
$A[4] = 4;
$A[5] = 4;
$A[6] = 4;

echo '<pre>';
print_r($math->dominator($A));
print_r($math->dominator2($A));
echo '</pre>';
exit;