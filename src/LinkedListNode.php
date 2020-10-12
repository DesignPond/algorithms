<?php namespace src;

class LinkedListNode
{
    private $value;
    private $next = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}