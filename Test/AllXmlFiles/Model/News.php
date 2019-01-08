<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 6.11.18
 * Time: 10.43
 */

namespace Test\AllXmlFiles\Model;

class News extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
       $this->_init(\Test\AllXmlFiles\Model\ResourceModel\News::class);
    }
}