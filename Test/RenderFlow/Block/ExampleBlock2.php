<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 4.1.19
 * Time: 11.18
 */

namespace Test\RenderFlow\Block;

use Magento\Framework\View\Element\Template;
use Test\RenderFlow\Helper\Data;


class ExampleBlock2 extends  \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function initTemplateVars($data)
    {
        $this->assign('a', $data['a']);
        $this->assign('b', $data['b']);
    }
    public function initObject($object, $compositeParams)
    {
        $t = $object->getName();
    }
}