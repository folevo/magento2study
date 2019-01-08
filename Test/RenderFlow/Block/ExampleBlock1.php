<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 18.12.18
 * Time: 4.59
 */

namespace Test\RenderFlow\Block;



use Magento\Framework\View\Element\Template;

class ExampleBlock1 extends  \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->initTemplateVars();
    }

    public function initTemplateVars()
    {
        $this->assign('a', 3);
        $this->assign('b', 4);
    }
}