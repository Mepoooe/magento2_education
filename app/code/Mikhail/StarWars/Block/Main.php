<?php
namespace Mikhail\StarWars\Block;
use Magento\Framework\View\Element\Template;

class Main extends \Magento\Framework\View\Element\Template
{
    function _prepareLayout(){
        $starWarsFilmList = $this->getStarWarsFilms();
        $this->setFilmsList($starWarsFilmList);
    }

    private function getStarWarsFilms()
    {
        $request = new \Zend\Http\Request();
        $httpHeaders = new \Zend\Http\Headers();
        $httpHeaders->addHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);
        $request->setHeaders($httpHeaders);
        $request->setUri('http://swapi.co/api/films/');
        $request->setMethod(\Zend\Http\Request::METHOD_GET);

        $client = new \Zend\Http\Client();
        $options = [
            'adapter'   => 'Zend\Http\Client\Adapter\Curl',
            'curloptions' => [CURLOPT_FOLLOWLOCATION => true],
            'timeout' => 30
        ];
        $client->setOptions($options);

        $response = $client->send($request);
        $responseContent = json_decode($response->getBody());
        return $this->prepareStarWarsFilmsList($responseContent->results);
    }

    private function prepareStarWarsFilmsList($starWarsFilmList)
    {
        $list = [];
        foreach ($starWarsFilmList as $starWarsFilm) {
            $list[] = [
              'title' => $starWarsFilm->title,
              'episodeId' => $starWarsFilm->episode_id,
              'description' => $starWarsFilm->opening_crawl,
              'releaseDate' => $starWarsFilm->release_date,
              'link' => 'google.com/search?q=' . $starWarsFilm->title,
            ];
        }

        return $list;
    }
}
