<?php
namespace Sauce\App\Controller\Adminhtml\Redirect;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {

        $encodedUrlSegment = $this->getRequest()->getParam('url');
        $urlSegment = base64_decode($encodedUrlSegment);
        $url = 'https://app.addsauce.com/' . $urlSegment; // Concatenate the parameter

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($url);
        return $resultRedirect;
    }
}
