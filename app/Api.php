<?php

declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use App\Models\Currency;

class Api
{
    private Client $client;
    private const API_URL = 'https://api4.binance.com/api/v3/ticker/24hr?symbol=';

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false,
        ]);
    }

    public function getCryptoData(string $symbol)
    {
        $url = self::API_URL . $symbol;
        $response = $this->client->get($url);
        $data = json_decode((string)$response->getBody());

        return $data;
    }

    public function getInfo(string $symbol): Currency
    {
        $data = $this->getCryptoData($symbol);

        return new Currency(
            $data->symbol,
            $data->lastPrice,
            $data->highPrice,
            $data->lowPrice
        );
    }

    public function getCryptoInfoBySymbol(string $symbol): ?Currency
    {
        $data = $this->getCryptoData($symbol);

        if (isset($data->symbol)) {
            return new Currency(
                $data->symbol,
                $data->lastPrice ?? null,
                $data->highPrice ?? null,
                $data->lowPrice ?? null
            );
        }

        return null;
    }
}
