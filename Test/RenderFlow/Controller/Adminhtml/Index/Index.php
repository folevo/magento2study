<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 10.11.18
 * Time: 14.37
 */

namespace Test\RenderFlow\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Eav\Model\Entity\Increment\NumericValue;
use Test\Db\Model\TopicsRepository;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\FilterFactory;
use Magento\Framework\Api\Search\FilterGroupFactory;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrderFactory;
use Magento\Framework\Api\SortOrderBuilder;
use Test\Db\Model\ResourceModel\Topics;
use Test\Db\Model\TopicsFactory;
use Test\Db\Model\ResourceModel\Topics\CollectionFactory;
use Test\Db\Model\ResourceModel\Employee as EmployResource;
use Test\Db\Model\EmployeeFactory;
use Test\Db\Model\AttributeFactory;
use Magento\Eav\Model\Entity\TypeFactory;

class Index extends Action
{
    public function execute()
    {
        $result = $this->resultFactory->create('page');
        return $result;
    }
}