<?php

namespace Gpenverne\Addic7edSubtitlesBundle\Service;

use Alc\Addic7edCli\Component\HttpClient;
use Alc\Addic7edCli\Component\SubtitleSelector;
use Alc\Addic7edCli\Database\Addic7edDatabase;

class Addic7edSubtitlesClient
{
    /**
     * @var Addic7edDatabase
     */
    protected $client;

    /**
     * @param  string  $filename
     * @param  boolean $download
     *
     * @return
     */
    public function getSubtitles($query, $language = 'en')
    {
        return $this->getClient()->find($query, $language);
    }

    /**
     * @return SubtitlesFinder
     */
    protected function getClient()
    {
        if (null !== $this->client) {
            return $this->client;
        }

        $client = new HttpClient();
        $client = $client->getClient();
        $this->client = new Addic7edDatabase($client);

        return $this->client;
    }
}
