<?php

use src\SearchBinaryTree;

require __DIR__ . '/vendor/autoload.php';

$math = new src\Math();
$cake = new src\Cake();
$solu = new src\Solution();

/*$A[0] = 1;
$A[1] = 5;
$A[2] = 3;
$A[3] = 4;
$A[4] = 3;
$A[5] = 4;
$A[6] = 1;
$A[7] = 2;
$A[8] = 3;
$A[9] = 4;
$A[10] = 6;
$A[11] = 2;*/

$A[0] = 1;
$A[1] = 3;
$A[2] = 2;
$A[3] = 2;
$A[4] = 4;
$A[5] = 1;


echo '<pre>';
print_r($math->minPerimeterRectangle(62));
echo '</pre>';
exit;


/*$A[0] = 3;
$A[1] = 4;
$A[2] = 3;
$A[3] = 2;
$A[4] = 3;
$A[5] = -1;
$A[6] = 3;
$A[7] = 3;*/


$a = new src\LinkedListNode(5);
$b = new src\LinkedListNode(1);
$c = new src\LinkedListNode(9);

$a->setNext($b);
$b->setNext($c);


/*$BST = new src\BST(2);

$BST->insert(2);
$BST->insert(2);*/

$nodes = [2,2,5,null,null,5,7];
$nodes = [2,2,2];

$tree = new src\BST();

for($i = 0; $i < count($nodes); $i++) {
    $tree->insert($nodes[$i]);
}

/*$BST = new src\BST(2);

$BST->insert(5);
$BST->insert(7);
$BST->insert(2);
$BST->insert(5);*/

/*2
/ \
2   5
/ \
5   7*/

echo '<pre>';
print_r($tree);
echo '</pre>';

$tree = $tree->traverseNodes($tree->root);


// 5 1 9

function reverse($node){
    // initalize prev to null
    $prev    = null;
    // put passed node or head in current variable
    $current = $node;

    // While current is not null, we aren't at the end loop
    while ($current !== null ) {
        // put the next node in the next variable
        $next = $current->getNext();
        // set the next of the current to the previous node
        $current->setNext($prev);
        // swap prev for the current
        $prev    = $current;
        // set current to the next
        $current = $next;
    }

    // Head becomes the last prev node
    $node = $prev;

    return $node;
}

//$a = reverse($a);


$arr = array(8,3,1,6,4,7,10,14,13);

$tree = new src\BST();

for($i=0; $i < count($arr); $i++) {
    $tree->insert($arr[$i]);
}

echo '<pre>';
print_r($tree->findSecondMinimumValue());
print_r($tree->findSecondMinimumValue());
echo '</pre>';
exit;
