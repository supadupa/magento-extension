<?php
namespace Sauce\Auth\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Sauce\Auth\Api\Data\ProductSearchResultsInterface;

interface ProductApiInterface
{
  /**
   * Get list of products with SKU and URL
   *
   * @param SearchCriteriaInterface $searchCriteria
   * @return ProductSearchResultsInterface
   */
  public function getList(SearchCriteriaInterface $searchCriteria);
}

