<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.11.18
 * Time: 5.38
 */

namespace Test\AllXmlFiles\Model\ResourceModel;


class Attribute  extends \Magento\Eav\Model\ResourceModel\Attribute
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
        return $this->getTable('news_form_attribute');
    }

}