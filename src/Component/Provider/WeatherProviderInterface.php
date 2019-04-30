<?php
/** 
 * PHP version 7.2 *
 *
 * Weather provider signature
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */

namespace App\Component\Provider;

use App\Factory\WeatherProviderFactoryInterface;

/**
 * Weather provider interface
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */
interface WeatherProviderInterface
{
    /**
     * Get Provider for Weather info 
     *
     * @param int $type provider type
     *
     * @return WeatherProviderFactoryInterface
     */
    public function getProvider(int $type): WeatherProviderFactoryInterface;
}