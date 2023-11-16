<?php

namespace App\Models;

class Currency
{
    private string $symbol;
    private $lastPrice;
    private $highPrice;
    private $lowPrice;

    public function __construct(string $symbol, $lastPrice, $highPrice, $lowPrice)
    {
        $this->symbol = $symbol;
        $this->lastPrice = (float)$lastPrice;
        $this->highPrice = (float)$highPrice;
        $this->lowPrice = (float)$lowPrice;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getLastPrice(): float
    {
        return $this->lastPrice;
    }

    public function getHighPrice(): float
    {
        return $this->highPrice;
    }

    public function getLowPrice(): float
    {
        return $this->lowPrice;
    }
}
