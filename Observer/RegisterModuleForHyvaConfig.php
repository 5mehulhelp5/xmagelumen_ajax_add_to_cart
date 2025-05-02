<?php
declare(strict_types=1);

namespace XMageLumen\AjaxAddToCart\Observer;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Observer to register the module path for Hyvä configuration.
 */
class RegisterModuleForHyvaConfig implements ObserverInterface
{
    private const EXTENSIONS_KEY = 'extensions';

    /**
     * @param ComponentRegistrar $componentRegistrar
     */
    public function __construct(
        private readonly ComponentRegistrar $componentRegistrar
    ) {
    }

    /**
     * Register module source path for Hyvä Themes configuration.
     *
     * @param Observer $event
     */
    public function execute(Observer $event): void
    {
        $config = $event->getData('config');
        $extensions = $config->getData(self::EXTENSIONS_KEY) ?? [];

        // Resolve module name (e.g., XMageLumen_AjaxAddToCart)
        $moduleName = implode('_', array_slice(explode('\\', static::class), 0, 2));

        // Get module's absolute path
        $modulePath = $this->componentRegistrar->getPath(ComponentRegistrar::MODULE, $moduleName);

        // Append relative path from Magento root
        $extensions[] = ['src' => substr($modulePath, strlen(BP) + 1)];

        $config->setData(self::EXTENSIONS_KEY, $extensions);
    }
}