<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 16.12.18
 * Time: 14.07
 */

namespace Test\RenderFlow\Controller\Index;

use Magento\Backend\App\Action;

class Index extends Action
{

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