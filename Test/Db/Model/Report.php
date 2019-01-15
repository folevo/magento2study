<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 11.1.19
 * Time: 8.45
 */

namespace Test\Db\Model;


class Report extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'test_db_report';
    public function _construct()
    {
        parent::_init(\Test\Db\Model\ResourceModel\Report::class);
    }
}