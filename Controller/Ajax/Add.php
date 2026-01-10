<?php
declare(strict_types=1);

namespace DevScripts\QuickAddToCart\Controller\Ajax;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Checkout\Model\Cart;
use DevScripts\QuickAddToCart\Helper\Data;
use Magento\Framework\Exception\LocalizedException;

class Add extends Action
{
    private Cart $cart;
    private JsonFactory $resultJsonFactory;
    private Data $helper;

    public function __construct(
        Context $context,
        Cart $cart,
        JsonFactory $resultJsonFactory,
        Data $helper
    ) {
        parent::__construct($context);
        $this->cart = $cart;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->helper = $helper;
    }

    public function execute(): ResultInterface
    {
        /** @var Json $result */
        $result = $this->resultJsonFactory->create();

        if (!$this->helper->isEnabled()) {
            return $result->setData([
                'success' => false,
                'message' => __('Module is disabled.')
            ]);
        }

        try {
            $params = $this->getRequest()->getParams();

            if (empty($params['product'])) {
                throw new LocalizedException(__('Invalid product request.'));
            }

            $this->cart->addProduct((int)$params['product'], $params);
            $this->cart->save();

            return $result->setData([
                'success'        => true,
                'open_minicart'  => $this->helper->openMiniCart(),
                'redirect_cart'  => $this->helper->redirectToCart()
            ]);
        } catch (LocalizedException $e) {
            return $result->setData([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return $result->setData([
                'success' => false,
                'message' => __('Unable to add product to cart.')
            ]);
        }
    }
}