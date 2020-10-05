<?php namespace src;

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

}