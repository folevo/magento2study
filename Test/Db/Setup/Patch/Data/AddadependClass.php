<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 11.1.19
 * Time: 11.44
 */

namespace Test\Db\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

class AddadependClass implements DataPatchInterface,PatchVersionInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    private $reportInstall;

    /**
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        \Test\Db\Setup\Patch\ReportInstall\ReportInstall $reportInstall
    ) {
        /**
         * If before, we pass $setup as argument in install/upgrade function, from now we start
         * inject it with DI. If you want to use setup, you can inject it, with the same way as here
         */
        $this->moduleDataSetup = $moduleDataSetup;
        $this->reportInstall = $reportInstall;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $data = [
            [
                'content' => 'test h vam2',
                'status' => 4,
                'state' => 5
            ],
            [
                'content' => 'test h vam3',
                'status' => 6,
                'state' => 7
            ]

        ];
        $this->reportInstall->installEntities();
        $this->moduleDataSetup->getConnection()->insertMultiple('test_db_report_entity', $data);
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public static function getDependencies()
    {
        //debug_print_backtrace(0, 5);die;
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        /**
         * This internal Magento method, that means that some patches with time can change their names,
         * but changing name should not affect installation process, that's why if we will change name of the patch
         * we will add alias here
         */
    }

    public static function getVersion()
    {
        return '1.1.2';
    }
}