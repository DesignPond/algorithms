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

    public function testReverseLinkedList()
    {
        $a = new src\LinkedListNode(5);
        $b = new src\LinkedListNode(1);
        $c = new src\LinkedListNode(9);

        $a->setNext($b);
        $b->setNext($c);

        $cake = new src\Cake();

        $a = $cake->reverseLinkedList($a);
        $b = $a->getNext();
        $c = $b->getNext();

        $this->assertEquals(9,$a->getvalue());
        $this->assertEquals(1,$b->getvalue());
        $this->assertEquals(5,$c->getvalue());
    }

    public function testReverseLinkedList2()
    {
        $a = new src\LinkedListNode(5);

        $cake = new src\Cake();

        $a = $cake->reverseLinkedList($a);

        $this->assertEquals(5,$a->getvalue());
    }

    public function testReverseLinkedList3()
    {
        $a = new src\LinkedListNode(null);

        $cake = new src\Cake();

        $a = $cake->reverseLinkedList($a);

        $this->assertEquals(null,$a->getvalue());
    }
}
