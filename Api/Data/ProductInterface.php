<?php
namespace Sauce\App\Api\Data;

interface ProductInterface
{
    /**
     * Get product SKU
     *
     * @return string
     */
    public function getSku();

    /**
     * Set product SKU
     *
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * Get product URL
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set product URL
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url);

    /**
     * Get product visibility
     *
     * @return string
     */
    public function getVisibility();

    /**
     * Set product visibility
     *
     * @param string $visibility
     * @return $this
     */
    public function setVisibility($visibility);

    /**
     * Get product name
     *
     * @return string
     */
    public function getName();

    /**
     * Set product name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get media gallery entries.
     *
     * @return \Magento\Catalog\Api\Data\ProductAttributeMediaGalleryEntryInterface[]
     */
    public function getMediaGalleryEntries();

    /**
     * Set media gallery entries.
     *
     * @param \Magento\Catalog\Api\Data\ProductAttributeMediaGalleryEntryInterface[] $mediaGalleryEntries
     * @return $this
     */
    public function setMediaGalleryEntries(array $mediaGalleryEntries);
}
