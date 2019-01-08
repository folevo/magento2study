<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 20.10.18
 * Time: 18.24
 */

namespace Test\AllXmlFiles\Block\Aminhtml\Config;


class ExampleFrontendModel extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return 'text example';
    }
}