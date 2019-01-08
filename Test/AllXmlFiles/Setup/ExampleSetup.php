<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 7.11.18
 * Time: 11.53
 */

namespace Test\AllXmlFiles\Setup;

use Magento\Eav\Setup\EavSetup;

class ExampleSetup extends EavSetup
{
    public function getDefaultEntities()
    {
        $entity = \Test\AllXmlFiles\Model\ResourceModel\News::ENTITY;
        $entities = [
            $entity => [
                'entity_model' => 'Test\AllXmlFiles\Model\ResourceModel\News',
                'table' => $entity . '_entity',
                'attributes' => [
                    'typ_id' => [
                        'type' => 'static',
                    ],
                    'name' => [
                        'type' => 'static',
                    ],
                    'description' => [
                        'type' => 'static',
                    ],
                ],
            ],
        ];
        return $entities;
    }
}