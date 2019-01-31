<?php
/**
 * Created by PhpStorm.
 * User: folevo
 * Date: 30.1.19
 * Time: 15.28
 */

namespace Test\Db\Api\Data;


interface ReportDataInterface
{
    const ID = 'entity_id';

    const CONTENT = 'content';
  
    const STATE = 'state';

    const STATUS = 'status';

    /**
     * @return $this
     */
    public function getContent();

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content);

    /**
     * @return $this
     */
    public function getState();

    /**
     * @param $state
     * @return $this
     */
    public function setState($state);

    /**
     * @return $this
     */
    public function getStatus();

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * @return $this
     */
    public function getId();

    /**
     * @param $id
     * @return $this
     */
    public function setId($id);
}