<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 6.11.18
 * Time: 11.16
 */

namespace Test\AllXmlFiles\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


class InstallSchema implements InstallSchemaInterface
{
    private $exampleSetupFactory;
    public function __construct(
        \Test\AllXmlFiles\Setup\ExampleSetupFactory $employeeSetupFactory
    )
    {
        $this->exampleSetupFactory = $employeeSetupFactory;
    }
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $exampleSetup = $this->exampleSetupFactory->create();
        $exampleSetup->installEntities();
        $entity = \Test\AllXmlFiles\Model\ResourceModel\News::ENTITY;
//        $exampleSetup->addAttribute(
//            $entity,
//            'age',
//            ['type' => 'int']
//        );
//        $exampleSetup->addAttribute(
//            $entity,
//            'title',
//            ['type' => 'varchar']
//        );
        if(!$installer->getConnection()->isTableExists($entity.'_entity')) {
            $table = $installer->getConnection()
                ->newTable($installer->getTable($entity . '_entity'))
                ->addColumn(
                    'entity_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
                )->addColumn(
                    'name',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    '20',
                    ['nullable' => true]
                )->addColumn(
                    'typ_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    '20',
                    ['nullable' => true]
                )->addColumn(
                    'description',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    '64k',
                    ['nullable' => true]
                )->setComment('Foggyline Office Employee Table');
            $installer->getConnection()->createTable($table);
        }
        if(!$installer->getConnection()->isTableExists($entity.'_entity_int')) {
            $table = $installer->getConnection()->newTable($installer->getTable($entity . '_entity_int'))
                ->addColumn(
                    'value_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'Value ID'
                )
                ->addColumn(
                    'attribute_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Attribute ID'
                )
                ->addColumn(
                    'store_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Store ID'
                )
                ->addColumn(
                    'entity_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Entity ID'
                )
                ->addColumn(
                    'value',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [],
                    'Value'
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
                )->setComment('Foggyline Office Employee Table');;
            $installer->getConnection()->createTable($table);
        }
        if(!$installer->getConnection()->isTableExists($entity.'_entity_varchar')) {
            $table = $installer->getConnection()->newTable($installer->getTable($entity . '_entity_varchar'))
                ->addColumn(
                    'value_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'Value ID'
                )
                ->addColumn(
                    'attribute_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Attribute ID'
                )
                ->addColumn(
                    'store_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Store ID'
                )
                ->addColumn(
                    'entity_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Entity ID'
                )
                ->addColumn(
                    'value',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '255',
                    [],
                    'Value'
                )->addForeignKey(
                    $setup->getFkName(
                        $entity . '_entity_varchar',
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
                        $entity . '_entity_varchar',
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
                    $setup->getFkName($entity . '_entity_varchar', 'store_id',
                        'store', 'store_id'),
                    'store_id',
                    $setup->getTable('store'),
                    'store_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )->setComment('Foggyline Office Employee Table');;
            $installer->getConnection()->createTable($table);
        }
        if(!$installer->getConnection()->isTableExists('news_form_attribute')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('news_form_attribute')
            )->addColumn(
                'form_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                ['nullable' => false, 'primary' => true],
                'Form Code'
            )->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'primary' => true],
                'Attribute Id'
            )->addIndex(
                $installer->getIdxName('customer_form_attribute', ['attribute_id']),
                ['attribute_id']
            )->addForeignKey(
                $installer->getFkName(
                    'news_form_attribute',
                    'attribute_id',
                    'eav_attribute',
                    'attribute_id'
                ),
                'attribute_id',
                $installer->getTable('eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )->setComment(
                'Customer Form Attribute'
            );
            $installer->getConnection()->createTable($table);
        }
        if(!$installer->getConnection()->isTableExists('allexample_eav_attribute_website')) {
            /**
             * Create table 'customer_eav_attribute_website'
             */
            $table = $installer->getConnection()->newTable(
                $installer->getTable('allexample_eav_attribute_website')
            )->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'primary' => true],
                'Attribute Id'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'primary' => true],
                'Website Id'
            )->addColumn(
                'is_visible',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true],
                'Is Visible'
            )->addColumn(
                'is_required',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true],
                'Is Required'
            )->addColumn(
                'default_value',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                [],
                'Default Value'
            )->addColumn(
                'multiline_count',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true],
                'Multiline Count'
            )->addIndex(
                $installer->getIdxName('allexample_eav_attribute_website', ['website_id']),
                ['website_id']
            )->addForeignKey(
                $installer->getFkName('allexample_eav_attribute_website', 'attribute_id', 'eav_attribute', 'attribute_id'),
                'attribute_id',
                $installer->getTable('eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )->addForeignKey(
                $installer->getFkName('allexample_eav_attribute_website', 'website_id', 'store_website', 'website_id'),
                'website_id',
                $installer->getTable('store_website'),
                'website_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )->setComment(
                'AllExample Eav Attribute Website'
            );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}