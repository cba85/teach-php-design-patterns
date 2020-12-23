<?php

/*
class Uploader
{
    public function upload($file, $destination)
    {
        // FTP
        return;
    }
}

$uploader = new Uploader();
$uploader->upload('image.png', '/img');
*/

class Config
{
    protected $data = [
        'upload' => [
            'default' => 's3',
            'services' => [
                's3' => [
                    'apiKey' => 'azertyuiop',
                    'secret' => 'qsdfghjklm'
                ],
                'ftp' => [
                    'host' => 'ftp://11.1.1.1',
                    'password' => 'azertyuiop'
                ]
            ]
        ]
    ];

    public function get($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }
}

interface UploaderInterface
{
    public function upload($file, $destination);
}

class Uploader implements UploaderInterface
{
    protected $adapter;

    public function __construct($adapter)
    {
        return $this->adapter;
    }

    public function upload($file, $destination)
    {
        return $this->adapter;
    }
}

class S3Adapter
{
}

class FtpAdapter
{
}

class AdapterFactory
{
    public function make(Config $config)
    {
        switch ($config->get('upload')['default']) {
            case 's3':
                return new S3Adapter;
                break;
            case 'ftp';
                return new FtpAdapter;
                break;
        }
    }
}

class UploaderFactory
{
    protected AdapterFactory $adapter;

    public function __construct(AdapterFactory $adapter)
    {
        $this->adapter = $adapter;
    }

    public function make(Config $config)
    {
        return new Uploader($this->adapter->make($config));
    }
}

$config = new Config;
$factory = new UploaderFactory(new AdapterFactory);
$uploader = $factory->make($config);
$uploader->upload('image.png', '/img');
