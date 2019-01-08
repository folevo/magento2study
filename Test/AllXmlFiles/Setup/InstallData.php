<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 16.10.18
 * Time: 9.33
 */

namespace Test\AllXmlFiles\Setup;

use Magento\Catalog\Model\Product;
use Magento\Config\Model\ResourceModel\Config;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Resource Config
     *
     * @var Config
     */
    protected $resourceConfig;

    /**
     * Eav Setup Factory
     *
     * @var EavSetupFactory
     */
    protected $eavSetupFactory;

    /**
     * AddDefaultShippingMethodsService constructor
     *
     * @param Config $resourceConfig
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(Config $resourceConfig, EavSetupFactory $eavSetupFactory)
    {
        $this->resourceConfig = $resourceConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     *
     * @return void

     * @throws CouldNotSaveException
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        try {
//            $eavSetup->addAttribute(
//                Product::ENTITY,
//                'product_brand',
//                [
//                    'type' => 'varchar',
//                    'label' => 'Product Brand',
//                    'group' => 'General Information',
//                    'visible' => true,
//                    'required' => false,
//                    'user_defined' => false,
//                    'default' => '',
//                    'input' => 'text',
//                    'global' => ScopedAttributeInterface::SCOPE_STORE,
//                ]
//            );
//            $data = [];
//            $data[] = [
//                'name' => 'Test1',
//                'typ_id'=> 'test1',
//                'description' => 'test1'
//            ];
//            $data[] = [
//                'name' => 'Test2',
//                'typ_id'=> 'test2',
//                'description' => 'test2'
//            ];
//            $data[] = [
//                'name' => 'Test3',
//                'typ_id'=> 'test3',
//                'description' => 'test3'
//            ];
//            $table = $installer->getTable('test_export_test');
//            $installer->getConnection()->insertMultiple($table, $data);
        } catch (Exception $e) {
            throw new CouldNotSaveException(__('Could create product attribute: "%1"', $e->getMessage()), $e);
        }

        $installer->endSetup();
    }
}