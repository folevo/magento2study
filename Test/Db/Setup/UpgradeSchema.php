<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 28.11.18
 * Time: 7.45
 */

namespace Test\Db\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class UpgradeSchema
 * @package Test\Db\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @var EmployeeSetupFactory
     */
    private $employeeSetupFactory;

    /**
     * UpgradeSchema constructor.
     * @param EmployeeSetupFactory $employeeSetupFactory
     */
    public function __construct(\Test\Db\Setup\EmployeeSetupFactory $employeeSetupFactory)
    {
        $this->employeeSetupFactory = $employeeSetupFactory;
    }

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->startSetup();
            $table = $setup->getConnection()->newTable($setup->getTable('test_db_employee_eav_attribute'))
                ->addColumn(
                    'attribute_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Attribute ID'
                )
                ->addColumn(
                    'is_global',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '1'],
                    'Is Global'
                )
                ->addColumn(
                    'is_visible',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '1'],
                    'Is Visible'
                ) ->addForeignKey(
                    $setup->getFkName('test_db_employee_eav_attribute', 'attribute_id', 'eav_attribute', 'attribute_id'),
                    'attribute_id',
                    $setup->getTable('eav_attribute'),
                    'attribute_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                );
            $setup->getConnection()->createTable($table);
            $setup->endSetup();
        }
    }
}