<?php

require_once '../vendor/autoload.php';

use Ballen\PowergateClient\Client;

$client = new Client('http://172.25.87.201/', 'api', '__KEY_GOES_HERE__');

//echo $client->getRecords();

//echo $client->getRecord(4);

//echo $client->getDomain(1);