<?php
namespace Sauce\App\Model;

use Sauce\App\Api\ProductApiInterface;
use Sauce\App\Api\Data\ProductInterfaceFactory;
use Sauce\App\Api\Data\ProductSearchResultsInterfaceFactory;
use Sauce\App\Helper\Version;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Product API class
 *
 * Provides functionality for retrieving product information.
 */
class ProductApi implements ProductApiInterface
{
    /**
     * @var ProductInterfaceFactory Factory for creating product data instances.
     */
    protected $productInterfaceFactory;

    /**
     * @var ProductSearchResultsInterfaceFactory Factory for creating product search results instances.
     */
    protected $productSearchResultsInterfaceFactory;

    /**
     * @var ProductRepositoryInterface Repository for product data.
     */
    protected $productRepository;

    /**
     * @var Version Helper for managing version information.
     */
    protected $versionHelper;

    /**
     * Constructor for ProductApi.
     *
     * @param ProductInterfaceFactory $productInterfaceFactory
     * @param ProductSearchResultsInterfaceFactory $productSearchResultsInterfaceFactory
     * @param ProductRepositoryInterface $productRepository
     * @param Version $versionHelper
     */
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

    /**
     * Retrieves a list of products based on the given search criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria Criteria for filtering products.
     * @return mixed Search results containing product data.
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->productSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        // Get the module version
        $version = $this->versionHelper->getModuleVersion('Sauce_App');
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
