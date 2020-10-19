<?php namespace src;


class Coursera
{
    public function karatsuba($num1, $num2) {

        // less tha 10 compute
        if(($num1 < 10) || ($num2 < 10)) {

            echo 'compute n1 '.$num1.' * n1 '.$num2.'<br>';

            return $num1 * $num2;
        }

        echo $num1.'<br>';

        // greatest power of the numbers example 4512 is 2*2 trilling zero
        $m = ceil((max(ceil(log10($num1)), ceil(log10($num2))))/2);

        // get ab
        $sn1   = "".$num1;
        $high1 = (int)substr($sn1, 0, strlen($sn1) - $m);
        $low1  = (int)substr($sn1, -$m);

        // get cd
        $sn2   = "".$num2;
        $high2 = (int)substr($sn2, 0, strlen($sn2) - $m);
        $low2  = (int)substr($sn2, -$m);

        // recursion
        $z0 = $this->karatsuba($low1, $low2);
        $z1 = $this->karatsuba($low1 + $high1, $low2 + $high2);
        $z2 = $this->karatsuba($high1, $high2);

        return ($z2 * pow(10, 2 * $m)) + (($z1 - $z2 - $z0) * pow(10, $m)) + $z0;
    }

    public function mergeSort($A)
    {
        if(sizeof($A) == 1) { return $A; }

        // find middle index
        $middle = sizeof($A) / 2;

        $left  = array_slice($A, 0, $middle);
        $right = array_slice($A, $middle);

        $left  = $this->mergeSort($left);
        $right = $this->mergeSort($right);

        return $this->merge($left, $right);
    }

    function merge($left, $right){
        $result = [];

        // sort both array if both not empy
        while (count($left) > 0 && count($right) > 0){
            if($left[0] > $right[0]){
                $result[] = $right[0];
                $right = array_slice($right , 1); // remove from number right array
            }else{
                $result[] = $left[0];
                $left = array_slice($left, 1); // remove from number left array
            }
        }

        // put in pieces left in left array
        while (count($left) > 0){
            $result[] = $left[0];
            $left = array_slice($left, 1);
        }

        // put in pieces left in right array
        while (count($right) > 0){
            $result[] = $right[0];
            $right = array_slice($right, 1);
        }

        return $result;
    }

    public function quicksort($A)
    {
        // if less than 2 return directly
        if(count($A) < 2){
            return $A;
        }

        // get first as pivot
        $pivot = array_shift($A);

        $lower  = [];
        $bigger = [];

        // divide in lower and bigger array
        for($i = 0; $i < count($A); $i++) {
            if($A[$i] > $pivot){
                $bigger[] = $A[$i];
            }
            else{
                $lower[] = $A[$i];
            }
        }

        // recursive call for big array until 1
        $first = $this->quicksort($lower);
        $last  = $this->quicksort($bigger);

        // merge everything together
        return array_merge($first,[$pivot],$last);
    }

    public function selectionSort(&$arr) {
        $length = sizeof($arr);

        // loop over items in array
        for($i = 0; $i < $length - 1; $i++) {

            $minIndex = $i;

           // loop again
            for($j = $i + 1; $j < $length; $j++) {
                // search for something bigger than current
                if($arr[$minIndex] > $arr[$j]) {
                    $minIndex = $j;
                }
            }

            // get the min put in temp
            $temp = $arr[$minIndex];
            // replace with new
            $arr[$minIndex] = $arr[$i];
            // put temp in old place
            $arr[$i] = $temp;
        }
    }

    public function insertion_Sort($my_array)
    {
        for($i = 0; $i < count($my_array); $i++){
            $val = $my_array[$i];
            $j   = $i - 1;

            while($j >= 0 && $my_array[$j] > $val){
                $my_array[$j+1] = $my_array[$j];
                $j--;
            }

            $my_array[$j+1] = $val;
        }

        return $my_array;
    }

