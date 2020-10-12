<?php namespace src;

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {

        // Positive unique integers
        $uniques = [];
        $N       = count($nums);

        // make sur we start the range at 0
        $nums[] = 0;
        // remove extra 0
        $nums   = array_unique($nums);
        sort($nums);

        // if there is only 0 return
        if(empty($nums)){return 0;}

        $count = count($nums);

        if($count < $N){
            $count = $count + 1;
        }

        for ($i = 0; $i < $count; $i++) {
            // If integer not already in array
            if (!isset($uniques[$nums[$i]])) {
                $uniques[$nums[$i]] = $nums[$i];
            }
        }

        if (count($uniques) === 0) {
            $min = 1;
        } else {
            // Maximum positive unique integer
            $max = max($uniques);

            if($max < $N){
                $max = $max + 1;
            }

            $min = 0;

            // First integer which is not in the $uniques array is searched for;
            // upper limit is the maximum positive unique integer
            for ($i = 0; $i <= $max; $i++) {
                //echo $uniques[$i].'<br>';
                if (!isset($uniques[$i])) {
                    $min = $i;
                    break;
                }
            }
        }

        return $min;
    }

    public function single($nums)
    {
        $N = count($nums);
        sort($nums);
        $values = [];

        for ($i = 0; $i < $N; $i++) {
            if (!isset($values[$nums[$i]])) {
                $values[$nums[$i]] = 1;
            }
            else{
                $values[$nums[$i]] += 1;
            }
        }

        foreach($values as $key => $value) {
            if($value == 1){
                return $key;
            }
        }

        return 0;
    }

    public function findTheDifference($s, $t) {

        $letter_s = str_split($s);
        $letter_t = str_split($t);

        sort($letter_s);
        sort($letter_t);

        $S1 = count($letter_s) > count($letter_t) ? $letter_s : $letter_t;
        $S2 = count($letter_s) > count($letter_t) ? $letter_t : $letter_s;

        if(count($S1) === 1){
            return $S1[0];
        }

        for ($i = 0; $i < count($S1); $i++) {
            if(!isset($S2[$i]) || $S1[$i] != $S2[$i]){
               return $S1[$i];
            }
        }
    }

    public function palindrome($s)
    {
        $letters = str_split($s);
        $swap    = str_split($s);

        $leftIndex  = 0;
        $rightIndex = strlen($s) - 1;

        while ($leftIndex < $rightIndex) {

            // swap characters
            $temp = $swap[$leftIndex];

            $swap[$leftIndex]  = $swap[$rightIndex];
            $swap[$rightIndex] = $temp;

            // move towards middle
            $leftIndex++;
            $rightIndex--;
        }

        $reverse1 = implode($swap);

        for ($i = 0; $i < count($letters); $i++) {

            $reverse = $reverse1;

            $data    = substr_replace($s,'',$i, 1);
            $reverse = substr_replace($reverse,'', count($letters) - 1 - $i, 1);

            if($data === $reverse){
                return true;
                break;
            }
        }

        return false;
    }
}