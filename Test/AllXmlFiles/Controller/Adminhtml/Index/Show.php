<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 16.10.18
 * Time: 11.10
 */

namespace Test\AllXmlFiles\Controller\Adminhtml\Index;

use Magento\Backend\App\Action as BackendAction;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Test\AllXmlFiles\Model\Catalog\CustomGroupConfig;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Config\Data as ConfigData;
use Magento\Framework\App\Arguments\ValidationState;
use Test\AllXmlFiles\Model\Config\Service;

class Show extends BackendAction
{
    private $customGroupConfig;
    private $collectionFactory;
    private $filesystem;
    private $validationState;
    private $service;
    public function __construct(
        Context $context,
        CustomGroupConfig $customGroupConfig,
        CollectionFactory $collectionFactory,
        ValidationState $validationState,
        Service $service
    ) {
        $this->service = $service;
        $this->validationState = $validationState;
        $this->collectionFactory = $collectionFactory;
        $this->customGroupConfig = $customGroupConfig;
        BackendAction::__construct($context);
    }

    public function execute()
    {
        $productCollection = $this->collectionFactory->create();
        $productCollection->addIdFilter(
            [1,2,3]
        )->addAttributeToSelect(
          $this->customGroupConfig->getProductAttributes()
        )->setStoreId(1);
        $t = $this->service->getData();
        die;
        foreach ($productCollection as $item) {
            var_dump($item->getStyleBags());
        }
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Test Resource'));
        $resultPage->addBreadcrumb(__('Test Resource'), __('Test Resource'));
        return $resultPage;
    }
}