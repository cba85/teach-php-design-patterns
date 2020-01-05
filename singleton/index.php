<?php

class Singleton
{
    private static $instance;

    protected function __construct()
    {

    }

    protected function __clone()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new static;
        }

        print_r(self::$instance);

        return self::$instance;
    }
}

class Config extends Singleton
{
    public $data = [
        'db' => [
            'host' => 'localhost'
        ]
    ];
}

$config = Config::getInstance();
print_r($config->data);

//$config = new Config; // Impossible, violate the pattern
//$config2 = Config::getInstance();
//print_r($config == $config2);
//$config2 = clone $config;