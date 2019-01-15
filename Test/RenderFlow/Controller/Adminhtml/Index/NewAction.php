<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.1.19
 * Time: 10.45
 */

namespace Test\RenderFlow\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class NewAction extends Action
{
    /**
     * Create new CMS block
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultForward = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_FORWARD);
        /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
        return $resultForward->forward('employee');
    }
}