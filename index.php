<?php

require __DIR__ . '/vendor/autoload.php';

$math = new src\Math();
$cake = new src\Cake();


new src\Meeting(2, 3);  // meeting from 10:00 – 10:30 am
new src\Meeting(6, 9);  // meeting from 12:00 – 1:30 pm

$H = [8, 8, 5, 7, 9, 8, 7, 4, 8];

$prices = [10, 7, 5, 8, 11, 9];

$meetings = [
    new src\Meeting(0, 1),
    new src\Meeting(3, 5),
    new src\Meeting(4, 8),
    new src\Meeting(10, 12),
    new src\Meeting(9, 10)
];

echo '<pre>';
print_r($cake->mergeRanges($meetings));
echo '</pre>';
echo '<br>';
