<?php
/**
 * Created by PhpStorm.
 * User: folevo
 * Date: 1.2.19
 * Time: 9.38
 */

namespace Test\Db\Api\SearchCriteria\CollectionProcessor\FilterProcessor;

use Magento\Framework\Api\Filter;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor\FilterProcessor\CustomFilterInterface;
use Magento\Framework\Data\Collection\AbstractDb;

class EavFilters implements CustomFilterInterface
{
    public function apply(Filter $filter, AbstractDb $collection)
    {
        $collection->addFieldToFilter(
            $filter->getField(),
            [$filter->getConditionType()=> $filter->getValue()]
        );
        return true;
    }
}