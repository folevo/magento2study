<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 12.1.19
 * Time: 13.38
 */

namespace Test\Db\Setup\Patch\ReportInstall;

use Magento\Eav\Setup\EavSetup;

class ReportInstall extends EavSetup
{
    public function getDefaultEntities()
    {
        $entities = [
            'test_db_report' => [
                'entity_model' => 'Test\Db\Model\ResourceModel\Report',
                'table' =>  'test_db_report_entity',
                'attributes' => [
                    'content' => [
                        'type' => 'static',
                    ],
                    'status' => [
                        'type' => '',
                    ],
                    'state' => [
                        'type' => 'static',
                    ],
                ],
            ],
        ];
        return $entities;
    }
}