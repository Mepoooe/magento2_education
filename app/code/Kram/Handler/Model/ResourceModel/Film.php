<?php
namespace Kram\Handler\Model\ResourceModel;
class Film extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('handler_film','film_id');
    }
}
