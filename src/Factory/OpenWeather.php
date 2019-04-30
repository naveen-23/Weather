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

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use App\Constants\AppConstants;
use App\Entity\Weather;
use App\DTO\WeatherDTO;
use App\DTO\WeatherOutputTransform;
use App\DTO\WeatherOutput;

/**
 * Open weather provider 
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class OpenWeather implements WeatherProviderFactoryInterface
{
    private $_baseUrl;
    private $_apiKey;

    CONST SOURCE_NAME = 'Open Weather';

    /**
     * Set base url
     *
     * @param string $baseUrl base url
     *
     * @return null
     */
    public function setBaseUrl($baseUrl):void
    {
        $this->_baseUrl = $baseUrl;
    }

    /**
     * Set Api key
     *
     * @param string $apiKey base url
     *
     * @return null
     */
    public function setApiKey($apiKey):void
    {
        $this->_apiKey = $apiKey;
    }

    /**
     *  Gets the Response from the API
     *
     * @param string $cityName city name
     *
     * @return weather|null
     */
    public function getResponseObj(string $cityName):?Weather
    {
        try {
            $param = $this->getParams($cityName);
            $client = new \GuzzleHttp\Client(['base_uri' => $this->_baseUrl]);

            $returnData = [];
            $response = $client->request('GET', $param);

            if ($response->getStatusCode() == Response::HTTP_OK) {
                $data = $response->getBody(); //json_decode($response->getBody(), true);

                $weatherDTO = new WeatherDTO();
                $weatherObj = $weatherDTO->transform($data, 'json');

                return $weatherObj;
            }
        } catch (\Exception $ex) {
            throw new \Exception('Response fetch failed'.$ex->getMessage());
        }

        return null;
    }

    /**
     * Transform the response to user required format
     *
     * @param array $weather weather model
     *
     * @return weatherOutput
     */
    public function transformResponse(Weather $weather):WeatherOutput
    {
        $wetherOutput = $this->applyTransformation($weather);
        return $weatherOutput;
    }

    /**
     *  Makes the Params list for fetching the api response
     *
     * @param String $cityName city name 
     *
     * @return string
     */
    public function getParams(string $cityName):string
    {
        $param = '?q='.$cityName.'&appid='.$this->_apiKey;

        return $param;
    }

    /**
     *    Loop through the json response and fetch only required fields
     *
     * @param Weather $weather weather object
     *
     * @return WeatherOutput
     */
    public function applyTransformation($weather):WeatherOutput
    {
        $weatherOutputDTO = new WeatherOutputTransform();
        $weatherOutput = $weatherOutputDTO->transform($weather, 'json');

        return $weatherOutput;
    }

    

    
}
