<?php
namespace Test\Db\Api;

/**
 * Interface TopicRepositoryInterface
 * @package Test\Db\Api
 */
interface TopicRepositoryInterface
{
    /**
     * @param Data\TopicsInterface $topic
     * @return mixed
     */
    public function delete(\Test\Db\Api\Data\TopicsInterface $topic);

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}