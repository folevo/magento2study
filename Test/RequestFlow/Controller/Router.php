<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 17.12.18
 * Time: 10.49
 */

namespace Test\RequestFlow\Controller;


use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ActionFactory;

class Router implements \Magento\Framework\App\RouterInterface
{
    private $actionFactory;
    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
     $ident = trim($request->getPathInfo(), '/');
        if(strpos($ident, 'requestFlow2') !== false) {
            $request->setModuleName('requestFlow2');
            $request->setControllerName('index');
            $request->setActionName('show');
            if($request->getActionName() !=='show'){
                return $this->actionFactory->create(
                    'Magento\Framework\App\Action\Forward',
                    ['request' => $request]
                );
            }
        }
        return false;
    }
}