<?php
namespace Kram\Demo\Block;
class Main extends \Magento\Framework\View\Element\Template
{
    function _prepareLayout(){}

    public function setTitle()
    {
        return 'Hello word';
    }
}
