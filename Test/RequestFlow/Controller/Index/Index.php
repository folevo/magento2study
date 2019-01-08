<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 16.12.18
 * Time: 14.07
 */

namespace Test\RequestFlow\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use \Magento\Framework\Url;

class Index extends Action
{
    private $url;
    public function __construct(
        Context $context,
        Url $url
    ) {
        $this->url = $url;
        parent::__construct($context);
    }

    public function execute()
    {
        //$result = $this->resultFactory->create('page');
       // $result = $this->resultFactory->create('json');
     //   $result = $this->resultFactory->create('raw');
        //$result->setContents('hui vam');
       // $result->setData(['test'=> 'test']);
//        $result = $this->resultFactory->create(
//            'redirect'
//        );
        $t = $this->url->getData();
        die;
        $result = $this->resultFactory->create('forward');
       // $result->forward('show');
        $this->_forward();
        return $result;
    }
}