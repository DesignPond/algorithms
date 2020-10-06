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
        $ranges = [];
        $times = [];
        $all = [];

        // 0 => 900

        for($i = 0; $i < count($meetings) ;$i++) {
            $ranges[] = $meetings[$i]->getStartTime();
            $ranges[] = $meetings[$i]->getEndTime();
            $times[$meetings[$i]->getEndTime().'-'.$meetings[$i]->getStartTime()] = ($meetings[$i]->getEndTime() * 30) - ($meetings[$i]->getStartTime() * 30) + 900;
        }

        sort($ranges);
        $ranges = array_unique($ranges);

        foreach($ranges as $range) {

        }

   /*     $newArray = [];
        $i = 0;

        foreach ($ranges as $index => $value) {
            if ($index == 0) {
                $newArray[$i][] = $value;
                continue;
            }
            if ($ranges[$index] == $ranges[$index-1]+1) { // consecutive
                $newArray[$i][] = $value;

            } else {
                $newArray[++$i][] = $value;
            }
        }*/

        echo '<pre>';
        print_r($ranges);
        print_r($times);
        echo '</pre>';
        exit;
    }
}