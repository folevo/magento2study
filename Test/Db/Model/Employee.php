<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 26.11.18
 * Time: 5.44
 */

namespace Test\Db\Model;


class Employee extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'test_db_employee';
    public function _construct()
    {
        parent::_init(\Test\Db\Model\ResourceModel\Employee::class);
    }
}