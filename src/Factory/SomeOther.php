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

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Weather;
use App\DTO\WeatherOutput;
use App\DTO\WeatherOutputTransform;

/**
 * Some other provider 
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class SomeOther implements WeatherProviderFactoryInterface
{
    CONST SOURCE_NAME = 'SOME other';

    /**
     * Set base url
     *
     * @param string $baseUrl base url
     *
     * @return null
     */
    public function setBaseUrl($baseUrl):void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * Set Api key     
     *
     * @param string $apiKey api key
     *
     * @return null
     */
    public function setApiKey($apiKey):void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get Response
     *
     * @param string $cityName city name 
     *
     * @return Weather|null
     */
    public function getResponseObj(string $cityName):Weather
    {   
        $data = [];
        $weatherDTO = new WeatherDTO();
        $weatherObj = $weatherDTO->transform($data, 'json');

        return $weatherObj;
    }

    /**
     * Get Response
     *
     * @param array $weather weather model
     *
     * @return WeatherOutput
     */
    public function transformResponse(Weather $weather):WeatherOutput
    {
        $weatherOutputDTO = new WeatherOutputTransform();
        $weatherOutput = $weatherOutputDTO->transform($weather, 'json');

        return $weatherOutput;
    }
}
