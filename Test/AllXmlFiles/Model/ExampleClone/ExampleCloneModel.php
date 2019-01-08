<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 20.10.18
 * Time: 18.58
 */

namespace Test\AllXmlFiles\Model\ExampleClone;


class ExampleCloneModel extends \Magento\Framework\App\Config\Value
{
    /**
     * Get fields prefixes
     *
     * @return array
     */
    public function getPrefixes()
    {

            $prefixes[] = [
                'field' => 'ssss',
                'label' => 'xxx',
            ];

        return $prefixes;
    }
}