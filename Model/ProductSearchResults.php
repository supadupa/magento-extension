<?php
namespace AddSauce\App\Model;

use Magento\Framework\Api\SearchResults;
use AddSauce\App\Api\Data\ProductSearchResultsInterface;

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

