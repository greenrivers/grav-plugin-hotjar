<?php
/**
 * @author Greenrivers
 * @copyright Copyright (c) 2023 Greenrivers
 * @package Grav\Plugin\Hotjar
 */

namespace Grav\Plugin\Hotjar;

use Grav\Plugin\Hotjar\Helper\Config;

class Hotjar
{
    /**
     * @return array
     */
    public static function getConfig(): array
    {
        return [
            'hjid' => Config::getHotjarId(),
            'hjsv' => Config::getHotjarSnippetVersion()
        ];
    }
}
