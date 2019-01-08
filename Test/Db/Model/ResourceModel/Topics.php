<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.11.18
 * Time: 12.43
 */

namespace Test\Db\Model\ResourceModel;

use Magento\Framework\Validator\DataObjectFactory;

class Topics extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    private $exampleValidatorSecon;
    private $dataObjectValidatorFactory;
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Test\Db\Model\Vaildator\ExampleValidatorSecon $exampleValidatorSecon,
        DataObjectFactory $dataObjectValidatorFactory,
        $connectionName = null
    ) {
        $this->dataObjectValidatorFactory = $dataObjectValidatorFactory;
        $this->exampleValidatorSecon = $exampleValidatorSecon;
        parent::__construct($context, $connectionName);
    }

    protected function _construct()
    {
       $this->_serializableFields = ['test_serialize'=> '{}'];
       $this->_setResource('pipec');
       $this->_init('example_topics', 'id');
    }

    public function getValidationRulesBeforeSave()
    {
        $vo = $this->dataObjectValidatorFactory->create();
        $vo->addRule($this->exampleValidatorSecon, 'name');
        return $vo;
    }

//    /**
//     * Initialize unique fields
//     *
//     * @return $this
//     */
//    protected function _initUniqueFields()
//    {
//        $this->_uniqueFields = [['field'=> 'name', 'title'=>'name']];
//        return $this;
//    }
}