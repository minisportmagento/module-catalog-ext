<?php

namespace Minisport\CatalogExt\Plugin\Model;

use Magento\Catalog\Api\Data\ProductInterface as Subject;
use Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection as LinkProductCollection;
use Minisport\CatalogExt\Helper\Config;

class Product
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    public function afterGetRelatedProductCollection(
        Subject $subject,
        LinkProductCollection $result
    ) {
        $product = $subject;
        $collection = $result;
        $limit = $this->config->getRelatedProductsStorefrontLimit();

        if ($limit < 0) {
            return $result;
        }

        $collection->setPageSize($limit);

        return $collection;
    }
}
