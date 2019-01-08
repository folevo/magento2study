<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 13.10.18
 * Time: 21.05
 */

namespace Test\AllXmlFiles\Controller\Adminhtml\Index;

use Magento\Backend\App\Action as BackendAction;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Arguments\ValidationState;

class Index extends BackendAction
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Test Resource'));
        $resultPage->addBreadcrumb(__('Test Resource'), __('Test Resource'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_AllXmlFiles::allXmlFiles3');
    }
}