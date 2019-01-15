<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.1.19
 * Time: 17.57
 */

namespace Test\RenderFlow\UI\Element\ProviderColumns;


class EavAttributeProvaiderColumns
{
    private $eavAttributeRepository;
    private $searchCriteria;

    public function __construct(
        \Magento\Eav\Api\AttributeRepositoryInterface $eavAttributeRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
) {
        $this->eavAttributeRepository = $eavAttributeRepository;
        $this->searchCriteria = $searchCriteria;
    }

    public function getEmployeeAttribute()
    {
       return $attrList = $this->eavAttributeRepository->getList(
            \Test\Db\Model\Employee::ENTITY,
            $this->searchCriteria
        );
    }
}