    function bubble_sort($arr) {
        $size = count($arr) - 1;

        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($arr[$k] < $arr[$j]) {
                    // Swap elements at indices: $j, $k
                    list($arr[$j], $arr[$k]) = [$arr[$k], $arr[$j]];
                }
            }
        }
        return $arr;
    }

    public function sum($A,$sum = 0)
    {
        if(empty($A)){return $sum;}

        $first = array_shift($A);

        $sum += $first;

        return $this->sum($A, $sum);
    }

    public function maximum($A,$max = 0)
    {
        if(empty($A)){return $max;}

        $first = array_shift($A);

        if($first > $max){
            $max = $first;
        }

        return $this->maximum($A, $max);
    }

    public function binarySearchRecurdive($arr, $start, $end, $x){

        if ($end < $start){
            return false;
        }

        $mid = floor(($end + $start)/2);

        if ($arr[$mid] == $x){
            return true;
        }
        elseif ($arr[$mid] > $x) {
            // call binarySearch on [start, mid - 1]
            return binarySearch($arr, $start, $mid - 1, $x);
        }
        else {
            // call binarySearch on [mid + 1, end]
            return binarySearch($arr, $mid + 1, $end, $x);
        }
    }

    public function binarySearch($array, $value) {
        // Set the left pointer to 0.
        $left = 0;
        // Set the right pointer to the length of the array -1.
        $right = count($array) - 1;

        while ($left <= $right) {
            // Set the initial midpoint to the rounded down value of half the length of the array.
            $midpoint = (int) floor(($left + $right) / 2);

            if ($array[$midpoint] < $value) {
                // The midpoint value is less than the value.
                $left = $midpoint + 1;
            } elseif ($array[$midpoint] > $value) {
                // The midpoint value is greater than the value.
                $right = $midpoint - 1;
            } else {
                // This is the key we are looking for.
                return $midpoint;
            }
        }
        // The value was not found.
        return NULL;
    }

    public function mergeAndCount($arr, $l, $m, $r)
    {
        // Left subarray
        $left = array_slice($arr, $l, $m + 1);

        // Right subarray
        $right = array_slice($arr, $m + 1, $r + 1);

        $i = 0;
        $j = 0;
        $k = $l;

        $swaps = 0;

        while ($i < count($left) && $j < count($right)) {
            if ($left[$i] <= $right[$j])
                $arr[$k++] = $left[$i++];
            else {
                $arr[$k++] = $right[$j++];

                $swaps += ($m + 1) - ($l + $i);
            }
        }

        return $swaps;
    }

    public function mergeSortAndCount($arr, $l, $r)
    {
        // Keeps track of the inversion count at a
        // particular node of the recursion tree
        $count = 0;

        if ($l < $r) {
            $m = ($l + $r) / 2;

            // Total inversion count = left subarray count  + right subarray count + merge count
            // Left subarray count
            $count += $this->mergeSortAndCount($arr, $l, $m);

            // Right subarray count
            $count += $this->mergeSortAndCount($arr,$m + 1, $r);

            // Merge count
            $count += $this->mergeAndCount($arr, $l, $m, $r);
        }

        return $count;
    }

    public function _mergeSort($A, $temp, $left, $right)
    {
        $inv_count = 0;

        if ($left < $right){
            $mid = ($left + $right) / 2;

            $inv_count += $this->_mergeSort($A, $temp, $left, $right);
            $inv_count += $this->_mergeSort($A, $temp, $mid + 1, $right);
            $inv_count += $this->merging($A, $temp, $left, $mid, $right);
        }

        return $inv_count;
    }

    public function merging($A, $temp, $left, $mid, $right)
    {
        $i = $left ;    # Starting index of left subarray
        $j = $mid + 1; # Starting index of right subarray
        $k = $left ;    # Starting index of to be sorted subarray
        $inv_count = 0;

        while ($i <= $mid && $j <= $right){
            if($A[$i] <= $A[$j]){
                $temp[$k] = $A[$i];
                $k += 1;
                $i += 1;
            }
            else{
                $temp[$k] = $A[$j];
                $inv_count += ($mid - $i + 1);
                $k += 1;
                $i += 1;
            }
        }

        while($i <= $mid){
            $temp[$k] = $A[$i];
            $k += 1;
            $i += 1;
        }

        while($j <= $right){
            $temp[$k] = $A[$j];
            $k += 1;
            $i += 1;
        }

        foreach(range($left, $right + 1) as $loop){
            $A[$loop] = $temp[$loop];
        }

        return $inv_count;
    }
}