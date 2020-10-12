<?php namespace src;

class Cake
{
    public function getMaxProfit($stockPrices)
    {
        if (count($stockPrices) < 2) {
            throw new InvalidArgumentException('Getting a profit requires at least 2 prices');
        }

        // we'll greedily update minPrice and maxProfit, so we initialize
        // them to the first price and the first possible profit
        $minPrice  = $stockPrices[0];
        $maxProfit = $stockPrices[1] - $stockPrices[0];

        // start at the second (index 1) time
        // we can't sell at the first time, since we must buy first,
        // and we can't buy and sell at the same time!
        // if we started at index 0, we'd try to buy *and* sell at time 0.
        // this would give a profit of 0, which is a problem if our
        // maxProfit is supposed to be *negative*--we'd return 0.
        for ($i = 1; $i < count($stockPrices); $i++) {
            $currentPrice = $stockPrices[$i];

            // see what our profit would be if we bought at the
            // min price and sold at the current price
            $potentialProfit = $currentPrice - $minPrice;

            // update maxProfit if we can do better
            $maxProfit = max($maxProfit, $potentialProfit);

            // update minPrice so it's always
            // the lowest price we've seen so far
            $minPrice = min($minPrice, $currentPrice);
        }

        return $maxProfit;
    }

    public function mergeRanges($meetings)
    {
        $stack = new \src\Stack();

        $ranges = [];
        $times  = [];

        for($i = 0; $i < count($meetings) ;$i++) {
            $ranges[$meetings[$i]->getStartTime()] = range($meetings[$i]->getStartTime(),$meetings[$i]->getEndTime());
        }

        ksort($ranges);
        $ranges = array_values($ranges);

        $news = [];

        for($i = 0; $i < count($ranges) ;$i++) {
            $unique = array_unique($ranges[$i]);
            $first  = reset($unique);
            $last   = end($unique);

            $news[] = [$first,$last];
        }

        $stack->push($news[0]);

        for($i = 1; $i < count($news) ;$i++) {

            $top = $stack->head();
            $end   = end($top);
            // If the current interval does not overlap with the stacktop, push it.
            if($end < $news[$i][0]){
                $stack->push($news[$i]);
            }
            elseif($end < $news[$i][1]){
                // If the current interval overlaps with stack top and ending
                // time of current interval is more than that of stack top,
                // update stack top with the ending time of current interval.
                $end = $news[$i][1];
                $stack->pop();
                $stack->push([$top[0],$end]);
            }
        }

       return $stack->stack;
    }

    public function reverse(&$S)
    {
        //return implode(array_reverse(str_split($S)));
        //return strrev($S);
        $leftIndex = 0;
        $rightIndex = strlen($S) - 1;

        while ($leftIndex < $rightIndex) {

            // swap characters
            $temp = $S[$leftIndex];

            $S[$leftIndex]  = $S[$rightIndex];
            $S[$rightIndex] = $temp;

            // move towards middle
            $leftIndex++;
            $rightIndex--;
        }

        return $S;
    }

    public function reverseLinkedList($node){
        // initialize prev to null
        $prev    = null;
        // put passed node or head in current variable
        $current = $node;

        // While current is not null, we aren't at the end loop
        while ($current !== null ) {
            // put the next node in the next variable
            $next = $current->getNext();
            // set the next of the current to the previous node
            $current->setNext($prev);
            // swap prev for the current
            $prev    = $current;
            // set current to the next
            $current = $next;
        }

        // Head becomes the last prev node
        $node = $prev;

        return $node;
    }
}