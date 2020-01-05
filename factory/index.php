<?php

class Config
{
    protected $data = [
        'upload' => [
            'default' => 's3',
            'services' => [
                's3' => [
                    'key' => '123',
                    'secret' => '456',
                ],
                'ftp' => [
                    'host' => 'abc',
                ],
            ],
        ],
    ];

    public function get($keys)
    {
        $data = $this->data;
        $keys = explode('.', $keys);

        foreach ($keys as $key) {
            if (array_key_exists($key, $data)) {
                $data = $data[$key];
                continue;
            }
        }
        return $data;
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
        $this->adapter = $adapter;
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
        switch ($config->get('upload.default')) {
            case 's3':
                return new S3Adapter;
                break;
            case 'ftp':
                return new FTPAdapter;
                break;
        }
    }
}

class UploaderFactory
{
    protected $adapter;

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
echo $config->get('upload.services.s3.secret');
$factory = new UploaderFactory(new AdapterFactory);
$uploader = $factory->make($config);

print_r($uploader->upload('file.txt', 'destination.txt'));