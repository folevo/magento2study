<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 8.1.19
 * Time: 8.31
 */

namespace Test\RenderFlow\UI;


use Test\Db\Model\ResourceModel\Employee\CollectionFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Framework\Api\Search\SearchCriteria;
use Magento\Framework\Api\Search\DocumentFactory;
use Magento\Framework\Api\Search\SearchResult;

class DataProvider extends  \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * Topics collection
     *
     * @var \Test\Db\Model\ResourceModel\Employee\CollectionFactory
     */
    protected $collection;

    /**
     * @var \Magento\Ui\DataProvider\AddFieldToCollectionInterface[]
     */
    protected $addFieldStrategies;

    /**
     * @var \Magento\Ui\DataProvider\AddFilterToCollectionInterface[]
     */
    protected $addFilterStrategies;
    protected $modifiersPool;
    protected $documentFactory;
    /**
     * @var SearchCriteria
     */
    protected $searchCriteria;
    protected $searchResult;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param \Magento\Ui\DataProvider\AddFieldToCollectionInterface[] $addFieldStrategies
     * @param \Magento\Ui\DataProvider\AddFilterToCollectionInterface[] $addFilterStrategies
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        SearchCriteria $searchCriteria,
        DocumentFactory $documentFactory,
        SearchResult $searchResult,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = [],
        PoolInterface $modifiersPool = null
    ) {
        $this->searchResult = $searchResult;
        $this->documentFactory = $documentFactory;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->addFieldStrategies = $addFieldStrategies;
        $this->addFilterStrategies = $addFilterStrategies;
        $this->modifiersPool = $modifiersPool ?: ObjectManager::getInstance()->get(PoolInterface::class);
        $this->searchCriteria = $searchCriteria;
    }
    /**
     * Returns search criteria
     *
     * @return \Magento\Framework\Api\Search\SearchCriteria
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $data = [];
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $items = $this->getCollection()->toArray();

        $data = [
            'totalRecords' => $this->getCollection()->getSize(),
            'items' => array_values($items),
        ];
        /** @var ModifierInterface $modifier */
        foreach ($this->modifiersPool->getModifiersInstances() as $modifier) {
            $data = $modifier->modifyData($data);
        }
        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getMeta()
    {
        $meta = parent::getMeta();

        /** @var ModifierInterface $modifier */
        foreach ($this->modifiersPool->getModifiersInstances() as $modifier) {
            $meta = $modifier->modifyMeta($meta);
        }

        return $meta;
    }

    public function prepareCsvExport($items)
    {
        $apiDocs = [];
        foreach ($items as $item) {
            $apiDocs[] = $doc = $this->documentFactory->create($item);
            foreach ($item as $key => $value) {
                $dataObject = new \Magento\Framework\DataObject();
                $dataObject->setValue($item[$key]);
                $customAttributes[$key] =  $dataObject;
            }
            $doc->setCustomAttributes($customAttributes);
        }

        $this->searchResult->setItems($apiDocs);
        $this->searchResult->setTotalCount(count($apiDocs));
    }
    /**
     * Returns SearchResult
     *
     * @return \Magento\Framework\Api\Search\SearchResultInterface
     */
    public function getSearchResult()
    {
        $this->prepareCsvExport($this->getCollection()->toArray());
        return $this->searchResult;
    }
}