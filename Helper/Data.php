<?php
declare(strict_types=1);

namespace DevScripts\QuickAddToCart\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    private const XML_PATH = 'quickaddtocart/general/';

    /**
     * Check if module is enabled
     */
    public function isEnabled(): bool
    {
        return (bool)$this->scopeConfig->isSetFlag(
            self::XML_PATH . 'enabled',
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if mini cart should open after add
     */
    public function openMiniCart(): bool
    {
        return (bool)$this->scopeConfig->isSetFlag(
            self::XML_PATH . 'open_minicart',
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if redirect to cart page is enabled
     */
    public function redirectToCart(): bool
    {
        return (bool)$this->scopeConfig->isSetFlag(
            self::XML_PATH . 'redirect_cart',
            ScopeInterface::SCOPE_STORE
        );
    }
}