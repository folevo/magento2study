<?php


namespace Test\AllXmlFiles\Model\Cache;

use Magento\Framework\Cache\Frontend\Decorator\TagScope;

class Type extends TagScope
{
    const TYPE_IDENTIFIER = 'custom_cache_tag';
    const CACHE_TAG = 'CUSTOM_CACHE_TAG';

    /**
     * @param \Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool
     * @codeCoverageIgnore
     */
    public function __construct(\Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool)
    {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}