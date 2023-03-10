<?php
/**
 * @author Greenrivers
 * @copyright Copyright (c) 2023 Greenrivers
 * @package Grav\Plugin\Hotjar
 */

namespace Grav\Plugin\Hotjar\Helper;

use Grav\Common\Config\Config as GravConfig;
use Grav\Common\Grav;

class Config
{
    private const PLUGINS_HOTJAR_ENABLED_PATH = 'plugins.hotjar.enabled';
    private const PLUGINS_HOTJAR_HJID_PATH = 'plugins.hotjar.hjid';
    private const PLUGINS_HOTJAR_HJSV_PATH = 'plugins.hotjar.hjsv';

    /**
     * @return bool
     */
    public static function isEnabled(): bool
    {
        return self::getConfig()->get(self::PLUGINS_HOTJAR_ENABLED_PATH);
    }

    /**
     * @return string
     */
    public static function getHotjarId(): string
    {
        return self::getConfig()->get(self::PLUGINS_HOTJAR_HJID_PATH) ?? '';
    }

    /**
     * @return string
     */
    public static function getHotjarSnippetVersion(): string
    {
        return self::getConfig()->get(self::PLUGINS_HOTJAR_HJSV_PATH) ?? '';
    }

    /**
     * @return GravConfig
     */
    private static function getConfig(): GravConfig
    {
        return Grav::instance()['config'];
    }
}
