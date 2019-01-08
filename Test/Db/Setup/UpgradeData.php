<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 26.11.18
 * Time: 7.34
 */

namespace Test\Db\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $employeeFactory;
    /**
     * @var EmployeeSetupFactory
     */
    private $employeeSetupFactory;

    public function __construct(
        \Test\Db\Model\EmployeeFactory $employeeFactory,
        \Test\Db\Setup\EmployeeSetupFactory $employeeSetupFactory
    )
    {
        $this->employeeSetupFactory = $employeeSetupFactory;
        $this->employeeFactory = $employeeFactory;
        $this->employeeFactory = $employeeFactory;
    }
    public function upgrade(ModuleDataSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        $eavSetup = $this->employeeSetupFactory->create(['setup' => $setup]);
//        $setup->startSetup();
//        $employee = $this->employeeFactory->create();
//        $employee->setEmail('john@sales.loc');
//        $employee->setFirstName('John');
//        $employee->setLastName('Doe');
//        $employee->setServiceYears(3);
//        $employee->setSalary(3800.00);
//        $employee->save();
//        $setup->endSetup();
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $eavSetup->updateEntityType(
                'test_db_employee',
                'additional_attribute_table',
                'test_db_employee_eav_attribute'
            );

        }
        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $eavSetup->updateEntityType(
                'test_db_employee',
                'additional_attribute_table',
                'test_db_employee_eav_attribute'
            );

        }
        $setup->endSetup();
    }
}