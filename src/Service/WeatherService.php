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
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\DTO\WeatherOutput;

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
     * @return string
     */
    public function getWeatherData(string $cityName) : ?WeatherOutput
    {
        $cityName = filter_var($cityName, FILTER_SANITIZE_STRING);

        $weatherProvider = $this->getWeatherProvider();

        $weatherObj = $weatherProvider->getResponseObj($cityName);

        $weatherOutput = $weatherProvider->applyTransformation($weatherObj);
        
        $encoders = [ new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        
        $jsonContent = $serializer->serialize($weatherOutput, 'json');

        return $weatherOutput;
    }
}
