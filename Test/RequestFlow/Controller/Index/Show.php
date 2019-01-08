<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 16.12.18
 * Time: 17.53
 */

namespace Test\RequestFlow\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Show extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
       echo 'hui vam 2';
       die;
    }
}