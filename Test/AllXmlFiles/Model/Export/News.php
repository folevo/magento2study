<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 7.11.18
 * Time: 10.07
 */

namespace Test\AllXmlFiles\Model\Export;


use Magento\Framework\App\ResourceConnection;

class News extends \Magento\ImportExport\Model\Export\Entity\AbstractEntity
{
    protected $rows;
    protected $attribute;
    protected $news;
    public function __construct(
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
        \Magento\Eav\Model\Config $config,
        ResourceConnection $resource,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Test\AllXmlFiles\Model\Export\RowsInterface $rows,
        \Magento\Eav\Model\ResourceModel\Entity\Attribute\Collection $attribute,
        \Test\AllXmlFiles\Model\ResourceModel\News\Collection $collection
    )
    {
        $this->news = $collection;
        $this->attribute = $attribute;
        $this->rows = $rows;
        parent::__construct($localeDate, $config, $resource, $storeManager);
    }

    protected function _getHeaderColumns()
    {
        return $this->rows->getHeaderNamesColumns();
    }

    protected function _getEntityCollection($resetCollection = false)
    {
        return $this->news;
    }

    public function export()
    {
        // TODO: Implement export() method.
    }

    public function getAttributeCollection()
    {
        return $this->attribute;
    }

    public function getEntityTypeCode() {
        return 'example_eav_model';
    }
}