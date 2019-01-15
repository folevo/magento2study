<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 26.11.18
 * Time: 6.00
 */

namespace Test\Db\Model\ResourceModel\Employee;


class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init(\Test\Db\Model\Employee::class, \Test\Db\Model\ResourceModel\Employee::class);
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }
}