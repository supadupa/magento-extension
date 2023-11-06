<?php
namespace Sauce\Auth\Model;

use Sauce\Auth\Api\ProductApiInterface;
use Sauce\Auth\Api\Data\ProductInterfaceFactory;
use Sauce\Auth\Api\Data\ProductSearchResultsInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class ProductApi implements ProductApiInterface
{
    protected $productInterfaceFactory;
    protected $productSearchResultsInterfaceFactory;
    protected $productRepository;

    public function __construct(
        ProductInterfaceFactory $productInterfaceFactory,
        ProductSearchResultsInterfaceFactory $productSearchResultsInterfaceFactory,
        ProductRepositoryInterface $productRepository
    ) {
        $this->productInterfaceFactory = $productInterfaceFactory;
        $this->productSearchResultsInterfaceFactory = $productSearchResultsInterfaceFactory;
        $this->productRepository = $productRepository;
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->productSearchResultsInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

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

