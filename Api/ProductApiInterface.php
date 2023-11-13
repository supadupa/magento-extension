<?php
namespace Sauce\App\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Sauce\App\Api\Data\ProductSearchResultsInterface;

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
