<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.11.18
 * Time: 12.43
 */

namespace Test\Db\Model;


use phpDocumentor\Reflection\Types\Self_;
use Test\Db\Api\Data\TopicsInterface;
use Magento\Framework\Validator\DataObjectFactory;
use Magento\Framework\DataObject\IdentityInterface;

class Topics extends \Magento\Framework\Model\AbstractModel implements TopicsInterface, IdentityInterface
{
    protected $exampleValidator;
    protected $dataObjectValidatorFactory;
    const CACHE_TAGS = 'example_topics';
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Test\Db\Model\Vaildator\ExampleValidator $exampleValidator,
        DataObjectFactory $dataObjectValidatorFactory,
        \Magento\Framework\Model\ResourceModel\AbstractResource  $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->dataObjectValidatorFactory = $dataObjectValidatorFactory;
        $this->exampleValidator = $exampleValidator;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAGS.'_'.$this->getId()];
    }
    protected function _construct()
    {
       $this->_init(\Test\Db\Model\ResourceModel\Topics::class);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function getLikes()
    {
        return $this->getData(self::LIKES);
    }

    public function getIsHold()
    {
        return $this->getData(self::IS_HOLD);
    }

    protected function _getValidationRulesBeforeSave()
    {
        $validatorObject = $this->dataObjectValidatorFactory->create();
        $validatorObject->addRule(
            $this->exampleValidator,
            'name'
        );
        return $validatorObject;
        //return $this->exampleValidator;
    }

    public function getCacheTags()
    {
        if ($this->getId()) {
            $this->_cacheTag = $this->getIdentities();
            if ($this->_cacheTag) {
               return $this->_cacheTag;
            }
        }
        return parent::getCacheTags();
    }
}