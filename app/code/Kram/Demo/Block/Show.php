<?php
namespace Kram\Demo\Block;
class Show extends \Magento\Framework\View\Element\Template
{
    public function _prepareLayout(){
//        $this->setTitle('Hello World'); //Don't work =(
    }

//    public function _beforeToHtml(){
//        $this->setDesc('Hello Desk'); //Don't work =(
//    }
    public function setTitleByHtml($title)
    {
        $this->setTitle($title);
    }
}
