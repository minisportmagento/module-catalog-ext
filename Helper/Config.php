<?php

namespace Minisport\CatalogExt\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{
    /**
     * @return int
     */
    public function getRelatedProductsStorefrontLimit(): int
    {
        return (int)$this->scopeConfig->getValue(
            'catalog/related_products/storefront_limit',
            ScopeInterface::SCOPE_STORE
        );
    }
}
