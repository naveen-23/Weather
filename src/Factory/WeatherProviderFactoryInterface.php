<?php
/** 
 * PHP version 7.2 *
 *
 * Component for Weather provider
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */

namespace App\Factory;

use App\Entity\Weather;
use App\DTO\WeatherOutput;

/**
 * Weather provider interface
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */
interface WeatherProviderFactoryInterface
{
    /**
     * Set base url
     *
     * @param string $baseUrl base url
     *
     * @return null
     */
    public function setBaseUrl($baseUrl):void;

    /**
     * Set api key
     *
     * @param string $apiKey Api key
     *
     * @return null
     */
    public function setApiKey($apiKey):void;

    /**
     * Get response 
     *
     * @param string $cityName cityname
     *
     * @return Weather|null
     */
    public function getResponseObj(string $cityName):? \App\Entity\Weather;

    /**
     * Set response 
     *
     * @param array $weather weather model
     *
     * @return WeatherOutput
     */
    public function transformResponse(Weather $weather):WeatherOutput;
}
