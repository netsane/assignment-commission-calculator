<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Calculator;
use App\Client;
use App\ExchangeRateProvider;
use App\Operation;

function readCsv($filename)
{
    $file = fopen($filename, 'r');
    $data = [];
    while (($line = fgetcsv($file)) !== FALSE) {
        $data[] = $line;
    }
    fclose($file);
    return $data;
}

function processOperations($filename)
{
    $operations = readCsv($filename);
    $exchangeRateProvider = new ExchangeRateProvider();
    $calculator = new Calculator($exchangeRateProvider);

    foreach ($operations as $operation) {
        list($date, $userId, $userType, $operationType, $amount, $currency) = $operation;
        $client = new Client($userId, $userType);
        $operation = new Operation($date, $client, $operationType, $amount, $currency);
        $fee = $calculator->calculate($operation);
        echo $fee . PHP_EOL;
    }
}

processOperations($argv[1]);
