<?php
namespace Sauce\App\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Escaper;
use Magento\Sales\Model\OrderFactory;
use Magento\Checkout\Model\Session as CheckoutSession;
use Sauce\App\Model\Account;

/**
 * Class Conversion
 *
 * This block class handles the retrieval of order and account data
 * for conversion tracking on the frontend.
 */
class Conversion extends Template
{
    /**
     * @var OrderFactory
     */
    protected $orderFactory;

    /**
     * @var CheckoutSession
     */
    protected $checkoutSession;

    /**
     * @var Account
     */
    protected $accountModel;

    /**
     * @var Escaper
     */
    protected $escaper;

    /**
     * Conversion constructor.
     *
     * @param Template\Context $context
     * @param OrderFactory $orderFactory
     * @param CheckoutSession $checkoutSession
     * @param Account $accountModel
     * @param Escaper $escaper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        OrderFactory $orderFactory,
        CheckoutSession $checkoutSession,
        Account $accountModel,
        Escaper $escaper,
        array $data = []
    ) {
        $this->orderFactory = $orderFactory;
        $this->checkoutSession = $checkoutSession;
        $this->accountModel = $accountModel;
        $this->escaper = $escaper;
        parent::__construct($context, $data);
    }

    /**
     * Get the last order object from the checkout session.
     *
     * @return \Magento\Sales\Model\Order|null
     */
    public function getLastOrder()
    {
        $orderId = $this->checkoutSession->getLastOrderId();
        return $orderId ? $this->orderFactory->create()->load($orderId) : null;
    }

    /**
     * Get the order number of the last order.
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->getLastOrder() ? $this->getLastOrder()->getIncrementId() : '';
    }

    /**
     * Get the grand total of the last order.
     *
     * @return string
     */
    public function getOrderTotal()
    {
        return $this->getLastOrder() ? number_format($this->getLastOrder()->getGrandTotal(), 2) : '';
    }

    /**
     * Get the currency code of the last order.
     *
     * @return string
     */
    public function getOrderCurrency()
    {
        return $this->getLastOrder() ? $this->getLastOrder()->getOrderCurrencyCode() : '';
    }

    /**
     * Get the Sauce account ID.
     *
     * @return string
     */
    public function getAccountID()
    {
        return $this->accountModel->getAccountID();
    }

    /**
     * Get Escaper instance.
     *
     * @return \Magento\Framework\Escaper
     */
    public function getEscaper()
    {
        return $this->escaper;
    }
}
