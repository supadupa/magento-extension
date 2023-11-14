<?php
namespace Sauce\App\Controller\Adminhtml\Redirect;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Url\DecoderInterface;

class Index extends Action
{
    /**
     * @var DecoderInterface
     */
    protected $urlDecoder;

    /**
     * Constructor
     *
     * @param Context $context
     * @param DecoderInterface $urlDecoder
     */
    public function __construct(
        Context $context,
        DecoderInterface $urlDecoder
    ) {
        parent::__construct($context);
        $this->urlDecoder = $urlDecoder;
    }

    /**
     * Execute method for redirect controller.
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $encodedUrlSegment = $this->getRequest()->getParam('url');
        $urlSegment = $this->urlDecoder->decode($encodedUrlSegment);
        $url = 'https://app.addsauce.com/' . $urlSegment; // Concatenate the parameter

        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($url);
        return $resultRedirect;
    }
}
