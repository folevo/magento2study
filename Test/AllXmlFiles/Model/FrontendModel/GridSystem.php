<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 1.11.18
 * Time: 9.48
 */

namespace Test\AllXmlFiles\Model\FrontendModel;


class GridSystem extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
    protected function _prepareToRender()
    {
        $this->addColumn (
            'name_custom',
            ['label'=>'Test name custom']
        );
        $this->addColumn (
        'name_custom1',
        ['label'=>'Test name custom1']
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = 'Add Test';
    }
}