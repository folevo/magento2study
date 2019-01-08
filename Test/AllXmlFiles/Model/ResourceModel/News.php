<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 6.11.18
 * Time: 10.47
 */

namespace Test\AllXmlFiles\Model\ResourceModel;


class News extends  \Magento\Eav\Model\Entity\AbstractEntity
{
    const ENTITY = 'example_eav_model';
    public function getEntityType()
    {
        if (empty($this->_type)) {
            $this->setType(self::ENTITY);
        }
        return parent::getEntityType();
    }
}