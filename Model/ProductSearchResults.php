<?php
namespace Sauce\App\Model;

use Magento\Framework\Api\SearchResults;
use Sauce\App\Api\Data\ProductSearchResultsInterface;

/**
 * Class ProductSearchResults
 *
 * This class extends the Magento SearchResults for custom handling of product search results.
 */
class ProductSearchResults extends SearchResults implements ProductSearchResultsInterface
{
    /**
     * @var string
     * Holds the version of the extension.
     */
    protected $extensionVersion;

    /**
     * Retrieves the extension version.
     *
     * @return string The version of the extension.
     */
    public function getExtensionVersion()
    {
        return $this->extensionVersion;
    }

    /**
     * Sets the extension version.
     *
     * @param string $version The version to be set for the extension.
     * @return $this Provides a fluent interface.
     */
    public function setExtensionVersion($version)
    {
        $this->extensionVersion = $version;
        return $this;
    }
}
