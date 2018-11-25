<?php
namespace Mikhail\StarWars\Model;
class Film extends \Magento\Framework\Model\AbstractModel implements \Mikhail\StarWars\Api\Data\FilmInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'mikhail_starwars_film';

    protected function _construct()
    {
        $this->_init('Mikhail\StarWars\Model\ResourceModel\Film');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
