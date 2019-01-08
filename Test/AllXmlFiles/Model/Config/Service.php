<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 7.12.18
 * Time: 6.07
 */

namespace Test\AllXmlFiles\Model\Config;


class Service
{
  private $data;
  public function __construct(Data $data)
  {
      $this->data = $data;
  }

  public function getData()
  {
      return $this->data->get('test_element');
  }
}