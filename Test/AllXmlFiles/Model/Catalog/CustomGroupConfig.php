<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 16.10.18
 * Time: 11.03
 */

namespace Test\AllXmlFiles\Model\Catalog;


class CustomGroupConfig
{
    private $attributeConfig;

    public function __construct(\Magento\Catalog\Model\Attribute\Config $attributeConfig)
    {
        $this->attributeConfig = $attributeConfig;
    }

    public function getProductAttributes() {
        return $this->attributeConfig->getAttributeNames('my_custom_group');
    }
}