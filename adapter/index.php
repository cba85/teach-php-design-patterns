<?php

class Youtube
{
    public function getVideoViewCount(int $id): int
    {
        return 5000;
    }
}

class Dailymotion
{
    public function getVideoViewNumber(int $id): int
    {
        return 3000;
    }
}

interface VideoAdapterInterface
{
    public function getViews(int $id);
}

class YoutubeAdapter implements VideoAdapterInterface
{
    protected $client;

    public function __construct(Youtube $client)
    {
        $this->client = $client;
    }

    public function getViews(int $id): int
    {
        return $this->client->getVideoViewCount($id);
    }
}

class DailymotionAdapter implements VideoAdapterInterface
{
    protected $client;

    public function __construct(Dailymotion $client)
    {
        $this->client = $client;
    }

    public function getViews(int $id): int
    {
        return $this->client->getVideoViewNumber($id);
    }
}

$youtube = new YoutubeAdapter(new Youtube);
echo $youtube->getViews(1);

$dailymotion = new DailymotionAdapter(new Dailymotion);
echo $dailymotion->getViews(1);
