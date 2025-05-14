<?php

namespace App\Services;

class Pagination
{
    private $current;
    private $total;
    private $first;
    private $limit;

    public function __construct($current, $total, $limit = 3)
    {
        $this->limit = $limit;
        $this->total = $total;
        $this->setCurrent($current);
    }

    private function setFirst()
    {
        $this->first = floor(($this->current - 1) / $this->limit) * $this->limit + 1;
    }

    public function setCurrent($current)
    {
        $this->current = $current;
        $this->setFirst();
    }
    public function getCurrent()
    {
        return $this->current;
    }

    public function getPrevious()
    {
        return ($this->first == 1) ? null : $this->first - $this->limit;
    }

    public function getNext()
    {
        return ($this->first + $this->limit > $this->total) ? null : $this->first + $this->limit;
    }

    public function getFirst()
    {
        return $this->first;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getPages()
    {
        $pages = array();

        for ($i = $this->first; $i < $this->first + $this->limit; $i++) {
            if ($i > $this->total)
                break;

            $pages[] = $i;
        }

        return $pages;
    }
}
