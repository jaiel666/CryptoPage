<?php
return [
    ['GET', '/', ['App\Controllers\CryptoController', 'show']],
    ['GET', '/show', ['App\Controllers\SearchController', 'show']]
];