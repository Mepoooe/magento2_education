<?php
/**
 * Created by PhpStorm.
 * User: PC-misha
 * Date: 02.12.2018
 * Time: 20:25
 */

namespace Mikhail\StarWars\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;


class Dbase implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('product');
        $displayText->setText('Execute event successfully.');

        return $this;
    }
}