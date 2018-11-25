<?php
namespace Mikhail\StarWars\Model\ResourceModel\Film;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Mikhail\StarWars\Model\Film','Mikhail\StarWars\Model\ResourceModel\Film');
    }
}
