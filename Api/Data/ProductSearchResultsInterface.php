<?php
namespace Sauce\Auth\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ProductSearchResultsInterface extends SearchResultsInterface
{
  /**
   * Get products list.
   *
   * @return \Sauce\Auth\Api\Data\ProductInterface[]
   */
  public function getItems();

  /**
   * Set products list.
   *
   * @param \Sauce\Auth\Api\Data\ProductInterface[] $items
   * @return $this
   */
  public function setItems(array $items);
}

