<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 1.11.18
 * Time: 11.05
 */

namespace Test\AllXmlFiles\Model\BackendModel;


class ModelGrid extends \Magento\Framework\App\Config\Value
{
    protected $random;
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        \Magento\Framework\Math\Random $random,
        array $data = []
    ) {
        $this->random = $random;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    public function beforeSave()
    {
        $value = $this->getValue();
        $result = [];
        foreach ($value as $key => $val) {
            if(!$value || $key=='__empty') {
                continue;
            }
            $resultId = $this->random->getUniqueHash('_');
            $result[$resultId] = serialize($val);
        }
        $this->setValue($result);
    }
    /**
     * Process data after load
     *
     * @return void
     */
    protected function _afterLoad()
    {
        $value = $this->getValue();
        $value = explode(',', $value);
        if((!$value && !is_array($value)) || !$this->getValue()) {
            parent::_afterLoad();
            return $this;
        }
        $isSimpleArray = false;
        if(is_array($value)) {
            foreach ($value as $key => $val) {
                $resVal = unserialize($val);
                if($resVal === '') {
                    $resultId = $this->random->getUniqueHash('_');
                    $result[$resultId] = ['name_custom' => '', 'name_custom1' => ''];
                    continue;
                }
                $resultId = $this->random->getUniqueHash('_');
                $result[$resultId] = $resVal;
            }
            if($isSimpleArray) {
                $result = [];
                $result[$resultId] = $value;
            }
        }
        $this->setValue($result);
    }
}