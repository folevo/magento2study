<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 10.1.19
 * Time: 17.08
 */

namespace Test\RenderFlow\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Test\Db\Model\ResourceModel\Employee as EmployeeResource;
use Test\Db\Model\EmployeeFactory;

class InlineEdit extends Action
{
    private $employeeFactory;
    private $employeeResource;
    public function __construct(
        Action\Context $context,
        EmployeeFactory $employeeFactory,
        EmployeeResource $employeeResource
    ) {
        $this->employeeResource = $employeeResource;
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }
        try{
            foreach ($postItems as $item) {
                $employee = $this->employeeFactory->create();
                $employee->setData($item);
                $this->employeeResource->save($employee, $item);
            }
        } catch (\Exception $e) {

        }
        return $resultJson->setData([
            'messages' => $this->getErrorMessages(),
            'error' => $this->isErrorExists()
        ]);
    }

    /**
     * Get array with errors
     *
     * @return array
     */
    protected function getErrorMessages()
    {
        $messages = [];
        foreach ($this->getMessageManager()->getMessages()->getItems() as $error) {
            $messages[] = $error->getText();
        }
        return $messages;
    }

    /**
     * Check if errors exists
     *
     * @return bool
     */
    protected function isErrorExists()
    {
        return (bool)$this->getMessageManager()->getMessages(true)->getCount();
    }
}