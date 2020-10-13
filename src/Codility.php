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

    /**
        We count how many time each number appearances in the list.
        We can divide each number by the factors and count the appearance time in the list.
        The number of no-dividers is the total number of the list minuses the count.
     */
    public function countNonDivisible1($A)
    {
        $N = count($A);
        $M = max($A);

        $answer      = array_fill(0, $N, 0);
        $result      = array_fill(0, $N, 0);
        $occurrences = array_fill(0, $M+1, 0);

        // occurrence of num in array
        foreach ($A as $value) {
            $occurrences[$value]++;
        }

        for ($i = 0; $i < $N; $i++) {
            // divide by until same number
            // if 6: 1*1, 1*2, 1*3
            for ($j = 1; $j * $j <= $A[$i]; $j++) {
                if ($A[$i] % $j == 0) {
                    $answer[$i] -= $occurrences[$j];
                    if ($A[$i] / $j != $j) {
                        $answer[$i] -= $occurrences[$A[$i] / $j];
                    }
                }
            }
        }

        // loop and retire from original count
        for ($i = 0; $i < $N; $i++) {
            $result[$i] = $N + $answer[$i];
        }

        return $result;
    }
}