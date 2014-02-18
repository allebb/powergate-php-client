<?php

require_once '../vendor/autoload.php';

use Ballen\PowergateClient\Domain;
use Ballen\PowergateClient\Record;

// Optionally you can set additional settings such as proxy server credentials (See Guzzle documentation!)
$options = [];

// Set standard API connection details and credentials...
$api = [
    'server' => 'http://extra.bobbyallen.me/',
    'user' => 'api',
    'key' => '__KEY_GOES_HERE__',
];

$domains = new Domain($api['server'], $api['user'], $api['key'], $options);


//$domains->create(
//    [
//       'name' => 'ginga.com',
//       'type' => 'MASTER'
//   ])->getBody();

foreach ($domains->all() as $domain) {
    echo "- $domain->name <br>";
}

//$domain = $domains->find(1);
//echo var_dump($domain);


$records = new Record($api['server'], $api['user'], $api['key'], $options);

//var_dump($records->all());

foreach ($records->all() as $record) {
    echo "> $record->name is a $record->type record and has a target of $record->content. <br>";
}

//if ($records->delete(99)) {
//    echo "Done!";
//}

$domains->update(5, ['type' => 'master']);

$domains->commitSOAChanges(5);
