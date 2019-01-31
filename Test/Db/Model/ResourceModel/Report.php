<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 11.1.19
 * Time: 8.47
 */

namespace Test\Db\Model\ResourceModel;


class Report  extends \Magento\Eav\Model\Entity\AbstractEntity
{
    public function getEntityType()
    {
        if(empty($this->_type)) {
            $this->setType(\Test\Db\Model\Report::ENTITY);
        }
        return parent::getEntityType();
    }
}