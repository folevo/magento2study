<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 11.11.18
 * Time: 10.59
 */

namespace Test\Db\Api\SearchCriteria\CollectionProcessor\FilterProcessor;

use Magento\Framework\Api\Filter;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor\FilterProcessor\CustomFilterInterface;
use Magento\Framework\Data\Collection\AbstractDb;

class CustomFilterProccessor implements CustomFilterInterface
{
    public function apply(Filter $filter, AbstractDb $collection)
    {
        $collection->addFieldToFilter('name', ['like' =>'%test']);
    }
}