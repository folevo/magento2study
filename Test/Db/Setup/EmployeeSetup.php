<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 26.11.18
 * Time: 7.02
 */

namespace Test\Db\Setup;

use Magento\Eav\Setup\EavSetup;

class EmployeeSetup extends EavSetup
{
   public function getDefaultEntities()
   {
       $employeeENtity =\Test\Db\Model\Employee::ENTITY;
       $entities = [
           $employeeENtity => [
               'entity_model' => 'Test\Db\Model\ResourceModel\Employee',
               'table' => $employeeENtity . '_entity',
               'attributes' => [
                   'email' => [
                       'type' => 'static',
                   ],
                   'first_name' => [
                       'type' => 'static',
                   ],
                   'last_name' => [
                       'type' => 'static',
                   ],
               ],
           ],
       ];
       return $entities;
   }
}