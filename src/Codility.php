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
       /*
        To find out all primes under n, generate a list of all integers from 2 to n. (Note: 1 is not prime)
        Start with a smallest prime number, ie p = 2.
        Mark all the multiples of p which are less than n as composite.
        To do this, mark the value of the numbers (multiples of p) in the generated list as 0. Do not mark p itself as composite.
        Assign the value of p to the next prime. The next prime is the next non-zero number in the list which is greater than p. Repeat the process until p ≤ n
        * */

        $limit = intval(sqrt($N));
        $A     = array_fill(0, $N, true);

        // Start with a smallest prime number, ie p = 2
        for ($i = 2; $i <= $limit; $i++) {

            // Back 1 because we start at 2 and we mark start at 1
            if($A[$i - 1]) {
                // Mark all the multiples of p which are less than n as composite.
                // limit is 3
                // So for 2*2 = 4 : 3
                // So for 2*3 = 6 : 5
                // So for 2*4 = 8 : 7
                // So for 2*5 = 10 : 9
                // So for 2*6 = 12 : 11
                // So for 3*3 = 9 : 8
                for ($j = ($i * $i); $j <= $N; $j += $i) {
                    $A[$j - 1] = false;
                }
            }
        }

        $result = [];

        // Assign the value of p to the next prime. The next prime is the next non-zero number in the list which is greater than p.
        foreach ($A as $i => $prime) {
            if ($prime) {
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


    public function countSemiprimes($N, $P, $Q)
    {
        $v = array_fill(0, $N + 1, 0);

        // This array will initially store the indexes
        // After performing below operations if any element of array becomes 1 this means
        // that the given index is a semi-prime number

        // Storing indices in each element of vector
        for ($i = 1; $i <= $N; $i++)
            $v[$i] = $i;

        $countDivision = array_fill(0, $N + 1, 0);

        // Start at 2
        for ($i = 0; $i < $N + 1; $i++)
            $countDivision[$i] = 2;

        // This array will initially be initialized by 2 and
        // will just count the divisions of a number
        // As a semiprime number has only 2 prime factors
        // which means after dividing by the 2 prime numbers
        // if the index countDivision[x] = 0 and $v[x] = 1 this means that x is a semiprime number
        // If number a is prime then its countDivision[a] = 2 and $v[a] = a

        for ($i = 2; $i <= $N; $i++) {
            // If v[i] != i this means that it is not a prime number as it contains
            // a divisor which has already divided it same reason if countDivision[i] != 2
            if ($v[$i] == $i && $countDivision[$i] == 2) {
                // j goes for each factor of i
                for ($j = 2 * $i; $j <= $N; $j += $i) {
                    if ($countDivision[$j] > 0) {
                        // Dividing the number by i
                        // and storing the dividend
                        $v[$j] = $v[$j] / $i;
                        // Decreasing the countDivision
                        $countDivision[$j]--;
                    }
                }
            }
        }

        // A new vector to store all Semi Primes
        $res = [];

        for ($i = 2; $i <= $N; $i++) {
            // If a number becomes one and
            // its countDivision becomes 0
            // it means the number has two prime divisors
            if ($v[$i] == 1 && $countDivision[$i] == 0){
                array_push($res, $i);
            }
        }

        return $res;
    }

    function checkSemiprime($num)
    {
        $cnt = 0;

        for ($i = 2; $cnt < 2 && $i * $i <= $num; ++$i){
            while ($num % $i == 0){
                $num /= $i;
            }
        }

        // Increment count of prime numbers
        $cnt++;

        // If number is greater than 1, add it to the count variable as it indicates the number remain is prime number
        if ($num > 1){
            $cnt++;
        }

        // Return '1' if count is equal to '2' else return '0'
        return $cnt == 2;
    }

    Function isSemiPrime($num,$primes = null){

        if(!isset($primes)){
            $primes = $this->sieve($num);
        }

        for($count = 2; $count <= $num/2; $count++){
            if(in_array($count,$primes)){//checking if current is prime
                if($num%$count == 0){//making sure (num/count) is not a fraction
                    $divisionResult = ($num/$count);
                    if(in_array($divisionResult,$primes)){//checking if num/count is prime
                        return 1;
                    }
                }
            }
        }

        return 0;
    }

    // N and M meet at their least common multiply.
    // Dividing this LCM (Least common multiple) by M gets the number of steps(chocolates) that can be eaten.
    public function chocolatesByNumbers($N, $M){
        /*
            lcm 10 * 4 / gdc
            gcd 10 % 4 => 2
            gcd 4 % 2
            gcd 2 % 0 out of loop
            => 2
            10 * 4 / 2 = 5
         * */
        return $this->lcm($N,$M)/$M;
    }

    public function lcm($N,$M){
        // Lowest common divisor
        return $N * ($M / $this->gcd($N,$M));
    }

    // Greatest common divisor
    // If modulo N%M = 0 then N is the greatest
    // else we take M becomes N and the modulo
    public function gcd($N,$M){
        // back at start
        if($M == 0){
            return $N;
        }

        return $this->gcd($M, $N % $M);
    }

    public function commonPrimeDivisors($A, $B)
    {
        $count = 0;

        $zip = array_combine($A, $B);

        foreach ($zip as $x => $y){
             if($this->hasSamePrimeDivisors($x,$y)){
                 $count += 1;
             }
        }

        return $count;
    }

    public function hasSamePrimeDivisors($A,$B)
    {
        // The gcd contains all the common prime divisors
        $gcd_value = $this->gcd($A, $B);

        while($A != 1){
            $x_gcd = $this->gcd($A, $gcd_value);

            if($x_gcd == 1){
                break;
            }

            $A /= $x_gcd;
        }

        if($A != 1){
            return false;
        }

        while($B != 1){
            $y_gcd = $this->gcd($B, $gcd_value);
            if($y_gcd == 1){
                break;
            }

            $B /= $y_gcd;
        }

        return $B == 1;
    }
}