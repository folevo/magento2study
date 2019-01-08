<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 6.11.18
 * Time: 10.53
 */

namespace Test\AllXmlFiles\Model\ResourceModel\News;


class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    public function _construct()
    {
       $this->_init(
           \Test\AllXmlFiles\Model\News::class,
           \Test\AllXmlFiles\Model\ResourceModel\News::class
       );
    }
}