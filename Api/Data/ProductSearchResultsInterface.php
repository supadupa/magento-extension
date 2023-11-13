<?php
namespace Sauce\App\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ProductSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get products list.
     *
     * @return \Sauce\App\Api\Data\ProductInterface[]
     */
    public function getItems();

    /**
     * Set products list.
     *
     * @param \Sauce\App\Api\Data\ProductInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

    /**
     * Get extension version.
     *
     * @return string
     */
    public function getExtensionVersion();

    /**
     * Set extension version.
     *
     * @param string $version
     * @return $this
     */
    public function setExtensionVersion($version);
}
