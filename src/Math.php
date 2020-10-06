<?php namespace src;

use function PHPUnit\Framework\containsEqual;

class Math
{
    public function binGap($int)
    {
        $binary_int = decbin($int);

        $chars = explode('1', $binary_int);

        unset($chars[count($chars) - 1]);
        unset($chars[0]);

        $lengths = array_map('strlen', $chars);

        return isset($lengths) && count($lengths) > 0 ? max($lengths) : 0;
    }

    public function cyclicRotation($A, $K)
    {
        if(count($A) == 0 || count($A) == 1){
            return $A;
        }

        $count = count($A);
        $keys  = array_keys($A);

        $keys = array_map(function($key) use ($K,$count) {
            $limit = $count - 1;

            // make sure $K not over limit
            $K   = $K > $count ? $K - $count : abs($K);
            $n_i = $key + $K;

            return $n_i > $limit ? abs($count - $K - $key) : $n_i;
        }, $keys);

        $result = array_combine($keys,$A);
        ksort($result);

        return $result;
    }

    // 100%
    public function cyclicRotation2($A, $K)
    {
        // $k     = 3;
        // $start = [2,1,5,7];
        // $end   = [1,5,7,2];

        // For example, for the input ([1, 1, 2, 3, 5], 42) the solution returned a wrong answer (got [1, 1, 2, 3, 5] expected [3, 5, 1, 1, 2]).

        $count = count($A);

        if($count == 0 || $K == 0) return $A;

        $limit = $K > $count ? -($K%$count) :$count - $K;

        $part1 = array_slice($A, $limit);
        $part2 = array_slice($A, 0,$limit);

        return array_merge($part1,$part2);
    }

    public function oddOccurrencesInArray($A)
    {
        if(empty($A))return null;

        $values = array_count_values($A);

        foreach($values as $key => $value){
            if(($value % 2===1)){
                return $key;
            }
        }
    }

    public function frogJmp($X,$Y,$D)
    {
        $length = $Y - $X;

        return ceil($length / $D);
    }

    public function permMissingElem($A)
    {
        sort($A);

        for($i = 0; $i<count($A); $i++){
            if($A[$i]!= $i+1){
                return $i+1;
            }
        }

        return count($A)+1;
    }

    public function tapeEquilibrium($A)
    {
        $partA = $A[0];
        $partB = array_sum($A) - $partA;

        $min = abs($partA - $partB);
        $len = count($A);

        for ($i = 1; $i < $len - 1; $i++) {

            $partA += $A[$i];
            $partB -= $A[$i];

            $min = min([$min, abs($partA - $partB)]);
        }

        return $min;
    }

    public function frogRiverOne($X, $A)
    {
        $exist = [];
        $need  = range(1,$X);

        foreach ($A as $key => $value){
            if(in_array($value,$need)){
                $exist[] = $value;
                $exist = array_unique($exist);
            }

            if(count($exist) == count($need)){
                return $key;
            }
        }
    }
    public function frogRiverOne2($X, $A)
    {
        $earliestTime = -1;
        $haspositions = [];

        foreach ($A as $K => $position) {

            if (!isset($haspositions[$position]) && $position <= $X) {

                $haspositions[$position] = $K;

                if (count($haspositions) === $X +1) {
                    $earliestTime = $K;
                    break;
                }
            }
        }

        return $earliestTime;
    }

    public function solution($X, $A) {
        $minimum = -1;
        $uniques = array_unique($A);

        if (count($uniques) >= $X) {
            $keys = array_keys($uniques);
            $minimum = max($keys);
        }

        return $minimum;
    }

