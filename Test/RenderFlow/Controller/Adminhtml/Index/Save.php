<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.1.19
 * Time: 11.59
 */

namespace Test\RenderFlow\Controller\Adminhtml\Index;

use  Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Test\Db\Model\ResourceModel\Employee as EmployeeResource;
use Test\Db\Model\EmployeeFactory;

class Save extends Action
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    protected $employeeResource;
    protected $employeeFactory;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        EmployeeResource $employeeResource,
        EmployeeFactory $employeeFactory
    ) {
        $this->employeeFactory = $employeeFactory;
        $this->dataPersistor = $dataPersistor;
        $this->employeeResource = $employeeResource;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $data = $this->getRequest()->getPostValue();
        $model = $this->employeeFactory->create();
        if ($data) {
            $id = $this->getRequest()->getParam('entity_id');
            if ($id) {
                try {
                    $this->employeeResource->load($model,$id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This employee no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }
            $model->setData($data);
            try {
                $this->employeeResource->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the employee.'));
                $this->dataPersistor->clear('employee_data');
                return $this->processEmployeeReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the employee.'));
            }

            $this->dataPersistor->set('employee_data', $data);
            return $resultRedirect->setPath('*/*/employee', ['entity_id' => $id]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    private function processEmployeeReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect ==='continue') {
            $resultRedirect->setPath('*/*/edit', ['entity_id' => $model->getId()]);
        } else {
            $resultRedirect->setPath('*/*/');
        }
        return $resultRedirect;
    }

}