<?php use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testBinGap()
    {
        $math    = new \src\Math();
        $numbers = [
            5       => 1,
            17      => 3,
            25      => 2,
            1223243 => 2,
            251     => 1,
            9       => 2,
            529     => 4,
            20      => 1,
            32      => 0,
            1041    => 5
        ];

        foreach ($numbers as $number => $expected){
            $this->assertEquals($expected,$math->binGap($number));
        }
    }

    public function testCyclicRotation()
    {
        $math = new \src\Math();

        $A = [0,0,0,0];
        $K = 6;

        $expected = [0,0,0,0];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);

        $A = [2,1,5,7];
        $K = 3;

        $expected = [1,5,7,2];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);

        $A = [54,32,0,1,8,4];
        $K = 2;

        $expected = [8,4,54,32,0,1];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);

        $A = [2,1,5,7];
        $K = 6;

        $expected = [5,7,2,1];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);

        $A = [3, 8, 9, 7, 6];
        $K = 3;

        $expected = [9, 7, 6, 3, 8];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);

        $A = [];
        $K = 3;

        $expected = [];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);

        $A = [-3,-6,7,1];
        $K = 1;

        $expected = [1,-3,-6,7];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);

        $A = [-3,-6,7,1];
        $K = 0;

        $expected = [-3,-6,7,1];

        $result = $math->cyclicRotation($A, $K);

        $this->assertEquals($expected,$result);
    }

    public function testCyclicRotation2()
    {
        $math = new \src\Math();

        $A = [1, 1, 2, 3, 5];
        $K = 42;

        $expected = [3, 5, 1, 1, 2];

        $result = $math->cyclicRotation2($A, $K);

        $this->assertEquals($expected,$result);

        $A = [0,0,0,0];
        $K = 6;

        $expected = [0,0,0,0];

        $result = $math->cyclicRotation2($A, $K);

        $this->assertEquals($expected,$result);

        $A = [2,1,5,7];
        $K = 3;

        $expected = [1,5,7,2];

        $result = $math->cyclicRotation2($A, $K);

        $this->assertEquals($expected,$result);

        $A = [54,32,0,1,8,4];
        $K = 2;

        $expected = [8,4,54,32,0,1];

        $result = $math->cyclicRotation2($A, $K);

        $this->assertEquals($expected,$result);

        $A = [2,1,5,7];
        $K = 6;

        $expected = [5,7,2,1];

        $result = $math->cyclicRotation2($A, $K);

        $this->assertEquals($expected,$result);

        $A = [3, 8, 9, 7, 6];
        $K = 3;

        $expected = [9, 7, 6, 3, 8];

        $result = $math->cyclicRotation2($A, $K);

        $this->assertEquals($expected,$result);

        $A = [];
        $K = 3;

        $expected = [];

        $result = $math->cyclicRotation2($A, $K);

        $this->assertEquals($expected,$result);
    }

    public function testOddOccurence()
    {
        $math = new \src\Math();
        $A = [0 => 9, 1 => 3, 2 => 9, 3 => 3, 4 => 9, 5 => 7, 6 => 9];

        $this->assertEquals(7,$math->oddOccurrencesInArray($A));

        $A = [0 => 5, 1 => 3, 2 => 3, 3 => 6, 4 => 6, 5 => 2, 6 => 2];

        $this->assertEquals(5,$math->oddOccurrencesInArray($A));

        $A = [0 => 123456, 1 => 3000000, 2 => 3000000, 3 => 6876543, 4 => 3000000, 5 => 3000000, 6 => 6876543];

        $this->assertEquals(123456,$math->oddOccurrencesInArray($A));

        $A = [2, 3, 4, 5, 2, 4, 3, 2, 4, 4, 2];

        $this->assertEquals(5,$math->oddOccurrencesInArray($A));

        $r1 = range(1,251);

        $A = array_merge($r1,$r1,[1111]);

        $this->assertEquals(1111,$math->oddOccurrencesInArray($A));
    }

    public function testFrogJmp()
    {
        $math = new \src\Math();

        $X = 10;
        $Y = 85;
        $D = 30;

        $this->assertEquals(3,$math->frogJmp($X,$Y,$D));

        $X = 5;
        $Y = 105;
        $D = 20;

        $this->assertEquals(5,$math->frogJmp($X,$Y,$D));

        $X = 35;
        $Y = 65;
        $D = 15;

        $this->assertEquals(2,$math->frogJmp($X,$Y,$D));
    }

    public function permMissingElem()
    {
        $math = new \src\Math();

        $data = [1,3,4,5,6,7,8];

        $this->assertEquals(2,$math->permMissingElem($data));

        $math = new \src\Math();

        $data   = range(1,1000000);
        $data[] = 1000002;

        $this->assertEquals(1000001,$math->permMissingElem($data));
    }

    public function testTapeEquilibrium()
    {
        $math = new \src\Math();

        $data = [1,3,2,4];

        // 1 - 9 = 8
        // 4 - 6 = 2
        // 4 - 5 = 2

        $this->assertEquals(2,$math->tapeEquilibrium($data));
    }

    public function testFrogRiverOne()
    {
        $math = new \src\Math();

        $A = [1,3,1,4,2,3,5,4]; // 6
        $X = 5;

        $this->assertEquals(6,$math->frogRiverOne($X, $A));

        $A = [1, 3, 1, 4, 2, 3, 5, 4]; // 6
        $X = 5;

        $this->assertEquals(6,$math->frogRiverOne($X, $A));

        $A = [1,2,0,3,4,5,3,2,1,3,2,1,4,6,3,4,1,7,4,2,3]; // 18
        $X = 7;

        $this->assertEquals(17,$math->frogRiverOne($X, $A));

        $this->assertEquals(17,$math->frogRiverOne2($X, $A));
    }

    public function testMaxCounters()
    {
        $math = new \src\Math();

        $A = [3,4,4,6,1,4,4];
        $N = 5;

        $this->assertEquals([3, 2, 2, 4, 2],$math->maxCounters($N, $A));

        $A = [1,2,2,4,3];
        $N = 3;

        /*  1 0 0
          1 1 0
          1 2 0
          2 2 2
          2 2 3
        */

        $this->assertEquals([2, 2, 3],$math->maxCounters($N, $A));
    }

    public function testMissingInteger()
    {
        $math = new \src\Math();

        $A = [1, 3, 6, 4, 1, 2];
        $expected = 5;

        $this->assertEquals($expected,$math->missingInteger($A));

        $A = [1, 2, 3];
        $expected = 4;

        $this->assertEquals($expected,$math->missingInteger($A));

        $A = [-1,-3];
        $expected = 1;

        $this->assertEquals($expected,$math->missingInteger($A));

        $A = [0,0,0,0];
        $expected = 1;

        $this->assertEquals($expected,$math->missingInteger($A));

        $A = [-2,1,-6,2];
        $expected = 3;

        $this->assertEquals($expected,$math->missingInteger($A));

        $A   = range(1,765);
        $A[] = 767; // missing 766
        shuffle($A);

        $expected = 766;

        $this->assertEquals($expected,$math->missingInteger($A));
    }

    public function testPermCheck()
    {
        $math = new \src\Math();

        $A = [4,1,3,2];

        $this->assertEquals(1,$math->permCheck($A));

        $A = [4,1,2];

        $this->assertEquals(0,$math->permCheck($A));

        $A = [0,0,0];

        $this->assertEquals(0,$math->permCheck($A));

        $A = [2,2];

        /*   $this->assertEquals(0,$math->permCheck($A));
   
           $A = [2,3];
   
           $this->assertEquals(1,$math->permCheck($A));
   
           $A = [100000];
   
           $this->assertEquals(1,$math->permCheck($A));
   
           $A = range(100,100000);
           $A[] = 1000001;
           shuffle($A);*/

        $this->assertEquals(0,$math->permCheck($A));
    }

    public function testCountDiv()
    {
        $math = new \src\Math();

        $A = 1;
        $B = 10;
        $K = 2;

        $results = $math->countDiv($A, $B, $K);

        $this->assertEquals(5,$results);

        $A = 6;
        $B = 11;
        $K = 2;

        $results = $math->countDiv($A, $B, $K);

        $this->assertEquals(3,$results);

        $A = 0;
        $B = 2000000000;
        $K = 1;

        $results = $math->countDiv($A, $B, $K);

        $this->assertEquals(2000000001,$results);
    }

    public function testGenomicRangeQuery()
    {
        $math = new \src\Math();

        $S = 'CAGCCTA';

        $P = [2,5,0];
        $Q = [4,5,6];

        $this->assertEquals([2,4,1],$math->genomicRangeQuery($S, $P, $Q));

        $S = 'CCCTA';

        $P = [0,3,4];
        $Q = [2,3,4];

        $this->assertEquals([2,4,1],$math->genomicRangeQuery($S, $P, $Q));
    }

    public function testMinAvgTwoSlice()
    {
        $math = new \src\Math();

        $A = [1,2,4];

        $this->assertEquals(1,$math->minAvgTwoSlice($A));
    }

    public function testPassingCars()
    {
        $math = new \src\Math();

        $A = [0,1,0,1,1];

        $this->assertEquals(5,$math->passingCars($A));
    }

    public function testMaxProductOfThree()
    {
        $math = new \src\Math();

        $A = [-3,1,2,-2,5,6];

        $this->assertEquals(60,$math->maxProductOfThree($A));

        $A = [1,2,2,3];

        $this->assertEquals(12,$math->maxProductOfThree($A));
    }

    public function testNumberOfDiscIntersections()
    {
        $math = new \src\Math();

        $x1 = -10;
        $y1 = 8;
        $x2 = 14;
        $y2 = -24;
        $r1 = 30;
        $r2 = 10;

        $this->assertEquals(1,$math->intersect($x1,$x2,$y1,$y2,$r1,$r2));
    }

}
