<?php

require_once '../vendor/autoload.php';

use Ballen\PowergateClient\Client;

$options = [];

$client = new Client('http://extra.bobbyallen.me/', 'api', '__KEY_GOES_HERE__', $options);

//echo $client->getRecords();

//echo $client->getRecord(4);

echo $client->getDomain(1);