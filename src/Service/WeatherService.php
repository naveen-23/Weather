<?php
/** 
 * PHP version 7.2 *
 *
 * Weather Service for getting Weather data in requried format
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */

namespace App\Service;

use App\Constants\WeatherConstants;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Component\Provider\WeatherProvider;
use App\Factory\WeatherProviderFactoryInterface;

/**
 * Get weather data service
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class WeatherService
{
    /**
     * Gets weather provider
     *
     * @param string $baseUrl base url
     * @param string $apiKey  api key    
     */
    public function __construct($baseUrl, $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * Gets weather provider
     *
     * @return WeatherProvider
     */
    public function getWeatherProvider() : WeatherProviderFactoryInterface
    {
        $weatherProvider = new WeatherProvider($this->baseUrl, $this->apiKey);
        $weatherProvider = $weatherProvider->getProvider(
            WeatherConstants::OPEN_WEATHER
        );

        return $weatherProvider;
    }
    /**
     * Get weather information for a city
     *
     * @param string $cityName city name passed
     *
     * @return array
     */
    public function getWeatherData(string $cityName) : array
    {
        $weatherProvider = $this->getWeatherProvider();

        $weatherObj = $weatherProvider->getResponseObj($cityName);

        $weatherData = $weatherObj->applyTransformation();

        return $weatherObj->getRepresentationData();
    }
}
