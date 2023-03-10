<?php
/**
 * @author Greenrivers
 * @copyright Copyright (c) 2023 Greenrivers
 * @package Grav\Plugin\Hotjar
 */

namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Plugin;
use Grav\Common\Uri;
use Grav\Plugin\Hotjar\Helper\Config;
use Grav\Plugin\Hotjar\Hotjar;
use Grav\Plugin\Hotjar\Utils\Response;

class HotjarPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => [
                ['autoload', 100000],
                ['onPluginsInitialized', 0],
                ['onPagesInitialized', 0]
            ]
        ];
    }

    /**
     * @return ClassLoader
     */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * @return void
     */
    public function onPluginsInitialized(): void
    {
        $this->enable([
            'onAssetsInitialized' => ['onAssetsInitialized', 0]
        ]);
    }

    /**
     * @return void
     */
    public function onPagesInitialized(): void
    {
        /** @var Uri $uri */
        $uri = $this->grav['uri'];
        $paths = $uri->paths();

        if (
            !($this->isAdmin() || $this->isCli()) &&
            Config::isEnabled() &&
            isset($paths[2], $paths[3]) && $paths[2] === 'hotjar' && $paths[3] === 'config'
        ) {
            Response::sendJsonResponse(['config' => Hotjar::getConfig()]);
        }
    }

    /**
     * @return void
     */
    public function onAssetsInitialized(): void
    {
        if (!$this->isAdmin() && Config::isEnabled()) {
            $this->grav['assets']->addJs('plugin://hotjar/assets/js/site.min.js');
        }
    }
}
