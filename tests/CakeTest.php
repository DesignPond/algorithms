<?php use PHPUnit\Framework\TestCase;

class CakeTest extends TestCase
{
    public function testMeetingSort()
    {
        $cake = new src\Cake();

        $meetings = [
            new src\Meeting(0, 1),
            new src\Meeting(3, 5),
            new src\Meeting(4, 8),
            new src\Meeting(10, 12),
            new src\Meeting(9, 10),
        ];

        $this->assertEquals([[0,1],[3,8],[9,12]],$cake->mergeRanges($meetings));

        $meetings = [
            new src\Meeting(1, 2),
            new src\Meeting(2, 3),
        ];

        $this->assertEquals([[1,3]],$cake->mergeRanges($meetings));

        $meetings = [
            new src\Meeting(1, 5),
            new src\Meeting(2, 3),
        ];

        $this->assertEquals([[1,5]],$cake->mergeRanges($meetings));

        $meetings = [
            new src\Meeting(1, 10),
            new src\Meeting(2, 6),
            new src\Meeting(3, 5),
            new src\Meeting(7, 9),
        ];

        $this->assertEquals([[1,10]],$cake->mergeRanges($meetings));

    }

    public function testCyclicRotation()
    {
        $cake = new src\Cake();

        $S = 'cindy';
        $reverse = $cake->reverse($S);

        $this->assertEquals('ydnic',$reverse);
    }
}
