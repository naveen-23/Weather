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

namespace App\Component\Provider;

use App\Constants\WeatherConstants;
use App\Factory\OpenWeather;
use App\Factory\SomeOther;
use App\Factory\WeatherProviderFactoryInterface;

/**
 * Component to return the weather provider
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class WeatherProvider implements WeatherProviderInterface
{
    /**
     * Construct weather provider 
     *
     * @param string $baseUrl Base url
     * @param string $apiKey  Application key
     */
    public function __construct($baseUrl, $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }
    /**
     * Creates an object for fetching the weather details
     *
     * @param int $type provider type
     *
     * @return WeatherProviderFactoryInterface
     */
    public function getProvider(int $type) : WeatherProviderFactoryInterface
    {
        // return instance of weather provider based on type passed
        switch ($type) {
        case WeatherConstants::OPEN_WEATHER:
            $weatherProvider = new OpenWeather();
            break;

        case WeatherConstants::SOME_OTHER:
            $weatherProvider = new SomeOther();
            break;

        default:
            $weatherProvider = new OpenWeather();
            break;
        }

        // settting base url and key
        $weatherProvider->setBaseUrl($this->baseUrl);
        $weatherProvider->setApiKey($this->apiKey);

        return $weatherProvider;
    }
}
