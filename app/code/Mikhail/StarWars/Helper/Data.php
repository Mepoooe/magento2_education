<?php

namespace Mikhail\StarWars\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public $attributeList =  ['title', 'opening_crawl', 'director', 'producer'];

    protected $client;
    protected $url;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\HTTP\Client\Curl $client,
        $entity = "films"
    )
    {
        $this->client = $client;
        $this->url = "https://swapi.co/api/{$entity}/";
        parent::__construct($context);
    }

    public function getCollection()
    {
        $this->client->get($this->url);
        $response = json_decode($this->client->getBody());
        return $response->results;
    }

    public function getEntityById($entity_id)
    {
        $this->client->get("{$this->url}{$entity_id}/");
        $response = json_decode($this->client->getBody());
        return $response;
    }
}