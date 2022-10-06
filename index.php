<?php
require('vendor/autoload.php');

use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;

$client = HttpClientDiscovery::find();
$messageFactory = MessageFactoryDiscovery::find();
$homeResponse = $client->sendRequest(
    $messageFactory->createRequest('GET', 'http://httplug.io')
);

var_dump($homeResponse->getStatusCode()); // 200, hopefully

$missingPageResponse = $client->sendRequest(
    $messageFactory->createRequest('GET', 'http://httplug.io/missingPage')
);

var_dump($missingPageResponse->getStatusCode()); // 404 ?> 