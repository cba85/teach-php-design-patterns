<?php

require 'vendor/autoload.php';

$config = new App\Config\Config(
    new App\Config\Parser\ArrayParser
);

$config->setParser(new App\Config\Parser\JsonParser);
//$config->load('config/database.php');
$config->load('config/database.json');

//print_r($config);

echo $config->get('mysql.host');