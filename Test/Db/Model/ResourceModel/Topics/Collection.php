<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.11.18
 * Time: 13.13
 */

namespace Test\Db\Model\ResourceModel\Topics;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\Test\Db\Model\Topics::class, \Test\Db\Model\ResourceModel\Topics::class);
    }

//    public function toOptionArray()
//    {
//        return $this->_toOptionArray('dimas', 'name');
//    }

    /**
     * @return array
     */
    public function toOptionHash()
    {
        return $this->_toOptionHash();
    }
}