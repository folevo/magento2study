<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.11.18
 * Time: 12.42
 */

namespace Test\Db\Model;


use Test\Db\Model\TopicsFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Test\Db\Model\ResourceModel\Topics\CollectionFactory;
use  Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor\SortingProcessor;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor\PaginationProcessor;

class TopicsRepository implements \Test\Db\Api\TopicRepositoryInterface
{
    private $topicsFactory;
    private $topicsResource;
    private $collectionProcessor;
    private $topicsCollectionFactory;
    private $searchResultsFactory;


    public function __construct(
        TopicsFactory $topicsFactory,
        ResourceModel\Topics $topicsResource,
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $topicsCollectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->searchResultsFactory = $searchResultsFactory;
        $this->topicsCollectionFactory = $topicsCollectionFactory;
        $this->topicsResource = $topicsResource;
        $this->topicsFactory = $topicsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function get($id)
    {
        return $this->topicsResource->load(
            $this->topicsFactory->create(),
            $id,
            'id'
        );
    }

    public function delete(\Test\Db\Api\Data\TopicsInterface $topic)
    {
        $this->topicsResource->delete($topic);
        return $this;
    }

    public function deleteById($id)
    {
        $topic = $this->get($id);
        $this->topicsResource->delete($topic);
        return $this;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $searchResult = $this->searchResultsFactory->create();
        $collection = $this->topicsCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult->setItems($collection->getItems());
        $t = $collection->getSelect()->__toString();
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);
        return $searchResult;
    }
}