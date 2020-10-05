<?php

require __DIR__ . '/vendor/autoload.php';

$math = new src\Math();

$H[0] = 8;
$H[1] = 8;
$H[2] = 5;
$H[3] = 7;
$H[4] = 9;
$H[5] = 8;
$H[6] = 7;
$H[7] = 4;
$H[8] = 8;

echo '<pre>';
print_r($math->wall($H));
echo '</pre>';
exit;