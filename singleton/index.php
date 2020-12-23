<?php

class Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new static;
        }

        return self::$instance;
    }
}

class Config extends Singleton
{
    public $data = [
        'db' => [
            'host' => '127.0.0.1',
            'name' => "users"
        ]
    ];
}

$config = Config::getInstance();
print_r($config->data);