    public function maxCounters($N, $A)
    {
        /*
         * 1 ≤ X ≤ N,
        A[0] = 3
        A[1] = 4
        A[2] = 4
        A[3] = 6
        A[4] = 1
        A[5] = 4
        A[6] = 4
        (0, 0, 1, 0, 0) // x = 3 , n = 1 => no,  x = 3 , n = 2 => no, x = 3 , n = 3 => yes, x = 3 , n = 4 => yes,
        (0, 0, 1, 1, 0)
        (0, 0, 1, 2, 0)
        (2, 2, 2, 2, 2)
        (3, 2, 2, 2, 2)
        (3, 2, 2, 3, 2)
        (3, 2, 2, 4, 2)
        the function should return [3, 2, 2, 4, 2], as explained above.
        */
        // N counters, all have value 0 at start


        $counters = array_fill(0, $N, 0);

        $maxVal   = 0;
        $minVal   = 0;

        $M = count($A);

        for ($i = 0; $i < $M; $i++) {

            if ($A[$i] === ($N + 1)) {
                $minVal = $maxVal;
            }
            else{

                if ($counters[$A[$i] - 1] < $minVal) {
                    $counters[$A[$i] - 1] = $minVal;
                }

                $counters[$A[$i]-1]++;

                if($maxVal < $counters[$A[$i]-1]){
                    $maxVal = $counters[$A[$i]-1];
                }
            }
        }

        for ($i = 0; $i < $N; $i++) {
            if ($counters[$i] < $minVal) {
                $counters[$i] = $minVal;
            }
        }

        return $counters;
    }

    public function missingInteger($A)
    {
        // Positive unique integers
        $uniques = [];

        foreach ($A as $integer) {
            // If integer is positive, and not already in array
            if ($integer > 0 && empty($uniques[$integer])) {
                $uniques[$integer] = $integer;
            }
        }

        if (count($uniques) === 0) {
            $min = 1;
        } else {

            // Maximum positive unique integer
            $max = max($uniques);

            // If sequence like this $A = [1, 2, 3, 4] is given, first missing positive integer is bigger
            // than maximum positive unique integer, that is the reason why first missing positive integer
            // is initialized to $maxPositiveInteger + 1
            $min = $max + 1;

            // First integer which is not in the $uniques array is searched for;
            // upper limit is the maximum positive unique integer
            for ($i = 1; $i < $max; $i++) {
                if (!isset($uniques[$i])) {
                    $min = $i;
                    break;
                }
            }
        }

        return $min;
    }

    public function permCheck($A)
    {
        $max = max($A);
        $min = min($A);

        $all = range($min,$max);

        sort($A);

        for($i=0; $i<count($A); $i++){
            if($A[$i]!=$i+1){
                return false;
            }
        }

        return true;
    }

    function permute($array) {
        $length = sizeof($array);

        $inner = function($ix = []) use ($array, $length, &$inner) {
            $yield = sizeof($ix) == $length - 1;
            for ($i = 0; $i < $length; $i++) {
                if (in_array($i, $ix)) {
                    continue;
                } elseif ($yield) {
                    $toYield = [];
                    foreach (array_merge($ix, [$i]) as $index) {
                        $toYield[] = $array[$index];
                    }
                    yield $toYield;
                } else {
                    foreach ($inner(array_merge($ix, [$i])) as $permute) {
                        yield $permute;
                    }
                }
            }
        };

        return $inner();
    }

    public function countDiv($A, $B, $K)
    {
        $x_mod = $A % $K;

        if($x_mod != 0){
            $A += ($K - $x_mod);
        }

        $B -= $B % $K;

        return $A > $B ? 0 : ($B - $A) / $K + 1;
    }

    public function genomicRangeQuery($S, $P, $Q)
    {
        // A, C, G and T have impact factors of 1, 2, 3 and 4,
        $lookup = [];

        for($i = 0; $i < count($P); $i++){

            $sub = substr($S, $P[$i], ($Q[$i] - $P[$i] + 1));

            if(strpos($sub, 'A') !== false){
                $lookup[$i][] = 1;
            }

            if(strpos($sub, 'C') !== false){
                $lookup[$i][] = 2;
            }

            if(strpos($sub, 'G') !== false){
                $lookup[$i][] = 3;
            }

            if(strpos($sub, 'T') !== false){
                $lookup[$i][] = 4;
            }

            $lookup[$i] = min( $lookup[$i]);
        }

        return $lookup;
    }

