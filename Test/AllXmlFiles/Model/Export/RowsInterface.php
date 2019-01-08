<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 7.11.18
 * Time: 16.17
 */

namespace Test\AllXmlFiles\Model\Export;


interface RowsInterface
{
    public function prepareData($collectionNews);
    public function addHeaderColumns($columns);
    public function addData($dataRow, $id);
}