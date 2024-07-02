<?php

namespace App;

class ExchangeRateProvider
{
    private $rates;

    public function __construct()
    {
        // Hardcode or fetch the latest rates from the API
        $this->rates = [
            'EUR' => 1,
            'USD' => 1.1497,
            'JPY' => 129.53
        ];
    }

    public function getRate($currency)
    {
        return $this->rates[$currency];
    }
}
