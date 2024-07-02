<?php

namespace App;

class Operation
{
    private $date;
    private $client;
    private $type;
    private $amount;
    private $currency;

    public function __construct($date, $client, $type, $amount, $currency)
    {
        $this->date = $date;
        $this->client = $client;
        $this->type = $type;
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
