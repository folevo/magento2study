<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 5.12.18
 * Time: 6.27
 */

namespace Test\Db\Model\ResourceModel;


class Attribute extends \Magento\Eav\Model\ResourceModel\Attribute
{
    /**
     * Get EAV website table
     *
     * Get table, where website-dependent attribute parameters are stored
     * If realization doesn't demand this functionality, let this function just return null
     *
     * @return string|null
     */
    protected function _getEavWebsiteTable()
    {
        return $this->getTable('allexample_eav_attribute_website');
    }

    /**
     * Get Form attribute table
     *
     * Get table, where dependency between form name and attribute ids is stored
     *
     * @return string|null
     */
    protected function _getFormAttributeTable()
    {
        return $this->getTable('customer_form_attribute');
    }
}