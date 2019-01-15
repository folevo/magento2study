<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.1.19
 * Time: 8.02
 */

namespace Test\RenderFlow\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Employee extends Action
{
    public function execute()
    {
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        return $result;
    }
}