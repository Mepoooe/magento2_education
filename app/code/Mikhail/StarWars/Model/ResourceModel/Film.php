<?php
namespace Mikhail\StarWars\Model\ResourceModel;
class Film extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('mikhail_starwars_film','film_id');
    }
}
