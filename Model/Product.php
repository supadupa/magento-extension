<?php
namespace Sauce\App\Model;

class Product implements \Sauce\App\Api\Data\ProductInterface
{
  protected $sku;
  protected $url;
  protected $visibility;
  protected $name;
  protected $mediaGalleryEntries; 

  public function getSku()
  {
    return $this->sku;
  }

  public function setSku($sku)
  {
    $this->sku = $sku;
    return $this;
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function setUrl($url)
  {
    $this->url = $url;
    return $this;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
    return $this;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  public function getMediaGalleryEntries()
  {
    return $this->mediaGalleryEntries;
  }

  public function setMediaGalleryEntries($mediaGalleryEntries)
  {
    $this->mediaGalleryEntries = $mediaGalleryEntries;
    return $this;
  }
}

