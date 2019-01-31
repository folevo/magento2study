<?php
/**
 * Created by PhpStorm.
 * User: dimasik
 * Date: 11.1.19
 * Time: 8.45
 */

namespace Test\Db\Model;

use Test\Db\Api\Data\ReportDataInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class Report extends AbstractExtensibleModel implements ReportDataInterface
{
    const ENTITY = 'test_db_report';
    public function _construct()
    {
        parent::_init(\Test\Db\Model\ResourceModel\Report::class);
    }
    
    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
        
        return $this;
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT); 
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);

        return $this;
    }

    public function getState()
    {
        return $this->getData(self::STATE); 
    }
    
    public function setState($state)
    {
        return $this->setData(self::STATE, $state);

        return $this;
    }


    public function getStatus()
    {
        return $this->getData(self::STATE);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);

        return $this;
    }
}