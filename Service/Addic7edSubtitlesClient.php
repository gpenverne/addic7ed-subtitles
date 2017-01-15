<?php

namespace Gpenverne\Addic7edSubtitlesBundle\Service;

use Alc\Addic7edCli\Component\HttpClient;
use Alc\Addic7edCli\Component\SubtitleSelector;
use Alc\Addic7edCli\Database\Addic7edDatabase;

class Addic7edSubtitlesClient
{
    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * @var Addic7edDatabase
     */
    protected $database;

    /**
     * @param  string $query
     * @param  int    $season
     * @param  int    $episod
     * @param  string $language
     *
     * @return array
     */
    public function getSubtitles($query, $season, $episod, $language = 'English')
    {
        $returnedSubtitles = [];
        $subtitles = $this->getDatabase()->find($query, $language, $season, $episod);
        foreach ($subtitles as $subtitle) {
            $request = $this->getClient()->request('GET', $subtitle->url);
            $subtitle->content = $request->getBody()->getContents();
            $returnedSubtitles[] = $subtitle;
        }

        return $returnedSubtitles;
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        if (null !== $this->client) {
            return $this->client;
        }

        $client = new HttpClient();
        $this->client = $client->getClient();

        return $this->client;
    }

    /**
     * @return Addic7edDatabase
     */
    public function getDatabase()
    {
        if (null !== $this->database) {
            return $this->database;
        }

        $this->database = new Addic7edDatabase($this->getClient());

        return $this->database;
    }
}
