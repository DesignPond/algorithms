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

        $divisors = $this->sieve($N);



        return $divisors;
    }
}