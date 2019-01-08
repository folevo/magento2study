<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 7.11.18
 * Time: 16.48
 */

namespace Test\AllXmlFiles\Model\Export\Rows;


use Test\AllXmlFiles\Model\Export\RowsInterface;

class Rows implements RowsInterface
{
    protected $_field = [
        'entity_id',
        'name',
        'type_id',
        'description'
    ];
    protected $rows = [];
    public function prepareData($collection)
    {
        foreach ($collection as $row) {
            $this->addData($row->getData(), $row->getId());
        }
    }

    public function addHeaderColumns($columns)
    {
        foreach ($columns as $column) {
            $this->_field[] = $column;
        }
    }

    public function addData($dataRow, $id)
    {
        $this->rows[$id] = $dataRow;
    }

    public function getHeaderNamesColumns()
    {
        return $this->_field;
    }
}