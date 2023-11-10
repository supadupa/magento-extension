<?php
namespace AddSauce\App\Model;

use AddSauce\App\Api\ProductApiInterface;
use AddSauce\App\Api\Data\ProductInterfaceFactory;
use AddSauce\App\Api\Data\ProductSearchResultsInterfaceFactory;
use AddSauce\App\Helper\Version;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class ProductApi implements ProductApiInterface
{
  protected $productInterfaceFactory;
  protected $productSearchResultsInterfaceFactory;
  protected $productRepository;
  protected $versionHelper;

  public function __construct(
    ProductInterfaceFactory $productInterfaceFactory,
    ProductSearchResultsInterfaceFactory $productSearchResultsInterfaceFactory,
    ProductRepositoryInterface $productRepository,
    Version $versionHelper
  ) {
    $this->productInterfaceFactory = $productInterfaceFactory;
    $this->productSearchResultsInterfaceFactory = $productSearchResultsInterfaceFactory;
    $this->productRepository = $productRepository;
    $this->versionHelper = $versionHelper; 
  }

  public function getList(SearchCriteriaInterface $searchCriteria)
  {
    $searchResults = $this->productSearchResultsInterfaceFactory->create();
    $searchResults->setSearchCriteria($searchCriteria);

    // Get the module version
    $version = $this->versionHelper->getModuleVersion('AddSauce_App');
    $extensionVersion = $version ?? 'unknown';
    $searchResults->setExtensionVersion($extensionVersion);

    $products = $this->productRepository->getList($searchCriteria);
    $searchResults->setTotalCount($products->getTotalCount());

    $formattedProducts = [];
    foreach ($products->getItems() as $product) {
      $productData = $this->productInterfaceFactory->create();
      $productData->setSku($product->getSku());
      $productData->setVisibility($product->getVisibility());
      $productData->setName($product->getName());
      $productData->setUrl($product->getProductUrl());

      // Get media gallery entries for each product
      $mediaGalleryEntries = $product->getMediaGalleryEntries();
      $productData->setMediaGalleryEntries($mediaGalleryEntries);

      $formattedProducts[] = $productData;
    }

    $searchResults->setItems($formattedProducts);
    return $searchResults;
  }
}
