<?php namespace src;

class Stack
{
    public $size;
    public $stack;

    public function __construct()
    {
        $this->size = 0;
        $this->stack = [];
    }

    public function push($x)
    {
        $this->stack[$this->size] = $x;
        $this->size += 1;
    }

    public function pop()
    {
        $this->size -= 1;

        return $this->stack[$this->size];
    }

    public function head()
    {
        return $this->stack[$this->size - 1] ?? 0;
    }
}