<?php
/**
 * Constants for the Weather
 *
 * PHP version 7.2 *
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: 0.1
 * @link     http://localhost
 */

namespace App\Constants;

/**
 *   Define constants for the weather
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */
class WeatherConstants
{
    const CURRENT_PROVIDER = "OPEN_WEATHER";

    const OPEN_WEATHER  =1;
    const SOMEOTHER_WEATHER =2 ;

    public static $weatherProviders = [self::OPEN_WEATHER => "Open weather",
                                        self::SOMEOTHER_WEATHER => "Some other "];
}
