<?php

require __DIR__ . '/vendor/autoload.php';

$math = new src\Math();

$H = [8, 8, 5, 7, 9, 8, 7, 4, 8];
//$H = [4,2,4,2];

echo '<pre>';
print_r($math->wall3($H));
echo '</pre>';
exit;