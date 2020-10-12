<?php namespace src;

class Codility
{
    public function minPerimeterRectangle($N)
    {
        $P = PHP_INT_MAX; // 2 * (A + B)

        for($i = 1; $i <= ceil(sqrt($N)); $i++){

            echo 'i:'.$i.'<br>';
            if($N % $i == 0){

                $a = $i;
                $b = $N/$i;

                $newp = 2 * ($a+$b);
                $P = min($newp,$P);
            }
        }

        return $P;
    }

    public function sieve($N)
    {
        $limit = intval(sqrt($N));
        $A = array_fill(0, $N, true);

        for ($i = 2; $i <= $limit; $i++) {
            if ($A[$i - 1]) {
                for ($j = $i * $i; $j <= $N; $j += $i) {
                    $A[$j - 1] = false;
                }
            }
        }

        $result = [];

        foreach ($A as $i => $is_prime) {
            if ($is_prime) {
                $result[] = $i + 1;
            }
        }

        return $result;
    }

    public function countNonDivisible($A)
    {
        $N = count($A);
        $M = max($A);
        $nonDivisibles = [];
        $occurrence = array_fill(0, $M+1, 0);

        // occurrence of num in array
        foreach ($A as $value) {
            $occurrence[$value]++;
        }

        for ($i = 0; $i < $N; $i++) {

            $count = 0;
            $j = 1;

            // 1 * 1 <= 3
            while ($j * $j <= $A[$i]) {
                // 3 % 1 yes
                if ($A[$i] % $j == 0) {
                    // 1
                    $count += $occurrence[$j];
                    // 3 / 1 != 1
                    if ($A[$i] / $j != $j) {
                        // 3/1 = 3 here is 2 occurences of 3
                        $count += $occurrence[$A[$i] / $j];
                    }
                }
                $j++;
            }
            $nonDivisibles[$i] = $N - $count;
        }
        return $nonDivisibles;
    }

    public function countNonDivisible1($A)
    {
        $N = count($A);

        $countValues = array_count_values($A);
        $occurrences = array_fill(0, $N * 2 + 1, 0);

        $answer = array_fill(0, $N * 2 + 1, 0);
        $result = array_fill(0, $N, 0);

        foreach ($countValues as $key => $value) {
            $occurrences[$key] = $value;
        }

        echo '<pre>';
        print_r($occurrences);
        echo '</pre>';

        $occurrence = array_fill(0, $M+1, 0);

        // occurrence of num in array
        foreach ($A as $value) {
            $occurrence[$value]++;
        }

        echo '<pre>';
        print_r($occurrence);
        echo '</pre>';
        exit;

        for ($i = 1; $i <= $N * 2; $i++) {
            // if we have an occurence
            $num = $occurrences[$i];
            if ($num == 0) {
                continue;
            }
            // if we have an occurence
            // put i in j and loop  remove number of occurence minuses
            for ($j = $i; $j <= $N * 2; $j += $i) {
                $answer[$j] -= $num;
            }
        }

        // loop and retire from original count
        for ($i = 0; $i < $N; $i++) {
            $result[$i] = $N + $answer[$A[$i]];
        }

        return $result;
    }
}