<?php namespace src;

class Meeting
{
    private $startTime;
    private $endTime;

    public function __construct($startTime, $endTime)
    {
        // number of 30 min blocks past 9:00 am
        $this->startTime = $startTime;
        $this->endTime   = $endTime;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    public function __toString()
    {
        return "($this->startTime, $this->endTime)";
    }
}