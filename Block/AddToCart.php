<?php
declare(strict_types=1);

namespace XMageLumen\AjaxAddToCart\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use XMageLumen\AjaxAddToCart\Model\ConfigInterface;

/**
 * Class AddToCart
 */
class AddToCart extends Template
{
    /**
     * Constructor.
     *
     * @param Context $context
     * @param ConfigInterface $config
     * @param array $data
     */
    public function __construct(
        Context $context,
        private readonly ConfigInterface $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Render block HTML if enabled and template is set.
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        if (!$this->getTemplate() || !$this->config->isAjaxAddToCartEnabled()) {
            return '';
        }

        return parent::_toHtml();
    }

    /**
     * Get AJAX Add to Cart delay in milliseconds.
     *
     * @return string
     */
    public function getDelay(): string
    {
        return $this->config->getAjaxAddToCartDelay();
    }

    /**
     * Get form selectors used for AJAX Add to Cart functionality.
     *
     * @return string
     */
    public function getSelectors(): string
    {
        return $this->config->getAjaxAddToCartSelectors();
    }

    /**
     * Determine whether the cart should open after adding a product.
     *
     * @return bool
     */
    public function isCartOpenAfterAddToCart(): bool
    {
        return $this->config->isCartOpenAfterAddToCart();
    }
}