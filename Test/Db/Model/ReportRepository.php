<?php

namespace Test\Db\Model;

use Test\Db\Api\Data\ReportDataInterface;
use Test\Db\Api\ReportRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\EntityManager\EntityManager;
use Test\Db\Model\ResourceModel\Report\CollectionFactory;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Test\Db\Model\ReportFactory;

class ReportRepository implements ReportRepositoryInterface
{
    private $reportCollectionFacory;
    private $entityManager;
    private $results;
    private $collectionProcessor;
    private $reportFactory;

    public function __construct(
        EntityManager $entityManager,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $results,
        CollectionProcessorInterface $collectionProcessor,
        ReportFactory $reportFactory
    ) {
        $this->reportFactory = $reportFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->results = $results;
        $this->reportCollectionFacory = $collectionFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * @param ReportDataInterface $reportData
     * @return mixed
     */
    public function delete(ReportDataInterface $reportData)
    {
        $this->entityManager->delete($reportData);
        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->entityManager->load($this->reportFactory->create(), $id);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $reports = $this->reportCollectionFacory->create();
        $this->collectionProcessor->process($searchCriteria, $reports);
        $result = $this->results->create();
        $result->setItems($reports->getItems());
        $t = $reports->getSelectSql(true);
        return $result;
    }

    public function save(ReportDataInterface $reportData)
    {
        $this->entityManager->save($reportData);
    }
}