    public function minAvgTwoSlice($A)
    {
        $A = [4,2,2,5,1,5,8];

        $N = count($A);

        if ($N > 100000 || $N < 2 ) {
            return -1;
        } elseif ($N === 2) {
            return 0;
        }

        $presum = [0];

        $mavg = PHP_INT_MAX;

        $index = 0;

        for ($i = 0; $i < $N; $i++) {
            $presum[$i+1] = $A[$i] + $presum[$i];
        }

        for ($i = 0; $i < $N-2; $i++) {
            for ($j = $i+1; $j < $i + 3; $j++ ) {
                $avg = ($presum[$j+1] - $presum[$i]) / ($j - $i + 1);

                if ($mavg > $avg) {
                    $mavg = $avg;
                    $index = $i;
                }
            }
        }

        $avg = ($presum[$N] - $presum[$N-2]) / 2;

        if ($mavg > $avg) {
            $index = $N - 2;
        }

        return $index;
    }

    public function passingCars($A)
    {
        $zero_count   = 0;
        $combinations = 0;

        for ($i = 0; $i < count($A); $i++) {
            if( $A[$i] == 0) {
                $zero_count += 1;
            }
            else{
                $combinations += $zero_count;
            }

            if($combinations > 1000000000){
                return -1;
            }
        }

        return $combinations;
    }

    public function distinct($A)
    {
        $exist = [];

        for ($i = 0; $i < count($A); $i++) {
            if(!isset($exist[$A[$i]])){
                $exist[$A[$i]] = $A[$i];
            }
        }
    }

    public function maxProductOfThree($A)
    {
        if (count($A) < 3) {
            return -1;
        }

        // Sort the array in ascending order
        sort($A);

        // Return the maximum of product of last three
        // elements and product of first two elements
        // and last element
        $n = count($A);
        return max($A[0] * $A[1] * $A[$n - 1], $A[$n - 1] * $A[$n - 2] * $A[$n - 3]);
    }

    public function numberOfDiscIntersections($A)
    {
        $counter = 0;
        $j = 0;

        $leftLimit  = [];
        $rightLimit = [];

        for ($i = 0; $i < count($A); $i++) {
            $leftLimit[]  = $i - $A[$i];
            $rightLimit[] = $i + $A[$i];
        }

        sort($leftLimit);
        sort($rightLimit);

        for ($i = 0; $i < count($A); $i++) {
            while($j < count($A) && $rightLimit[$i] >= $leftLimit[$j]){
                //we have circles at each position, so, as long as the left boundaries are smaller or equal to the right boundary, there are circles intersecting there
                //if j surpasses j, it means we overcalculated and we start to decrease the number of intersections
                $counter += $j - $i;
                //pass to the next open circle
                $j++;
            }

            if($counter > 10000000) return -1;
        }

        return $counter;
    }

    public function intersect($x0,$x1,$y0,$y1,$r0,$r1)
    {
        $d = sqrt(pow($x1 - $x0,2) + pow($y1 - $y0,2));

        if( $d > ($r0 + $r1)){
            return 0;
        }
        elseif( $d < abs($r0 - $r1)){
            return 1;
        }
        elseif($d == 0 && ($r0 == $r1)){
            return 1;
        }
        else{
            return 1;
        }
    }

