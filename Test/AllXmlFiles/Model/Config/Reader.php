<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 12.12.18
 * Time: 8.16
 */

namespace Test\AllXmlFiles\Model\Config;

use Magento\Framework\Config\Reader\Filesystem;

class Reader extends Filesystem
{

    protected $_idAttributes = [
        '/config' => 'name',
        '/config/test_element_list' => 'name'
    ];
}