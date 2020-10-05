<?php

require __DIR__ . '/vendor/autoload.php';

$math = new src\Math();

$numbers = [
    5       => 1,
    17      => 3,
    25      => 2,
    1223243 => 2,
    251     => 1,
    9       => 2,
    529     => 4,
    20      => 1,
    32      => 0,
    1041    => 5
];

echo '<pre>';
print_r($math->binGap( 1223243 ));
echo '</pre>';
exit;