<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 21.11.18
 * Time: 8.28
 */

namespace Test\Db\Model\Vaildator;


class ExampleValidator extends \Magento\Framework\Validator\AbstractValidator
{
    public function isValid($value)
    {
       if(!\Zend_Validate::is($value,'StringLength', [5,100])) {
            $this->_addMessages(['asddffggxcvxcvxcv']);
            return false;
       }
       return true;
    }
}