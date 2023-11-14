<?php
namespace Sauce\App\Plugin;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Plugin for ProductRepository.
 *
 * This plugin extends the functionality of the ProductRepository getList method
 * by adding a custom attribute to each product in the list.
 */
class ProductRepositoryPlugin
{
    /**
     * After Get List Plugin.
     *
     * Adds a 'product_url' custom attribute to each product in the list.
     *
     * @param ProductRepositoryInterface $subject The subject of the plugin, ProductRepositoryInterface.
     * @param SearchResults $result The result from the getList method.
     * @return SearchResults The modified result with added custom attribute.
     */
    public function afterGetList(
        ProductRepositoryInterface $subject,
        SearchResults $result
    ) {
        $products = $result->getItems();
        foreach ($products as $product) {
            $product->setCustomAttribute('product_url', $product->getProductUrl());
        }
        return $result;
    }
}
