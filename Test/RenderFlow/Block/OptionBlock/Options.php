<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 5.1.19
 * Time: 16.37
 */

namespace Test\RenderFlow\Block\OptionBlock;


class Options implements \Magento\Framework\Option\ArrayInterface
{
    private $fixtureData = [
            ['label' => 'Label 1', 'value' => 1],
            ['label' => 'Label 2', 'value' => 2],
            ['label' => 'Label 3', 'value' => 3],
        ];
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return $this->fixtureData;
    }
}