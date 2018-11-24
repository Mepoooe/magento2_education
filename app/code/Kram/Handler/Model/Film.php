<?php
namespace Kram\Handler\Model;
class Film extends \Magento\Framework\Model\AbstractModel implements \Kram\Handler\Api\Data\FilmInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'kram_handler_film';

    protected function _construct()
    {
        $this->_init('Kram\Handler\Model\ResourceModel\Film');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
