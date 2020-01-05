<?php

class YouTube
{

    public function getVideoViewCount($id)
    {
        return 5000;
    }

}

interface VideoAdapterInterface
{
    public function getViews($id);
}

class YouTubeAdapter implements VideoAdapterInterface
{
    protected $client;

    public function __construct(YouTube $client)
    {
        $this->client = $client;
    }

    public function getViews($id)
    {
        return $this->client->getVideoViewCount($id);
    }
}

/*
$youtube = new Youtube;
echo $youtube->getVideoViewCount(1);
*/

$youtube = new YouTubeAdapter(new Youtube);
echo $youtube->getViews(1);