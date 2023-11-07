<?php
namespace Sauce\Auth\Model;

use Magento\Framework\Api\SearchResults;
use Sauce\Auth\Api\Data\ProductSearchResultsInterface;

class ProductSearchResults extends SearchResults implements ProductSearchResultsInterface
{
  /**
   * @var string
   */
  protected $extensionVersion;

  public function getExtensionVersion()
  {
    return $this->extensionVersion;
  }

  public function setExtensionVersion($version)
  {
    $this->extensionVersion = $version;
    return $this;
  }
}