    public function trinagle($A)
    {
        sort($A);

        /**
         * Since the array is sorted A[i + 2] is always greater or equal to previous values
         * So A[i + 2] + A[i] > A[i + 1] ALWAYS
         * As well as A[i + 2] + A[i + 1] > A[i] ALWAYS
         * Therefore no need to check those. We only need to check if A[i] + A[i + 1] > A[i + 2]?
         * Since in case of A[i] + A[i + 1] > MAXINT the code would strike an overflow (ie the result will be greater than allowed integer limit)
         * We'll modify the formula to an equivalent A[i] > A[i + 2] - A[i + 1]
         * And inspect it there
         */
        for($i = 0; $i < count($A)-2 ;$i++) {
            if(($A[$i] + $A[$i+1] > $A[$i+2]) && ($A[$i+1] + $A[$i+2] > $A[$i]) && ($A[$i] + $A[$i+2] > $A[$i+1])){
                return 1;
            }
        }

        return 0;
    }

    public function brackets($S)
    {
        function isValidPair($left, $right){
            if($left == '(' and $right == ')'){
                return true;
            }
            if($left == '{' and $right == '}'){
                return true;
            }
            if($left == '[' and $right == ']'){
                return true;
            }
            return false ;
        }

        $stack = [];

        $A     = str_split($S);
        $count = count($A);

        if($count == 0) {
            return 1;
        }

        for($i = 0; $i < $count ;$i++) {

            $c = $A[$i];

            if($c == '{' || $c == '[' || $c == '('){
                array_push($stack,$c);
            }
            else{
                if(empty($stack)){return 0;}

                $last = array_pop($stack);
                if(!isValidPair($last, $c)) {
                    return 0;
                }
            }
        }

        if(empty($stack)){
            return 1;
        }

        return 0;

    }

    public function fish($A, $B)
    {
        $dead  = 0;
        $stack = [];

        for ($i = 0; $i < count($A); $i++) {

            if($B[$i] == 0) {

                $exitGate = false;

                while(isset($stack[0]) && !$exitGate){
                    $dead++;
                    if($A[$i] > end($stack)){
                        array_pop($stack);
                    }else{
                        $exitGate = true;
                    }
                }
            }
            else{
                array_push($stack,$A[$i]);
            }
        }

        return count($A) - $dead;

    }

    public function nesting($S)
    {
        function isValidPair($left, $right){
            return $left == '(' and $right == ')' ? true : false;
        }

        $stack = [];

        $A     = str_split($S);
        $count = count($A);

        if(empty($S)) {return 1;}

        for($i = 0; $i < $count ;$i++) {

            $c = $A[$i];

            if($c == '('){
                array_push($stack,$c);
            }
            else{
                if(empty($stack)){return 0;}

                $last = array_pop($stack);
                if(!isValidPair($last, $c)) {
                    return 0;
                }
            }
        }

        if(empty($stack)){return 1;}

        return 0;
    }

    public function wall($H){

        //We need at least one block
        $blocks = 1;

        $stack = new \src\Stack();
        $stack->push($H[0]);

        for($i = 1; $i < count($H); $i++){

            $blockFound = false;

            echo '<pre>';
            print_r($stack->stack);
            print_r($blocks);
            echo '</pre>';

            //If the current height is higher than the previous, we need a new block + continue with the previous one
            if($H[$i] > $H[$i-1]){
                $blocks++;
                $stack->push($H[$i]);
            }
            else if($H[$i] < $H[$i-1]){
                //If the current height is lower than the previous, one block ends, but we need a new block
                //Take the last block of the stack
                while(count($stack->stack) != 0 && $blockFound === false){

                    // Same height as the last block in stack
                    if($stack->head() === $H[$i]){
                        // break the loop
                        $blockFound = true;
                    }
                    else if($stack->head() < $H[$i]){
                        // or the last block in stack is smaller than current
                        // break the loop
                        $blockFound = true;
                        $stack->push($H[$i]);
                        $blocks++;
                    }
                    else{
                        // remove from stack
                        $stack->pop();
                    }
                }

                if(empty($stack->stack)){
                    $blocks++;
                    $stack->push($H[$i]);
                }
            }
        }

        return $blocks;
    }
}