<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 6.11.18
 * Time: 9.58
 */

namespace Test\AllXmlFiles\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class EventExample implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        die('Run Dispatch');
    }
}