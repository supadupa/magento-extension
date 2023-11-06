<?php
namespace Sauce\Auth\Plugin;

class ProductRepositoryPlugin
{
  public function afterGetList(
    \Magento\Catalog\Api\ProductRepositoryInterface $subject,
    \Magento\Framework\Api\SearchResults $result
  ) {
    $products = $result->getItems();
    foreach ($products as $product) {
      $product->setCustomAttribute('product_url', $product->getProductUrl());
    }
    return $result;
  }
}

