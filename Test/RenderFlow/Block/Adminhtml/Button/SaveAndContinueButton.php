<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 9.1.19
 * Time: 11.38
 */

namespace Test\RenderFlow\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class SaveAndContinueButton extends Generic\SaveGeneric implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $employeeId = $this->getEmployeeId();
        $canModify = !$employeeId;
        $data = [];
        if ($canModify) {
            $data = [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit'],
                    ],
                ],
                'sort_order' => 80,
            ];
        }
        return $data;
    }
}