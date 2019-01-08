<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 22.11.18
 * Time: 6.43
 */

namespace Test\Db\Model\Vaildator;


class ExampleValidatorSecon extends \Magento\Framework\Validator\AbstractValidator
{
    public function isValid($value)
    {
        if(!\Zend_Validate::is($value,'StringLength', [5,100])) {
            $this->_addMessages(['ccccccc123']);
            return false;
        }
        return true;
    }
}