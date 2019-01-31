<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 11.1.19
 * Time: 8.50
 */

namespace Test\Db\Model\ResourceModel\Report;


class Collection  extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init(\Test\Db\Model\Report::class, \Test\Db\Model\ResourceModel\Report::class);
    }
}