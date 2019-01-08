<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 31.10.18
 * Time: 11.05
 */

namespace Test\AllXmlFiles\Model\SourceModel;


class Date extends \Magento\Config\Block\System\Config\Form\Field
{
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element->setDateFormat(\Magento\Framework\Stdlib\DateTime::DATE_INTERNAL_FORMAT);
        //$element->setTimeFormat('HH:mm:ss');
        return parent::render($element);
    }
}