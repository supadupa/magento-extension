<?php
namespace Sauce\App\Model;

/**
 * Class Product
 * Represents a product with properties like SKU, URL, visibility, etc.
 */
class Product implements \Sauce\App\Api\Data\ProductInterface
{
    /**
     * @var string
     * The product SKU.
     */
    protected $sku;

    /**
     * @var string
     * The product URL.
     */
    protected $url;

    /**
     * @var int
     * The product visibility status.
     */
    protected $visibility;

    /**
     * @var string
     * The name of the product.
     */
    protected $name;

    /**
     * @var array
     * An array of media gallery entries for the product.
     */
    protected $mediaGalleryEntries;

    /**
     * Gets the SKU of the product.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Sets the SKU of the product.
     *
     * @param string $sku
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Gets the URL of the product.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the URL of the product.
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Gets the visibility of the product.
     *
     * @return int
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Sets the visibility of the product.
     *
     * @param int $visibility
     * @return $this
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * Gets the name of the product.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name of the product.
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets the media gallery entries of the product.
     *
     * @return array
     */
    public function getMediaGalleryEntries()
    {
        return $this->mediaGalleryEntries;
    }

    /**
     * Sets the media gallery entries for the product.
     *
     * @param string $mediaGalleryEntries
     * @return $this
     */
    public function setMediaGalleryEntries($mediaGalleryEntries)
    {
        $this->mediaGalleryEntries = $mediaGalleryEntries;
        return $this;
    }
}
