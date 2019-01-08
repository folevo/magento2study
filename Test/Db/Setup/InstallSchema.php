<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.11.18
 * Time: 13.22
 */

namespace Test\Db\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
            $table = $setup->getConnection()->newTable($setup->getTable('example_topics'))
                ->addColumn(
                    'id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true]
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    '255',
                    []
                )
                ->addColumn(
                    'description',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    '255',
                    []
                )->addColumn(
                    'likes',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    '255'
                )->addColumn(
                    'is_hold',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    '255'
                )
            ;
            $setup->getConnection()->createTable($table);
            $entity = \Test\Db\Model\Employee::ENTITY;

            $table = $setup->getConnection()->newTable($setup->getTable($entity.'_entity'))
                ->addColumn(
                    'entity_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned'=>true, 'nullable'=> false, 'primary' => true],
                    'Entity ID'
                )->addColumn(
                    'email',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64',
                    [],
                    'Email'
                )->addColumn(
                    'first_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64',
                    [],
                    'First Name'
                )->addColumn(
                    'last_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64',
                    [],
                    'Last Name'
                )->setComment('Test db employee');
            ;

            $setup->getConnection()->createTable($table);
            $table = $setup->getConnection()->newTable($setup->getTable($entity.'_entity_decimal'))
                ->addColumn(
                    'value_id',
                        \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                        null,
                    ['identity' => true, 'nullable'=> false, 'primary'=> true],
                    'Value Id'
                )
                ->addColumn(
                    'attribute_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned'=> true, 'nullable'=> false, 'primary'=> true],
                    'Attribute Id'
                )
                ->addColumn(
                    'store_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    [
                        'unsigned'=> true,
                        'nullable' => false,
                        'default' => 0,
                    ],
                    'Store id'
                )
                ->addColumn(
                    'entity_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Entity id'

                )
                ->addColumn(
                    'value',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '12,4',
                    [],
                    'Value'
                )->addIndex(
                    $setup->getIdxName(
                        $entity . '_entity_decimal',
                        ['entity_id', 'attribute_id', 'store_id'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
                    ),
                    ['entity_id', 'attribute_id', 'store_id'],
                    ['type' =>
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
                )
                ->addIndex(
                    $setup->getIdxName($entity . '_entity_decimal', ['store_id']),
                    ['store_id']
                )
                ->addIndex(
                    $setup->getIdxName($entity . '_entity_decimal',
                        ['attribute_id']),
                    ['attribute_id']
                )->addForeignKey(
                    $setup->getFkName(
                        $entity . '_entity_decimal',
                        'attribute_id',
                        'eav_attribute',
                        'attribute_id'
                    ),
                    'attribute_id',
                    $setup->getTable('eav_attribute'),
                    'attribute_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->addForeignKey(
                    $setup->getFkName(
                        $entity . '_entity_decimal',
                        'entity_id',
                        $entity . '_entity',
                        'entity_id'
                    ),
                    'entity_id',
                    $setup->getTable($entity . '_entity'),
                    'entity_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->addForeignKey(
                    $setup->getFkName($entity . '_entity_decimal', 'store_id',
                        'store', 'store_id'),
                    'store_id',
                    $setup->getTable('store'),
                    'store_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
            ;
        $setup->getConnection()->createTable($table);
        $table = $setup->getConnection()->newTable($setup->getTable($entity.'_entity_int'))
            ->addColumn(
                'value_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable'=> false, 'primary'=> true],
                'Value Id'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned'=> true, 'nullable'=> false, 'primary'=> true],
                'Attribute Id'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                [
                    'unsigned'=> true,
                    'nullable' => false,
                    'default' => 0,
                ],
                'Store id'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'Entity id'

            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [],
                'Value'
            )->addIndex(
                $setup->getIdxName(
                    $entity . '_entity_int',
                    ['entity_id', 'attribute_id', 'store_id'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
                ),
                ['entity_id', 'attribute_id', 'store_id'],
                ['type' =>
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->addIndex(
                $setup->getIdxName($entity . '_entity_int', ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $setup->getIdxName($entity . '_entity_int',
                    ['attribute_id']),
                ['attribute_id']
            )->addForeignKey(
                $setup->getFkName(
                    $entity . '_entity_int',
                    'attribute_id',
                    'eav_attribute',
                    'attribute_id'
                ),
                'attribute_id',
                $setup->getTable('eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName(
                    $entity . '_entity_int',
                    'entity_id',
                    $entity . '_entity',
                    'entity_id'
                ),
                'entity_id',
                $setup->getTable($entity . '_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName($entity . '_entity_int', 'store_id',
                    'store', 'store_id'),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
        ;
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}