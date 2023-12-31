<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Api;
use App\Response;

class CryptoController
{
    private Api $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    public function show(): Response
    {
        $cryptoPairs = ['BTCUSDT', 'ETHUSDT', 'LTCUSDT'];
        $cryptoPairData = [];

        foreach ($cryptoPairs as $pair) {
            $cryptoPairData[] = $this->api->getInfo($pair);
        }

        return new Response(
            'crypto/show',
            [
                'cryptoPairs' => $cryptoPairData,
            ]
        );
    }
}