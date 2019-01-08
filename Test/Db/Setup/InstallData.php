<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 26.11.18
 * Time: 7.13
 */

namespace Test\Db\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $employeeSetupFactory;
    public function __construct(\Test\Db\Setup\EmployeeSetupFactory $employeeSetupFactory)
    {
        $this->employeeSetupFactory = $employeeSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $employeeEntity = \Test\Db\Model\Employee::ENTITY;
        $employeeSetup = $this->employeeSetupFactory->create(['setup' => $setup]);
        $employeeSetup->installEntities();
        $employeeSetup->addAttribute(
            $employeeEntity, 'service_years', ['type' => 'int']
        );
        $employeeSetup->addAttribute(
            $employeeEntity, 'salary', ['type' => 'decimal']
        );
        $setup->endSetup();
    }
}