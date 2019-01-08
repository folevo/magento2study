<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 6.12.18
 * Time: 9.11
 */
namespace Test\AllXmlFiles\Model\Config;

use Magento\Framework\Module\Dir;

class SchemaLocator implements \Magento\Framework\Config\SchemaLocatorInterface
{
    /**
     * Path to corresponding XSD file with validation rules for merged config
     *
     * @var string
     */
    protected $schema = null;

    /**
     * Path to corresponding XSD file with validation rules for separate config files
     * @var string
     */
    protected $perFileSchema = null;
    const CONFIF_FILE_SCHEMA = 'custom_xsd.xsd';
    const CONFIF_FILE_MERGED_SCHEMA = 'custom_xsd_merged.xsd';

    /**
     * @param \Magento\Framework\Module\Dir\Reader $moduleReader
     */
    public function __construct(\Magento\Framework\Module\Dir\Reader $moduleReader)
    {
        $configDir = $moduleReader->getModuleDir(Dir::MODULE_ETC_DIR, 'Test_AllXmlFiles');
        $this->schema = $configDir.DIRECTORY_SEPARATOR.self::CONFIF_FILE_SCHEMA;
        $this->perFileSchema = $configDir.DIRECTORY_SEPARATOR.self::CONFIF_FILE_MERGED_SCHEMA;
    }

    public function getSchema()
    {
        return $this->schema;
    }

    public function getPerFileSchema()
    {
        return null;
        return $this->perFileSchema;
    }
}