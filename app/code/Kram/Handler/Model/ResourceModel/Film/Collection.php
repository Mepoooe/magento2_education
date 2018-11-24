<?php
namespace Kram\Handler\Model\ResourceModel\Film;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Kram\Handler\Model\Film','Kram\Handler\Model\ResourceModel\Film');
    }
}
