<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Api;
use App\Response;

class SearchController
{
    private Api $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    public function show(): Response
    {
        $pairInput = $_GET['pair'] ?? null;
        $cryptoInfo = $this->api->getCryptoInfoBySymbol($pairInput);

        return new Response(
            'crypto/search',
            [
                'cryptoPairs' => [$cryptoInfo],
                'header' => 'SEARCH RESULT',
            ]
        );
    }
}