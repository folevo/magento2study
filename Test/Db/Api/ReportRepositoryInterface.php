<?php
/**
 * Created by PhpStorm.
 * User: folevo
 * Date: 30.1.19
 * Time: 15.33
 */

namespace Test\Db\Api;

use Test\Db\Api\Data\ReportDataInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ReportRepositoryInterface
{
    /**
     * @param Data\ReportDataInterface $reportData
     * @return mixed
     */
    public function delete(ReportDataInterface $reportData);

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param ReportDataInterface $reportData
     * @return mixed
     */
    public function save(ReportDataInterface $reportData);
}