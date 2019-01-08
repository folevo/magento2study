<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 16.12.18
 * Time: 14.07
 */

namespace Test\RenderFlow\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
class Index extends Action
{
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultFactory->create('page');
       // $result = $this->resultFactory->create('json');
       // $result = $this->resultFactory->create('raw');
       // $result->setContents('test vam');
       // $result->setData(['test'=> 'test']);
        return $result;
    }
}